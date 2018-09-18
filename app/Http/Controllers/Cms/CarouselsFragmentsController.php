<?php

namespace App\Http\Controllers;

use App\CarouselsFragments;
use App\Photos;
use ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Mockery\Exception;

class CarouselsFragmentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('administrator');
    }

    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        try{
            if($request->hasFile('photos')){

                $files = $request->file('photos');
                $filesCount = count($files);
                $uploadsCount = 0;

                foreach ($files as $file){
                    $filename =md5(microtime()) . '.' . $file->getClientOriginalExtension();

                    ImageUpload::make($file)->save(public_path('/assets/uploads/photos/' . $filename));

                    $photo_id = Photos::create([
                        'path'      => 'assets/uploads/photos/' . $filename,
                        'caption'   => $request->title,
                        'alt'       => $request->title,
                    ])->id;

                    CarouselsFragments::create([
                        'carousel_id'   => $request->carousel_id,
                        'photo_id'      => $photo_id,
                        'title'         => $request->title,
                        'subtitle'      => $request->subtitle,
                        'url'           => $request->url,
                    ]);

                    $uploadsCount++;
                }
                if($uploadsCount == $filesCount){
                    return redirect()->back()->with('message_success', 'Successfully saved.');
                }else {
                    return redirect()->back()->with('message_error', 'An error occurred.');
                }
            }
        }catch (QueryException $exception){
            return redirect()->back()->with('message_error', 'An error occurred.');
        }
    }

    public function getItemInfo(Request $request)
    {
        $item = CarouselsFragments::findOrFail($request->id);
        echo json_encode($item);
    }

    public function update(Request $request, $id)
    {
        CarouselsFragments::findOrFail($id)->update($request->all());
        return redirect()->back()->with('message_success', 'Successfully updated.');
    }

    public function sortItems(Request $request)
    {
        $hierarchy = 0;
        foreach ($request->sortItems as $sortItem){
            $id = substr($sortItem, 5);
            CarouselsFragments::findOrFail($id)->update(['hierarchy' => $hierarchy]);
            $hierarchy++;
        }
        echo json_encode("Sorting completed.");
    }

    public function setVisibility(Request $request, $id)
    {
        CarouselsFragments::findOrFail($id)->update($request->all());
        echo json_encode("Visibility updated.");
    }

    public function destroy($id)
    {
        try{
            CarouselsFragments::findOrFail($id)->delete();
            return redirect()->back()->with('message_success', 'Successfully removed.');
        }catch (QueryException $exception){
            return redirect()->back()->with('message_error', 'Cannot be removed.');
        }
    }
}
