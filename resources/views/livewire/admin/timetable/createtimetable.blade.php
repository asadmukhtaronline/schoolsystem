<div class="card">
        <div class="card-header">
            <i class="fa fa-list"></i> Student Timetable
        </div>
        <table class="table table-bordered table-striped table-bordered table-hover">
        <tr>
                <th>Time Slots</th>
                @foreach($day as $day )  
                    <th>{{ucfirst($day->title)}}</th>
                @endforeach
            </tr>
            @foreach($timeslot as $timeslot)  
            <tr>
            <td>{{ucfirst($timeslot->start_time)}} - {{ucfirst($timeslot->end_time)}}</td>
        </tr>
        @endforeach
        </table>
    </div>
</div>

