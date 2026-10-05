<div>
    <style>
        .text-white{
            color:white !important;
        }
    </style>
    <div class="card">
        <div class="card-header">
            <i class="fa fa-list"></i> Quizes
        </div>
        <table class="table table-bordered table-hover table-stripped">
            <tr>
                <th><i class="fa fa-list"></i> Roll #</th>
                <th><i class="fa fa-graduation-cap"></i> Class</th>
                <th><i class="fa fa-user-circle"></i> Quiz Incharge</th>
                <th><i class="fa fa-book"></i> Subjects</th>
                <th><i class="fa fa-book"></i> Dealine </th>
                <th><i class="fa fa-list-alt"></i> Marks </th>
                <th><i class="fa fa-wrench"></i> Action</th>
            </tr>
            @foreach(Auth::user()->student->enrollment as $enrollment)
            @foreach($enrollment->stuquiz as $quiz)
                @if($quiz->quiz->status != 0)
                <tr class="@if($quiz->quiz->status == 1) bg-success text-white @endif">
                    <td>{{ $enrollment->rollnumber }}</td>
                    <td>{{ $enrollment->section->year->title }} <span class="badge badge-danger">{{ $enrollment->section->title }}</span></td>
                    <td>{{ $quiz->quiz->teacher->name }}</td>
                    <td>{{ ucfirst($quiz->quiz->subject->title) }}</td>
                    <td>{{ $quiz->quiz->due_date }} </td>
                    <td>
                        5/10
                    </td>
                    <td>
                        @if($quiz->quiz->status == 1)
                        <button class="btn btn-info btn-sm"> <i class="fa fa-link"></i> Attend Quiz</button>
                        @else 
                            <span class="badge badge-danger">Closed</span>
                        @endif
                    </td>
                </tr>
                @endif
            @endforeach
            @endforeach
        </table>
    </div>
</div>
