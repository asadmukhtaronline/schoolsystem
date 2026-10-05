    @section('title', 'Teacher Profile')
    <div>
        <div class="card">
            <div class="card-header"><i class="fa fa-user-circle"></i> Teacher Profile</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        <img src="{{ env('APP_URL') }}/storage/app/public/teachers/{{ $teacher->picture }}" width="100%" height="350px" />
                    </div>
                    <div class="col-lg-9">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th><i class="fa fa-user-circle"></i> Name</th>
                                <td>{{ ucfirst($teacher->name) }}</td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-user"></i> Father Name</th>
                                <td>{{ ucfirst($teacher->father_name) }}</td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-address-card"></i> CNIC</th>
                                <td>{{ ucfirst($teacher->cnic) }}</td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-map-marker"></i> Address</th>
                                <td>{{ ucfirst($teacher->address) }}</td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-users"></i> Gender</th>
                                <td>{{ ucfirst($teacher->gender) }}</td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-calendar"></i> DOB</th>
                                <td>{{ ucfirst($teacher->dob) }}</td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-address-book"></i> Contract</th>
                                <td>{{ ucfirst($teacher->contract) }}</td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-pencil"></i> Description</th>
                                <td>{{ $teacher->description }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header"><i class="fa fa-clock-o"></i> Timetable</div>
            <table class="table table-bordered table-striped table-hover">
                <tr>
                    <th>Time Slots</th>
                    @foreach($days as $day)
                        <th>{{ ucfirst($day->title) }}</th>
                    @endforeach
                </tr>
                @foreach($timeslots as $timeslot)
                    <tr>
                        <td>{{ $timeslot->start_time }} - {{ $timeslot->end_time }}</td>
                        @foreach($days as $day)
                            @php
                                $timetable = App\Models\timetable::where('day_id',$day->id)->where('timeslot_id',$timeslot->id)->first();
                                $teacherslot = App\Models\teacherslot::where('timetable_id', $timetable->id)
                                                                       ->where('teacher_id', $teacher->id)
                                                                       ->where(function($query) {
                                                                            $query->where('status', 0)
                                                                                ->orWhere('status', 1);
                                                                         })
                                                                      ->first();
                                //$teacherslot = App\Models\teacherslot::where('timetable_id', $timetable->id)->where('status', 0)->first();
                            @endphp
                            <td class="@if($teacherslot && $teacherslot->status == 0) bg-success @else bg-danger @endif">
                                <span style="font-weight: bold !important; color:white;">
                                    @if($teacherslot && $teacherslot->status == 0) Free @else Busy @endif
                                </span>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
