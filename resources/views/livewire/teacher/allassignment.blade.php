@section('title','All Assignments')
<div class="card">
    <div class="card-header">
        <i class="fa fa-tasks"></i> All Assignments
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th><i class="fa fa-pencil" aria-hidden="true"></i> Title</th>
                <th><i class="fa fa-user"></i> Teacher</th>
                <th><i class="fa fa-universal-access"></i> Class</th>
                <th><i class="fa fa-users"></i> Section</th>
                <th><i class="fa fa-users"></i> Creator</th>
                <th><i class="fa fa-university" aria-hidden="true"></i> Subject</th>
                <th><i class="fa fa-cog"></i> Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assignments as $assignment)
                <tr>
                    <td>{{ $assignment->id }}</td>
                    <td>{{ ucfirst($assignment->title) }}</td>
                    <td>{{ ucfirst($assignment->teachers->name) ?? 'N/A' }}</td>
                    <td>{{ ucfirst($assignment->year->title) ?? 'N/A' }}</td>
                    {{-- <td>{{ ucfirst($assignment->sections->title) ?? 'N/A' }}</td> --}}
                    <td>fff</td>
                    <td>{{ ucfirst($assignment->creator_name) ?? 'N/A' }}</td>
                    <td>{{ ucfirst($assignment->subject->title) ?? 'N/A' }}</td>
                    {{-- <td>admin</td> --}}
                    <td>
                        <a href="{{ route('admin.editassignment', $assignment->id) }}">
                            <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                        </a>
                        <a href="{{ route('admin.assignmentprofile', $assignment->id) }}">
                            <button class="btn btn-info btn-sm"><i class="fa fa-user-circle"></i></button>
                        </a>
                        <button wire:click="alertConfirm({{ $assignment->id }})" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
