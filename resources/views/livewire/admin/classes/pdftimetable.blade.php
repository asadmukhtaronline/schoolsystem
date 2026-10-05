@section('title', 'Timetable')
<div class="card">
    <div class="card-header bg-info text-light h5" style="background-color: #f0f0f0; border-bottom: 1px solid #ccc; padding: 10px;">
        <i class="fa fa-clock-o"></i> Timetable
        <button type="button" class="btn btn-dark btn-sm float-right" wire:click="generatePDF">
            <i class="fa fa-download mx-2"></i>
        </button>
    </div>
    <div class="card-body">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                   <th style="border: 0.5px solid #ccc; padding: 6px;" class="">
                    <i class="fa fa-archive"></i> Class
                </th>
                <th style="border: 0.5px solid #ccc; padding: 6px;" class="">
                    <i class="fa fa-sitemap"></i> Section
                </th>
                <th style="border: 0.5px solid #ccc; padding: 6px;" class="">
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
                        <td style="border: 0.5px solid #ccc; padding: 8px; text-align: center;"  class="bg-info text-light">{{ $timeslot->start_time }} - {{ $timeslot->end_time }}</td> 
                        @foreach($days as $day)
                            @php   
                                $sectiontimeslot = App\Models\sectiontimeslot::where('day_id', $day->id)
                                    ->where('timeslot_id', $timeslot->id)
                                    ->where('section_id', $section->id)
                                    ->first();
                            @endphp

                            <td style="border: 0.5px solid #ccc; padding: 8px;" class="@if($sectiontimeslot && $sectiontimeslot->status == 0) bg-danger @else bg-success @endif text-light">
                                @if($sectiontimeslot && $sectiontimeslot->status == 0)
                                    @php
                                        $sectiontimetable = App\Models\sectiontimetable::find($sectiontimeslot->sectiontimetable_id);
                                    @endphp

                                    @if($sectiontimetable)
                                        <div>{{ $sectiontimetable->subject->title ?? 'N/A' }}/{{ $sectiontimetable->teacher->name ?? 'N/A'}}</div>
                                        <div></div>
                                    @endif
                                @else
                                    Free
                                @endif
                            </td>
                        @endforeach   
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
