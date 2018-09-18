<?php

namespace App\Http\Controllers;

use App\Photos;
use ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\File;

class PhotosController extends Controller
{
    public function __construct()
    {
        $this->middleware('administrator');
    }

    public function index()
    {
        $user = Auth::user();
        $items = Photos::orderBy('id', 'desc')->paginate(10);
        return view('cms.photos.index', compact('items', 'user'));
    }

    public function store(Request $request)
    {
        try{
            if($request->hasFile('photos')){

                $files = $request->file('photos');
                $filesCount = count($files);
                $uploadsCount = 0;

                foreach ($files as $file){

                    $filename = md5(microtime()) . '.' . $file->getClientOriginalExtension();
                    ImageUpload::make($file)->save(public_path('/assets/uploads/photos/' . $filename),60);

                    Photos::create([
                        'path' => 'assets/uploads/photos/' . $filename,
                        'caption' => $request->caption,
                        'alt' => $request->alt,
                        'source' => $request->source,
                        'parent_id' => $request->parent_id,
                    ]);
                    $uploadsCount++;
                }
                if($uploadsCount == $filesCount){
                    if($uploadsCount > 1){
                        return redirect()->back()->with('message_success', 'Successfully saved.');
                    }else{
                        return redirect()->back()->with('message_success', 'Successfully saved.');
                    }
                }else {
                    return redirect()->back()->with('message_error', 'An error occurred.');
                }
            }else{
                return redirect()->back()->with('message_error', 'An error occurred.');
            }
        }catch (QueryException $exception){
            return redirect()->back()->with('message_error', 'An error occurred.');
        }
    }

    public function getItemInfo(Request $request)
    {
        $item = Photos::findOrFail($request->id);
        echo json_encode($item);
    }

    public function update(Request $request, $id)
    {
        try{
            Photos::findOrFail($id)->update($request->all());
            return redirect()->back()->with('message_success', 'Successfully updated.');
        }catch (QueryException $exception){
            return redirect()->back()->with('message_error', 'An error occurred.');
        }

    }

    public function destroy($id)
    {
        try{
            $item = Photos::findOrFail($id);
            $item->delete();
            File::delete($item->path);
            return redirect()->back()->with('message_success', 'Successfully removed.');
        }catch (QueryException $exception){
            return redirect()->back()->with('message_error', 'Cannot be removed.');
        }
    }
}
