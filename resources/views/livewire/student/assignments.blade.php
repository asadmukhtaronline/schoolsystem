<div>
    <div class="card">
        <div class="card-header">
            <i class="fa fa-clipboard"></i> Assignment
            <i class="fa fa-spinner fa-spin float-right" wire:loading></i>
        </div>
        @foreach(Auth::user()->student->enrollment as $enrollment)
        <table class="table table-bordered table-hover table-stripped">
            @foreach($enrollment->stuassignment as $stuassignment)
                <tr class="bg-danger">
                    <th class="text-white" colspan="5"> 
                        <i class="fa fa-clipboard"></i> {{ $stuassignment->assignment->title }}
                        @if($stuassignment->assignment->status == 0)
                        <span class="badge badge-success float-right"> <i class="fa fa-unlock"></i> Open</span>
                        @else 
                        <span class="badge badge-info float-right"> <i class="fa fa-lock"></i> Closed</span>
                        @endif
                    </th>
                </tr>
                <tr>
                    <th><i class="fa fa-id-card"></i> Roll Number</th>
                    <th><i class="fa fa-calendar"></i> Deadline</th>
                    <th><i class="fa fa-user-circle"></i> Trainer</th>
                    <th><i class="fa fa-book"></i> Subject</th>
                    <th><i class="fa fa-university"></i> Class</th>
                </tr>
                <tr>
                    <td>
                        {{ $stuassignment->enrollment->rollnumber }}
                    </td>
                    <td>
                        {{ $stuassignment->assignment->due_date }}
                    </td>
                    <td>
                        {{ ucfirst($stuassignment->assignment->teacher->name) }}
                    </td>
                    <td>
                        {{ ucfirst($stuassignment->assignment->subject->title) }}
                    </td>
                    <td>
                        {{ $stuassignment->assignment->section->year->title }}
                        <span class="badge badge-info">
                            {{ $stuassignment->assignment->section->title }}
                        </span>
                    </td>
                </tr>
                @if($stuassignment->status == 0)
                    @if($stuassignment->assignment->status == 0)
                        <tr>
                            <td colspan="4">
                                <input type="file" wire:model="submitfile"> <br />
                                @error('submitfile')
                                <small>
                                    <font color="red">
                                        <b> 
                                            <i class="fa fa-exclamation-triangle"></i> {{ $message }}
                                        </b>
                                    </font>
                                </small>
                                @enderror
                            </td>
                            <td colspan="1">
                                <button class="btn btn-sm btn-warning" wire:click="submitassignment({{ $stuassignment->id }})"> <i class="fa fa-upload"></i> Submit Assignment</button>
                            </td>
                        </tr>
                    @else 
                    <tr>
                        <th colspan="5" class="text-center bg-danger text-white">
                            <i class="fa fa-exclamation-triangle"></i> You Cant Submit Assignment, Assignment Is Closed
                        </th>
                    </tr>
                    @endif
                @else 
                    <tr>
                        <th colspan="5" class="text-center bg-success text-white">
                            <i class="fa fa-check"></i> Your Assignment Has Been Submitted Succesfully.
                        </th>
                    </tr>
                @endif
            @endforeach
        </table>
        @endforeach
    </div>
</div>
