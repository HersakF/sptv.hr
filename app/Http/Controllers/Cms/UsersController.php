<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('administrator');
    }

    public function index()
    {
        $user = Auth::user();
        $items = User::orderBy('id', 'desc')->paginate(10);
        return view('cms.users.index', compact('items', 'user'));
    }

    public function store(Request $request)
    {
        $request->merge(['password' => Hash::make($request->password)]);
        try{
            User::create($request->all());
            return redirect()->back()->with('message_success', 'Successfully saved.');
        }catch (QueryException $exception){
            return redirect()->back()->with('message_error', 'E-mail must be unique.');
        }

    }

    public function getItemInfo(Request $request)
    {
        $item = User::findOrFail($request->id);
        echo json_encode($item);
    }

    public function update(Request $request, $id)
    {
        try{
            User::findOrFail($id)->update($request->all());
            return redirect()->back()->with('message_success', 'Successfully updated.');
        }catch (QueryException $exception){
            return redirect()->back()->with('message_error', 'An error occurred.');
        }

    }

    public function destroy($id)
    {
        try{
            User::findOrFail($id)->delete();
            return redirect()->back()->with('message_success', 'Successfully removed.');
        }catch (QueryException $exception){
            return redirect()->back()->with('message_error', 'Cannot be removed.');
        }
    }
}
