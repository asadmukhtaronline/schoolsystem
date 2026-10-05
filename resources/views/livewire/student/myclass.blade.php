<div>
    <div class="card">
        <div class="card-header">
            <i class="fa fa-list"></i> My Enrollments
        </div>
        <table class="table table-bordered table-hover table-stripped">
            <tr>
                <th><i class="fa fa-list"></i> Roll #</th>
                <th><i class="fa fa-graduation-cap"></i> Class</th>
                <th><i class="fa fa-user-circle"></i> Incharge</th>
                <th><i class="fa fa-book"></i> Subjects</th>
                <th><i class="fa fa-clipboard"></i> Assignments</th>
                <th><i class="fa fa-question-circle"></i> Quizes</th>
                <th><i class="fa fa-wrench"></i> Action</th>
            </tr>
            @foreach(Auth::user()->student->enrollment as $enrollment)
            <tr>
                <td>{{ $enrollment->rollnumber }}</td>
                <td>{{ $enrollment->section->year->title }} <span class="badge badge-danger">{{ $enrollment->section->title }}</span></td>
                <td>{{ ucfirst($enrollment->section->teacher->name) }}</td>
                <td> 
                    @foreach($enrollment->section->sectiontimetables as $section)
                    <span class="badge badge-info">{{ $section->subject->title }}</span>
                    @endforeach
                </td>
                <td class="text-center">
                    <span class="badge badge-info">{{ $enrollment->section->assignments->count() }}</span>
                </td>
                <td class="text-center">
                    <span class="badge badge-info">{{ $enrollment->section->quizes->count() }}</span>
                </td>
                <td>
                    <button class="btn btn-success btn-sm"><i class="fa fa-thumbs-up"></i></button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
