@section('title', 'Section Details')
<div>
    <div class="card">
        <div class="card-header">
            <i class="fa fa-plus-circle"></i> Class Details
            <a href="{{ route('section.pdf', ['id' => $sectiondetail]) }}">
                <button type="button" class="btn btn-secondary btn-sm float-right">
                    <i class="fa fa-table"></i> Timetable
                </button>
            </a>
        </div>
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th><i class="fa fa-file-text"></i> Class</th>
                <th><i class="fa fa-list"></i> Section</th>
                <th><i class="fa fa-user-circle"></i> Incharge Name</th>
            </tr>
            <tr>
                <td>{{ ucfirst($section->year->title) }}</td>
                <td>{{ ucfirst($section->title) }}</td>
                <td>{{ ucfirst($section->teacher->name) }}</td>
            </tr>
        </table>
    </div>
    
    <div class="card">
        <div class="card-header">
            <i class="fa fa-check"></i> Add Subject
        </div>
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <th><i class="fa fa-list"></i> Select Subject</th>
                <th><i class="fa fa-thumbs-up"></i> Action </th>
            </tr>
            <tr>
                <td>
                    <select class="form-control" wire:model="subject" id="exampleFormControlSelect1">
                        <option>Select Subject</option>
                        @foreach($subjects as $sub)                
                            <option value="{{$sub->subject_id}}">{{ ucfirst($sub->subject->title) }}</option>
                        @endforeach
                    </select>   
                </td>
                <td>
                    <button type="button" wire:click="save" class="btn btn-danger btn-sm">
                        <i class="fa fa-plus-circle"></i> Add
                    </button>
                </td>
            </tr>
        </table>
    </div>
    
    <div class="card">
        <div class="card-header"></div>
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <th><i class="fa fa-list"></i> Subject</th>
                <th><i class="fa fa-list"></i> Action</th>
            </tr>
            @if($sectiontimetable->count() > 0)
                @foreach($sectiontimetable as $subject)
                    <tr>
                        <td>{{ ucfirst($subject->subject->title) }}</td>
                        <td>
                            <button data-toggle="modal" wire:click="selectcurrenctsectiontimetable({{ $subject->id }})" data-target="#exampleModal" type="button" class="btn btn-success btn-sm">
                                <i class="fa fa-clock-o fa-spin"></i> Set Timetable
                            </button>
                            <button wire:click="alertConfirm({{ $subject->id }})" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            @include('livewire.admin.classes.timetablepopup')
                            @livewireScripts
                            <script>
                                window.livewire.on('save', () => {
                                    $('#exampleModal').modal('hide');
                                });
                            </script>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3" align="center">No Subject Selected Yet</td>
                </tr>
            @endif
        </table>
    </div>
</div>