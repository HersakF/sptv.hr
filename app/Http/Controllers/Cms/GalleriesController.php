<?php

namespace App\Http\Controllers;

use App\Galleries;
use App\GalleriesFragments;
use App\Photos;
use ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class GalleriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('administrator');
    }

    public function index()
    {
        $user = Auth::user();
        $items = Galleries::orderBy('id', 'desc')->paginate(10);
        return view('cms.galleries.index', compact('items', 'user'));
    }

    public function store(Request $request)
    {
        try{
            if($request->hasFile('photos')){

                $gallery_id = Galleries::create([
                    'page_id'     => $request->page_id,
                    'title'     => $request->title,
                ])->id;

                $files = $request->file('photos');
                $filesCount = count($files);
                $uploadsCount = 0;

                foreach ($files as $file){
                    $filename =md5(microtime()) . '.' . $file->getClientOriginalExtension();
                    ImageUpload::make($file)->save(public_path('/assets/uploads/photos/' . $filename),60);

                    $photo_id = Photos::create([
                        'path' => 'assets/uploads/photos/' . $filename,
                        'caption' => $request->title,
                        'alt' => $request->title,
                    ])->id;

                    GalleriesFragments::create([
                        'title' => $request->title,
                        'gallery_id' => $gallery_id,
                        'photo_id' => $photo_id,
                    ]);

                    $uploadsCount++;
                }
                if($uploadsCount == $filesCount){
                    return redirect()->back()->with('message_success', 'Successfully saved.');
                }else {
                    return redirect()->back()->with('message_error', 'An error occurred.');
                }
            }else{
                Galleries::create($request->all());
                return redirect()->back()->with('message_success', 'Successfully saved.');
            }
        }catch (QueryException $exception){
            return redirect()->back()->with('message_error', 'An error occurred.');
        }
    }

    public function edit($id)
    {
        $gallery = Galleries::findOrFail($id);
        $items = Galleries::with('galleries_fragments.photos')->findOrFail($id);
        $user = Auth::user();
        return view('cms.galleries.edit', compact('gallery', 'items', 'user'));
    }

    public function getItemInfo(Request $request)
    {
        $item = Galleries::findOrFail($request->id);
        echo json_encode($item);
    }

    public function update(Request $request, $id)
    {
        Galleries::findOrFail($id)->update($request->all());
        return redirect()->back()->with('message_success', 'Successfully updated.');
    }

    public function setVisibility(Request $request, $id)
    {
        Galleries::findOrFail($id)->update($request->all());
        echo json_encode("Visibility updated.");
    }

    public function destroy($id)
    {
        try{
            GalleriesFragments::where('gallery_id', '=', $id)->delete();
            Galleries::findOrFail($id)->delete();
            return redirect()->back()->with('message_success', 'Successfully removed.');
        }catch (QueryException $exception){
            return redirect()->back()->with('message_error', 'Cannot be removed.');
        }
    }
}
