@section('title', 'Timetable')
<div class="card">
    <div class="card-header bg-info text-light h5" style="background-color: #f0f0f0; border-bottom: 1px solid #ccc; padding: 10px;">
        <i class="fa fa-clock-o"></i> Timetable
    </div>
    <div class="card-body">
        <!-- Section Details -->
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="border: 0.5px solid #ccc; padding: 6px;">
                        <i class="fa fa-archive"></i> Class
                    </th>
                    <th style="border: 0.5px solid #ccc; padding: 6px;">
                        <i class="fa fa-sitemap"></i> Section
                    </th>
                    <th style="border: 0.5px solid #ccc; padding: 6px;">
                        <i class="fa fa-user-circle"></i> Class Incharge
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="border: 0.5px solid #ccc; padding: 6px;">{{ $section->year->title }}</td>
                    <td style="border: 0.5px solid #ccc; padding: 6px;">{{ $section->title }}</td>
                    <td style="border: 0.5px solid #ccc; padding: 6px;">{{ $section->teacher->name }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Timetable -->
        <table style="width: 100%; margin-bottom: 10px; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="border: 0.5px solid #ccc; padding: 6px; text-align: center;" class="bg-info text-light">
                        <i class="fa fa-clock-o"></i> Time Slots
                    </th>
                    @foreach($days as $day)
                        <th style="border: 0.5px solid #ccc; padding: 6px; text-align: center;" class="bg-info text-light">
                             <i class="fa fa-calendar"></i> {{ ucfirst($day->title) }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
            @foreach($timeslots as $timeslot)
                <tr>
                    <td style="border: 0.5px solid #ccc; padding: 8px; text-align: center;" class="bg-info text-light" rowspan="2">
                        {{ $timeslot->start_time }} - {{ $timeslot->end_time }}
                    </td>
                    @foreach($days as $day)
                        @php
                            $sectiontimeslot = App\Models\sectiontimeslot::where('day_id', $day->id)
                            ->where('timeslot_id', $timeslot->id)
                            ->where('section_id', $section->id)
                            ->first();
                        @endphp
                        <td style="border: 0.5px solid #ccc; padding: 8px; text-align: center;" class="@if($sectiontimeslot && $sectiontimeslot->status == 0) bg-danger @else bg-success @endif text-light">
                            @if($sectiontimeslot && $sectiontimeslot->status == 0)
                                @php
                                    $sectiontimetable = App\Models\sectiontimetable::find($sectiontimeslot->sectiontimetable_id);
                                @endphp
                                <div>{{ $sectiontimetable->subject->title }}</div>
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
</div>