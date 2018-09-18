<?php

namespace App\Http\Controllers;

use App\Locations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\CountValidator\Exception;
use Illuminate\Database\QueryException;

class LocationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('administrator');
    }

    public function index()
    {
        $user = Auth::user();
        $items = Locations::orderBy('id', 'desc')->with('pages')->paginate(10);
        return view('cms.locations.index', compact('items', 'user'));
    }

    public function store(Request $request)
    {
        try{
            $address = str_replace(" ", "+", $request->address);
            $url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=India";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $response = curl_exec($ch);
            curl_close($ch);
            $response_a = json_decode($response);

            if($response_a->status == "OK"){
                $lat = $response_a->results[0]->geometry->location->lat;
                $lng = $response_a->results[0]->geometry->location->lng;

                Locations::create([
                    'page_id'   => $request->page_id,
                    'title'     => $request->title,
                    'address'   => $request->address,
                    'lat'       => $lat,
                    'lng'       => $lng,
                ]);

                return redirect()->back()->with('message_success', 'Successfully saved.');
            }else{
                return redirect()->back()->with('message_error', 'An error occurred.');
            }

        }catch (Exception $exception){
            return redirect()->back()->with('message_error', 'An error occurred.');
        }
    }

    public function getItemInfo(Request $request)
    {
        $item = Locations::findOrFail($request->id);
        echo json_encode($item);
    }

    public function update(Request $request, $id)
    {
        $item = Locations::findOrFail($id);

        try{
            $address = str_replace(" ", "+", $request->address);
            $url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=India";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $response = curl_exec($ch);
            curl_close($ch);
            $response_a = json_decode($response);

            if($response_a->status == "OK"){
                $lat = $response_a->results[0]->geometry->location->lat;
                $lng = $response_a->results[0]->geometry->location->lng;

                $item->update([
                    'title'     => $request->title,
                    'address'   => $request->address,
                    'lat'       => $lat,
                    'lng'       => $lng,
                ]);

                return redirect()->back()->with('message_success', 'Successfully updated.');
            }else{
                return redirect()->back()->with('message_error', 'An error occurred.');
            }
        }catch (Exception $exception){
            return redirect()->back()->with('message_error', 'An error occurred.');
        }
    }

    public function sortItems(Request $request)
    {
        $hierarchy = 0;
        foreach ($request->sortItems as $sortItem){
            $id = substr($sortItem, 5);
            Locations::findOrFail($id)->update(['hierarchy' => $hierarchy]);
            $hierarchy++;
        }
        echo json_encode("Sorting completed.");
    }

    public function setVisibility(Request $request, $id)
    {
        Locations::findOrFail($id)->update($request->all());
        echo json_encode("Visibility updated.");
    }

    public function destroy($id)
    {
        try{
            Locations::findOrFail($id)->delete();
            return redirect()->back()->with('message_success', 'Successfully removed.');
        }catch (QueryException $exception){
            return redirect()->back()->with('message_error', 'Cannot be removed.');
        }
    }
}
