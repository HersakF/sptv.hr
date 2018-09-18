<?php

namespace App\Http\Controllers;

use App\Widgets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class WidgetsController extends Controller
{
    public function __construct()
    {
        $this->middleware('superadministrator');
    }

    public function index()
    {
        $user = Auth::user();
        $items = Widgets::orderBy('hierarchy', 'asc')->get();
        return view('cms.widgets.index', compact('items', 'user'));
    }

    public function store(Request $request)
    {
        try{
            Widgets::create($request->all());
            return redirect()->back()->with('message_success', 'Successfully saved.');
        }catch (QueryException $exception){
            return redirect()->back()->with('message_error', 'An error occurred.');
        }
    }

    public function getItemInfo(Request $request)
    {
        $item = Widgets::findOrFail($request->id);
        echo json_encode($item);
    }

    public function update(Request $request, $id)
    {
        try{
            $item = Widgets::findOrFail($id);
            $item->update($request->all());
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
            Widgets::findOrFail($id)->update(['hierarchy' => $hierarchy]);
            $hierarchy++;
        }
        echo json_encode("Sorting completed.");
    }

    public function setVisibility(Request $request, $id)
    {
        Widgets::findOrFail($id)->update($request->all());
        echo json_encode("Visibility updated.");
    }

    public function destroy($id)
    {
        try{
            Widgets::findOrFail($id)->delete();
            return redirect()->back()->with('message_success', 'Successfully removed.');
        }catch (QueryException $exception){
            return redirect()->back()->with('message_error', 'Cannot be removed.');
        }
    }
}
