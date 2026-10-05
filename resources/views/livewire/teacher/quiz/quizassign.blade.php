@section('title', 'Assign Quiz')
<div>
    <div class="card">
        <div class="card-header">
            <i class="fa fa-user-circle"></i> Students Assigned
        </div>
        <div>
            <table class='table table-bordered table-striped table-hover'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th><i class="fa fa-user-circle"></i> Student Name</th>
                        <th><i class="fa fa-list"></i> Class</th>
                        <th><i class="fa fa-graduation-cap"></i>total Marks</th>
                        <th><i class="fa fa-graduation-cap"></i> Marks</th>
                        <th><i class="fa fa-check-circle"></i> Status</th>
                        <th><i class="fa fa-save"></i> Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($enrollments as $index => $enrollment)
             
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ ucfirst($enrollment->student->name ?? 'N/A') }}</td>
                            <td>{{ ucfirst($enrollment->year->title ?? 'N/A') }} <span class="badge badge-warning">{{ ucfirst($enrollment->section->title ?? 'N/A') }}</span></td>
                            <td>{{ $total_marks }}</td>
                            <td>
                                <input type="number" class="form-control" placeholder="Enter marks" wire:model="marks.{{ $enrollment->id }}">
                                @error('marks.' . $enrollment->id)
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                            <td>
                                @if ($enrollment->stuquiz && $enrollment->stuquiz->status == 1)
                                   <h6><span class="badge badge-success">  Submitted </span></h6>
                                @else
                                <h6><span class="badge badge-danger"> Not Submitted </span></h6>
                                @endif
                            </td>
                            <td>
                                <!-- Save button for each row -->
                                <button class="btn btn-danger btn-sm" wire:click="saveSingleMarks({{ $enrollment->id }})">
                                    Save
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    {{-- @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
