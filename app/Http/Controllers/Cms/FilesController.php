<?php

namespace App\Http\Controllers;

use App\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\File;

class FilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('administrator');
    }

    public function index()
    {
        $user = Auth::user();
        $items = Files::orderBy('id', 'desc')->with('pages')->paginate(10);
        return view('cms.files.index', compact('items', 'user'));
    }

    public function store(Request $request)
    {
        try{
            if($request->hasFile('files')){

                $files = $request->file('files');
                $filesCount = count($files);
                $uploadsCount = 0;

                foreach ($files as $file){

                    $filename = md5(microtime()) . '.' . $file->getClientOriginalExtension();
                    $file->move('assets/uploads/files/', $filename);
                    Files::create([
                        'page_id' => $request->page_id,
                        'path' => 'assets/uploads/files/' . $filename,
                        'title' => $request->title,
                    ]);
                    $uploadsCount++;
                }
                if($uploadsCount == $filesCount){
                    return redirect()->back()->with('message_success', 'Successfully saved.');
                } else {
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
        $item = Files::findOrFail($request->id);
        echo json_encode($item);
    }

    public function update(Request $request, $id)
    {
        try{
            Files::findOrFail($id)->update($request->all());
            return redirect()->back()->with('message_success', 'Successfully updated.');
        }catch (QueryException $exception){
            return redirect()->back()->with('message_error', 'An error occurred.');
        }
    }

    public function sortItems(Request $request)
    {
        $hierarchy = 0;
        foreach ($request->sortItems as $sortItem){
            $id = substr($sortItem, 5);
            Files::findOrFail($id)->update(['hierarchy' => $hierarchy]);
            $hierarchy++;
        }
        echo json_encode("Sorting completed.");
    }

    public function setVisibility(Request $request, $id)
    {
        Files::findOrFail($id)->update($request->all());
        echo json_encode("Visibility updated.");
    }

    public function destroy($id)
    {
        try{
            $item = Files::findOrFail($id);
            $item->delete();
            File::delete($item->path);
            return redirect()->back()->with('message_success', 'Successfully removed.');
        }catch (QueryException $exception){
            return redirect()->back()->with('message_error', 'An error occurred.');
        }
    }
}
