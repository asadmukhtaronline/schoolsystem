<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <i class="fa fa-user-circle"></i> Assignment Profile
        </div>
        <div class="d-flex align-items-center">
            @if($showExtendDate)
                <input type="date" class="form-control form-control-sm mr-2" style="width: 200px;" wire:model='due_date'>
                <button class="btn btn-success btn-sm" wire:click="editdate({{ $assignment->id }})">
                    <i class="fa fa-spinner fa-spin" wire:loading></i>
                    <i class="fa fa-refresh" aria-hidden="true"></i> Extend Date
                </button>
            @endif
        </div>
    </div>

    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th><i class="fa fa-user-circle"></i> Title</th>
                <th><i class="fa fa-graduation-cap"></i> Teacher</th>
                <th><i class="fa fa-list"></i> Class</th>
                <th><i class="fa fa-list"></i> Due Date</th>
                <th><i class="fa fa-columns"></i> Subject</th>
                <th><i class="fa fa-status"></i> Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ ucfirst($assignment->title) }}</td>
                <td>{{ ucfirst($assignment->teacher->name ?? 'N/A') }}</td>
                <td>{{ ucfirst($assignment->class->title ?? 'N/A') }} <span class="badge badge-warning">{{ ucfirst($assignment->section->title ?? 'N/A') }}</td>
                <td>{{ ucfirst($assignment->due_date ?? 'N/A') }}</td>
                <td>{{ ucfirst($assignment->subject->title ?? 'N/A') }}</td>
                <td>
                    <button class="btn btn-sm {{ $status ? 'btn-success' : 'btn-danger' }}" wire:click="toggleStatus">
                        @if($assignment->status == 0)
                            <i class="fa fa-lock"></i> Close Assignment
                        @else 
                            <i class="fa fa-unlock"></i> Open Assignment
                        @endif
                    </button>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="card-header">
        <i class="fa fa-list"></i> Student Assigned
        <span class="fa fa-spinner fa-spin float-right" wire:loading></span>
    </div>

    <div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th><i class="fa fa-user"></i> Name</th>
                    <th><i class="fa fa-envelope"></i> Email</th>
                    <th><i class="fa fa-upload"></i> Upload</th>
                    <th><i class="fa fa-pencil"></i> Marks <span class="badge badge-danger float-right">{{ $assignment->total_marks }}</span></th>
                    <th><i class="fa fa-info-circle"></i> Status</th>
                    <th><i class="fa fa-cogs"></i> Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($assignment->stuassignment as $assignm)
                @if(!empty($assignm->enrollment->student))
                    <tr>
                        <td>
                            <img src="https://matheducatorz.com/storage/app/public/admissionform/{{ $assignm->enrollment->student->photo }}" border="25" class="wd-32 rounded-circle" width="30" height="30" alt="Image">
                            {{ ucfirst($assignm->enrollment->student->name) }}
                        </td>
                        <td>{{ $assignm->enrollment->student->email }}</td>
                        <td>
                            @if($assignm->status == 0 || $assignm->status == null)
                            <span class="badge badge-danger">Not Submitted</span>
                            @else
                            <a href="https://matheducatorz.com/storage/app/public/{{ $assignm->file }}" target="_blank">
                                <button class="btn btn-info btn-sm"> <i class="fa fa-download"></i> Download</button>
                            </a>
                            @endif
                        </td>
                        <td> 
                            <input type="text" class="form-control form-control-sm" value="{{ $assignm->obtain }}" wire:model="obtain" >
                        </td>
                        <td>
                            @if($assignm->status == 0 || $assignm->status == null)
                            <span class="badge badge-danger">Not Submitted</span>
                            @else
                            <span class="badge badge-success">Submitted</span>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-success btn-sm" wire:click="updateassignment({{ $assignm->id }})">
                             <i class="fa fa-refresh" aria-hidden="true"></i> Update
                            </button>
                        </td>
                    </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
