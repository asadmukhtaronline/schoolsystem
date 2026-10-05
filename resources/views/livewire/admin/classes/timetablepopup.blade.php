@section('title', 'Select Timetable')

<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:250%; position:relative; right:380px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-clock-o"></i> All Timetable</h5>
                <button type="button" wire:click.prevent="cancel" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div>
                @php 
                    $sectiontimeslot = App\Models\sectiontimeslot::where('sectiontimetable_id', $current_section_table)->get();
                @endphp
                @if($sectiontimeslot->count() > 0)
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Day</th>
                                <th>Timeslot</th>
                                <th>Teacher</th> 
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sectiontimeslot as $stimeslot)
                                <tr>
                                    <td>{{ $stimeslot->sectiontimetable->subject->title }}</td>
                                    <td>{{ $stimeslot->day->title }}</td>
                                    <td>
                                    <select name="timslot" id="timslot" wire:change="getteacher({{ $stimeslot->day->id }})" wire:model="timslot" class="form-control">
                                        <option value="" disabled>Select Time Slot</option>
                                        @foreach($timeslots as $time)
                                            <option value="{{ $time->id }}">{{ $time->start_time }} - {{ $time->end_time }}</option>
                                        @endforeach
                                    </select>
                                    </td>
                                    <td>
                                        <select  class="form-control" wire:model="steacher">
                                            <option >Select Teacher</option>
                                            @if(sizeof($teachers) > 0)
                                            @foreach($teachers as $teacher)
                                                @if ($teacher->teacher) 
                                                    <option value="{{ $teacher->teacher->id }}">{{ $teacher->teacher->name }}</option>
                                                @endif
                                            @endforeach
                                            @else
                                                <option>No Teacher Available</option>
                                            @endif
                                        </select>
                                    </td> 
                                    <td>
                                        <button class="btn btn-danger btn-sm" wire:click="select_teacher({{ $stimeslot->id }})"><i class="fa fa-save"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else 
                    <table class="table table-bordered table-striped table-hover">
                        <tbody>
                            <tr>
                                @foreach($day as $index => $d)
                                    <td>
                                        <label>
                                            <input type="checkbox" name="day[{{ $index }}][{{ $d->id }}]" 
                                                wire:click="toggleDay({{ $d->id }})" 
                                                @if(in_array($d->id, $days)) checked @endif>
                                            {{ $d->title }}
                                        </label>
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                @endif
                {{-- <button wire:click="select" class="btn btn-success">Select</button> --}}
                
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="select" class="btn btn-primary">Select</button>
                <button type="button" wire:click.prevent="cancel" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
