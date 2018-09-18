<?php

namespace App\Http\Controllers;

use App\Pages;
use App\Schedules;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class SchedulesController extends Controller
{
    public function __construct()
    {
        $this->middleware('administrator');
    }

    public function index()
    {
        $user = Auth::user();
        $items = Schedules::with('pages')->whereDate('date', '>=', Carbon::today()->toDateString())->orderBy('date')->orderBy('id')->paginate(15);
        return view('cms.schedules.index', compact('items', 'user'));
    }

    public function store(Request $request)
    {
        try {
            if ($request->hasFile('schedule')) {
                $schedulesCSV = $request->file('schedule');
                $schedulesCSV = array_map(function($v){return str_getcsv($v, ";");}, file($schedulesCSV));
                $currentSchedules = Schedules::select('id', 'date')->get();
                $currentSchedules = $currentSchedules->unique('date');

                // REMOVE EXISTING
                foreach ($schedulesCSV as $key => $schedule) {
                    if ($key == 0) {
                        continue;
                    } else {
                        $scheduleDate = $schedule[0];
                        foreach ($currentSchedules as $currentSchedule) {
                            if ($currentSchedule->date == $scheduleDate) {
                                try {
                                    Schedules::where('date', '=', $currentSchedule->date)->delete();
                                } catch (QueryException $exception) {
                                    return redirect()->back()->with('message_error', 'Cannot be removed.');
                                }
                            }
                        }
                    }
                }

                // REPLACE WITH NEW
                foreach($schedulesCSV as $key => $schedule){
                    if ($key == 0) {
                        continue;
                    } else {
                        $scheduleDate           = $schedule[0];
                        $scheduleTime           = $schedule[1];
                        $scheduleTitle          = $schedule[2];
                        $scheduleDescription    = $schedule[3];

                        if ($scheduleDate && $scheduleTime || $scheduleTitle || $scheduleDescription) {
                            Schedules::create([
                                'page_id'       => $request->page_id,
                                'title'         => $scheduleTitle,
                                'description'   => $scheduleDescription,
                                'date'          => $scheduleDate,
                                'time'          => $scheduleTime
                            ]);
                        } else {
                            continue;
                        }
                    }
                }
                return redirect()->back()->with('message_success', 'Successfully imported.');
            } else {
                return redirect()->back()->with('message_error', 'Please provide CSV file.');
            }
        } catch (QueryException $exception) {
            return redirect()->back()->with('message_error', 'An error occurred.');
        }
    }

    public function getItemInfo(Request $request)
    {
        $item           = Schedules::findOrFail($request->id);
        $linkedPages    = Pages::where('category', '=', 'highlights')->where('page_id', '!=', null)->orderBy('id', 'desc')->limit(25)->get();
        $source      = array([
            $item,
            $linkedPages
        ]);
        echo json_encode($source);
    }

    public function update(Request $request, $id)
    {
        try{
            Schedules::findOrFail($id)->update($request->all());
            return redirect()->back()->with('message_success', 'Successfully updated.');
        }catch (QueryException $exception){
            return redirect()->back()->with('message_error', 'An error occurred.');
        }

    }

    public function setVisibility(Request $request, $id)
    {
        Schedules::findOrFail($id)->update($request->all());
        echo json_encode("Visibility updated.");
    }

    public function destroy($id)
    {
        try{
            Schedules::findOrFail($id)->delete();
            return redirect()->back()->with('message_success', 'Successfully removed.');
        }catch (QueryException $exception){
            return redirect()->back()->with('message_error', 'Cannot be removed.');
        }
    }
}
