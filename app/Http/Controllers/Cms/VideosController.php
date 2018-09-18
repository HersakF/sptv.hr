<?php

namespace App\Http\Controllers;

use App\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class VideosController extends Controller
{
    public function __construct()
    {
        $this->middleware('administrator');
    }

    public function index()
    {
        $user = Auth::user();
        $items = Videos::with('pages')->orderBy('id', 'desc')->paginate(10);
        return view('cms.videos.index', compact('items', 'user'));
    }

    public function store(Request $request)
    {
        try{
            $parts = parse_url($request->standard_url);
            if(preg_match('/youtube/',$parts['host']) == true){
                Videos::create([
                    'page_id'     => $request->page_id,
                    'title'     => $request->title,
                    'host'      => $parts['host'],
                    'standard_url'     => $request->standard_url,
                    'embed_url'       => 'https://www.youtube.com/embed/'.substr($parts['query'],2),
                    'host_id'      => substr($parts['query'],2),
                ]);
                return redirect()->back()->with('message_success', 'Successfully saved.');
            }elseif(preg_match('/vimeo/',$parts['host']) == true){
                Videos::create([
                    'page_id'     => $request->page_id,
                    'title'     => $request->title,
                    'host'      => $parts['host'],
                    'standard_url'     => $request->standard_url,
                    'embed_url'       => 'https://vimeo/'.substr($parts['path'],1),
                    'host_id'      => substr($parts['path'],1),
                ]);
                return redirect()->back()->with('message_success', 'Successfully saved.');
            }else{
                return redirect()->back()->with('message_error', 'Please check URL.');
            }
        }catch (QueryException $exception){
            return redirect()->back()->with('message_error', 'An error occurred.');
        }
    }

    public function getItemInfo(Request $request)
    {
        $item = Videos::findOrFail($request->id);
        echo json_encode($item);
    }

    public function update(Request $request, $id)
    {
        try{
            $item = Videos::findOrFail($id);
            $parts = parse_url($request->standard_url);

            if(preg_match('/youtube/',$parts['host']) == true){
                $item->update([
                    'title'         => $request->title,
                    'host'          => $parts['host'],
                    'standard_url'  => $request->standard_url,
                    'embed_url'     => 'https://www.youtube.com/embed/'.substr($parts['query'],2),
                    'host_id'       => substr($parts['query'],2),
                ]);
                return redirect()->back()->with('message_success', 'Successfully updated.');
            }elseif(preg_match('/vimeo/',$parts['host']) == true){
                $item->update([
                    'title'         => $request->title,
                    'host'          => $parts['host'],
                    'standard_url'  => $request->standard_url,
                    'embed_url'     => 'https://vimeo/'.substr($parts['path'],1),
                    'host_id'       => substr($parts['path'],1),
                ]);
                return redirect()->back()->with('message_success', 'Successfully updated.');
            }else{
                return redirect()->back()->with('message_error', 'Please check URL.');
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
            Videos::findOrFail($id)->update(['hierarchy' => $hierarchy]);
            $hierarchy++;
        }
        echo json_encode("Sorting completed.");
    }

    public function setVisibility(Request $request, $id)
    {
        Videos::findOrFail($id)->update($request->all());
        echo json_encode("Visibility updated.");
    }

    public function destroy($id)
    {
        try{
            Videos::findOrFail($id)->delete();
            return redirect()->back()->with('message_success', 'Successfully removed.');
        }catch (QueryException $exception){
            return redirect()->back()->with('message_error', 'Cannot be removed.');
        }

    }
}
