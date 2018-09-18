<?php

namespace App\Http\Controllers;

use App\Partners;
use App\Photos;
use ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class PartnersController extends Controller
{
    public function __construct()
    {
        $this->middleware('administrator');
    }

    public function index()
    {
        $user = Auth::user();
        $items = Partners::orderBy('hierarchy')->with('photos')->paginate(10);
        return view('cms.partners.index', compact('items', 'user'));
    }

    public function store(Request $request)
    {
        try{
            if($request->hasFile('photos')){

                $photo = $request->file('photos');
                $filename = md5(microtime()) . '.' . $photo->getClientOriginalExtension();

                ImageUpload::make($photo)->resize(768, null, function ($constraint) { $constraint->aspectRatio(); })->save(public_path('/assets/uploads/photos/' . $filename));

                $photo_id = Photos::create([
                    'path' => 'assets/uploads/photos/' . $filename,
                    'caption' => $request->title,
                    'alt' => $request->title,
                ])->id;

                Partners::create([
                    'photo_id'      => $photo_id,
                    'title'         => $request->title,
                    'url'           => $request->url,
                ])->id;

                return redirect()->back()->with('message_success', 'Successfully saved.');
            }else{
                Partners::create([
                    'title'         => $request->title,
                    'url'           => $request->url,
                ]);
                return redirect()->back()->with('message_success', 'Successfully saved.');
            }
        }catch (QueryException $exception){
            return redirect()->back()->with('message_error', 'An error occurred.');
        }
    }

    public function getItemInfo(Request $request)
    {
        $item = Partners::findOrFail($request->id);
        echo json_encode($item);
    }

    public function update(Request $request, $id)
    {
        try{
            $item = Partners::findOrFail($id);

            if($request->hasFile('photos')){

                $photo = $request->file('photos');
                $filename = md5(microtime()) . '.' . $photo->getClientOriginalExtension();

                ImageUpload::make($photo)->resize(768, null, function ($constraint) { $constraint->aspectRatio(); })->save(public_path('/assets/uploads/photos/' . $filename));

                $photo_id = Photos::create([
                    'path' => 'assets/uploads/photos/' . $filename,
                    'caption' => $request->title,
                    'alt' => $request->title,
                ])->id;

                $item->update([
                    'photo_id'      => $photo_id,
                    'title'         => $request->title,
                    'url'           => $request->url,
                ]);
                return redirect()->back()->with('message_success', 'Successfully updated.');
            }else{
                $item->update($request->all());
                return redirect()->back()->with('message_success', 'Successfully updated.');
            }
        }catch (QueryException $exception){
            return redirect()->back()->with('message_error', 'An error occurred.');
        }
    }

    public function sortItems(Request $request)
    {
        $hierarchy = 0;
        foreach ($request->sortItems as $sortItem){
            $id = substr($sortItem, 5);
            Partners::findOrFail($id)->update(['hierarchy' => $hierarchy]);
            $hierarchy++;
        }
        echo json_encode("Sorting completed.");
    }

    public function setVisibility(Request $request, $id)
    {
        Partners::findOrFail($id)->update($request->all());
        echo json_encode("Visibility updated.");
    }

    public function destroy($id)
    {
        try{
            Partners::findOrFail($id)->delete();
            return redirect()->back()->with('message_success', 'Successfully removed.');
        }catch (QueryException $exception){
            return redirect()->back()->with('message_error', 'Cannot be removed.');
        }
    }
}
