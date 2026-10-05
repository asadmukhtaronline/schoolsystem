@section('title', 'Timetable')

<div class="card mt-5">
    <div class="card-header" style="background-color: #f0f0f0; border-bottom: 1px solid #ccc; padding: 10px;">
        <i class="fa fa-clock-o"></i> {{$teacherName}} Timetable
    </div>
    <table style="width: 100%; margin-bottom: 10px; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 0.5px solid #ccc; padding: 6px; text-align: center;" class="bg-info text-light">Time Slots</th>
                @foreach($days as $day)
                    <th style="border: 0.5px solid #ccc; padding: 10px; text-align: center;" class="bg-info text-light">{{ ucfirst($day->title) }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($timeslots as $timeslot)
                <tr>
                    <td style="border: 0.5px solid #ccc; padding: 8px; text-align: center;"  class="bg-info text-light" rowspan="2">{{ $timeslot->start_time }} - {{ $timeslot->end_time }}</td>
                    @foreach($days as $day)
                        @php
                            $sectiontimeslot = $sectiontimeslots->get($day->id)?->get($timeslot->id);
                        @endphp

                        <td style="border: 0.5px solid #ccc; padding: 8px; text-align: center;" class="@if($sectiontimeslot && $sectiontimeslot->status == 0) bg-danger @else bg-success @endif text-light">
                            @if($sectiontimeslot && $sectiontimeslot->status == 0)
                                <div>{{ $sectiontimeslot->sectiontimetable->year->title }} /</div>
                                <div>{{ $sectiontimeslot->sectiontimetable->section->title }} /</div>
                                <div>{{ $sectiontimeslot->sectiontimetable->subject->title }}</div>
                            @else
                                Free
                            @endif
                        </td>
                    @endforeach
                </tr>
                <tr></tr>
            @endforeach     
        </tbody>
    </table>
</div>
