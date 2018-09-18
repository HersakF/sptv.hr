<?php

namespace App\Http\Controllers;

use App\Carousels;
use App\CarouselsFragments;
use App\Photos;
use ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class CarouselsController extends Controller
{
    public function __construct()
    {
        $this->middleware('administrator');
    }

    public function index()
    {
        $user = Auth::user();
        $items = Carousels::orderBy('id', 'desc')->paginate(10);
        return view('cms.carousels.index', compact('items', 'user'));
    }

    public function store(Request $request)
    {
        try{
            if($request->hasFile('photos')){

                $carousel_id = Carousels::create([
                    'page_id'     => $request->page_id,
                    'title'     => $request->title,
                ])->id;

                $files = $request->file('photos');
                $filesCount = count($files);
                $uploadsCount = 0;

                foreach ($files as $file){
                    $filename =md5(microtime()) . '.' . $file->getClientOriginalExtension();
                    ImageUpload::make($file)->save(public_path('/assets/uploads/photos/' . $filename), 60);

                    $photo_id = Photos::create([
                        'path' => 'assets/uploads/photos/' . $filename,
                        'caption' => $request->title,
                        'alt' => $request->title,
                    ])->id;

                    CarouselsFragments::create([
                        'title' => $request->title,
                        'carousel_id' => $carousel_id,
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
                Carousels::create($request->all());
                return redirect()->back()->with('message_success', 'Successfully saved.');
            }
        }catch (QueryException $exception){
            return redirect()->back()->with('message_error', 'An error occurred.');
        }
    }

    public function edit($id)
    {
        $carousel = Carousels::findOrFail($id);
        $items = Carousels::with('carousels_fragments.photos')->findOrFail($id);
        $user = Auth::user();
        return view('cms.carousels.edit', compact('carousel', 'items', 'user'));
    }

    public function getItemInfo(Request $request)
    {
        $item = Carousels::findOrFail($request->id);
        echo json_encode($item);
    }

    public function update(Request $request, $id)
    {
        Carousels::findOrFail($id)->update($request->all());
        return redirect()->back()->with('message_success', 'Successfully updated.');
    }

    public function setVisibility(Request $request, $id)
    {
        Carousels::findOrFail($id)->update($request->all());
        echo json_encode("Visibility updated.");
    }

    public function destroy($id)
    {
        try{
            CarouselsFragments::where('carousel_id', '=', $id)->delete();
            Carousels::findOrFail($id)->delete();
            return redirect()->back()->with('message_success', 'Successfully removed.');
        }catch (QueryException $exception){
            return redirect()->back()->with('message_error', 'Cannot be removed.');
        }
    }
}
