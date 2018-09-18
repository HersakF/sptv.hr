<?php

namespace App\Http\Controllers;

use App\Pages;
use App\Galleries;
use App\Videos;
use App\Carousels;
use App\Locations;
use App\Widgets;
use ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('administrator');
    }

    public function index()
    {
        $user           = Auth::user();
        $items          = Pages::with('carousels.carousels_fragments.photos')->orderBy('hierarchy', 'asc')->orderBy('id', 'desc')->where('page_id', null)->paginate(15);
        return view('cms.pages.index', compact('items', 'user'));
    }

    public function subIndex(Request $request)
    {
        $user           = Auth::user();
        $currentPage    = Pages::where('id', $request->id)->first();
        $parent         = Pages::where('id', $currentPage->page_id)->first();
        if($parent == null){
            $parent     = Pages::where('category', $currentPage->category)->first();
        }

        if($currentPage->sortability == 1) {
            $items        = Pages::with('carousels.carousels_fragments.photos')->orderBy('hierarchy', 'asc')->where('page_id', $request->id)->paginate(15);
        } else {
            $items        = Pages::with('carousels.carousels_fragments.photos')->orderBy('id', 'desc')->where('page_id', $request->id)->paginate(15);
        }

        return view('cms.pages.sub', compact('items', 'parent', 'currentPage', 'user'));
    }

    public function store(Request $request)
    {
        if($request->url != null){ $request->merge(['url' => str_slug($request->url)]); }
        Pages::create($request->all());
        return redirect()->back()->with('message_success', 'Successfully saved.');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $page = Pages::with('carousels.carousels_fragments.photos', 'galleries.galleries_fragments.photos', 'videos', 'locations')->findOrFail($id);

        $parent = Pages::where('id', $page->page_id)->first();

        $allWidgets     = Widgets::where('visibility', '=', '1')->orderBy('hierarchy', 'asc')->get();
        $allCarousels   = Carousels::with('carousels_fragments.photos')->orderBy('id', 'desc')->get();
        $allGalleries   = Galleries::with('galleries_fragments.photos')->orderBy('id', 'desc')->get();
        $allVideos      = Videos::whereDoesntHave('pages')->orderBy('id', 'desc')->get();
        $allLocations   = Locations::whereDoesntHave('pages')->orderBy('id', 'desc')->get();
        $allSchedules   = $page->schedules()->paginate();

        return view('cms.pages.edit', compact(
            'user',
            'page',
            'parent',
            'allWidgets',
            'allCarousels',
            'allGalleries',
            'allVideos',
            'allLocations',
            'allSchedules'
            )
        );
    }

    public function update(Request $request, $id)
    {
        if($request->url != null){ $request->merge(['url' => str_slug($request->url)]); }
        Pages::findOrFail($id)-> update($request->all());
        return redirect()->back()->with('message_success', 'Successfully updated.');
    }

    public function setVisibility(Request $request, $id)
    {
        Pages::findOrFail($id)->update($request->all());
        echo json_encode("Visibility updated.");
    }

    public function setSortability(Request $request, $id)
    {
        Pages::findOrFail($id)->update($request->all());
        $childrenPages = Pages::where('page_id', '=', $id)->get();
        $countPages    = $childrenPages->count() - 1;
        foreach ($childrenPages as $key => $page) {
            Pages::findOrFail($page->id)->update([
                'hierarchy' => $countPages
            ]);
            $countPages--;
        }
    }

    public function setNavigation(Request $request, $id)
    {
        Pages::findOrFail($id)->update($request->all());
        echo json_encode("Navigation updated.");
    }

    public function setMultiplicity(Request $request, $id)
    {
        Pages::findOrFail($id)->update($request->all());
        echo json_encode("Multiplicity updated.");
    }

    public function setRemovability(Request $request, $id)
    {
        Pages::findOrFail($id)->update($request->all());
        echo json_encode("Removability updated.");
    }

    public function sortItems(Request $request)
    {
        $skipper        = 15 * $request->paginator;
        foreach ($request->sortItems as $key => $sortItem) {
            $id = substr($sortItem, 5);
            Pages::findOrFail($id)->update(['hierarchy' => $key + $skipper]);
        }
    }

    public function destroy($id)
    {
        try{
            Pages::where('page_id', '=', $id)->delete();
            Pages::findOrFail($id)->delete();
            return redirect()->back()->with('message_success', 'Successfully removed.');
        }catch (QueryException $exception){
            return redirect()->back()->with('message_error', 'An error occurred.');
        }
    }
}
