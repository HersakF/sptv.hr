<a data-toggle="modal" data-target="#importSchedulesItemModal" class="btn btn-lg btn-warning minw140 push-down-20"><span class="fa fa-plus white"></span> Import schedule</a>
@if($allSchedules->count() > 0)
    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="text-center"><i class="fa fa-calendar-check-o"></i></th>
            <th>Schedule</th>
            <th>Date</th>
            <th>Time</th>
            <th>Visibility</th>
            <th class="text-center"><i class="fa fa-pencil"></i></th>
            <th class="text-center"><i class="fa fa-trash"></i></th>
        </tr>
        </thead>
        <tbody>
        @foreach($allSchedules as $item)
            <tr>
                <td class="col-sm-1 text-center">
                    <i class="fa fa-calendar-check-o fa-2x"></i>
                </td>
                <td class="col-sm-4">
                    {{ $item->title }}
                </td>
                <td class="col-sm-2">
                    {{ Carbon\Carbon::parse( $item->date)->format("d.m.y.") }}
                </td>
                <td class="col-sm-2">
                    {{ Carbon\Carbon::parse( $item->time)->format("H:i") }}h
                </td>
                <td class="col-sm-1 text-center">
                    <select class="form-control select set-schedules-visibility" id="{{ $item->id }}">
                        <option value="0" @if($item->visibility == 0 ) selected @endif>Hidden</option>
                        <option value="1" @if($item->visibility == 1 ) selected @endif>Shown</option>
                    </select>
                </td>
                <td class="col-sm-1">
                    <a data-id="{{ $item->id }}" class="btn btn-block btn-lg btn-info editSchedulesItem">Edit</a>
                </td>
                <td class="col-sm-1">
                    <button type="button" class="btn btn-block btn-lg btn-danger mb-control deleteSchedulesItem" data-box="#deleteConfirmation" id="{{ $item->id }}">Remove</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {{ $allSchedules->links() }}
    </div>
@endif