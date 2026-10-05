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
                    @foreach($quiz->stuquiz as $quiz)
                        @if(!empty($quiz->enrollment->student))
                        <tr>
                            <td>
                                <span class="badge badge-info">
                                    {{ $quiz->id }}
                                </span>
                            </td>
                            <td> <img class="rounded-circle" height="30px" src="https://matheducatorz.com/storage/app/public/admissionform/{{ $quiz->enrollment->student->photo }}" /> {{ ucfirst($quiz->enrollment->student->name) }}</td>
                            <td>{{ $quiz->quiz->section->year->title }} <span class="badge badge-info">{{ $quiz->quiz->section->title }}</span></td>
                            <td class="text-center">
                                <span class="badge badge-info">
                                {{ $quiz->quiz->total_marks }}
                                </span>
                            </td>
                            <td class="text-center"> 
                                <span class="badge badge-info">
                                    @if($quiz->marks != null)
                                        {{ $quiz->marks }}
                                    @else 
                                        Null
                                    @endif
                                </span>
                            </td>
                            <td>
                                <input type="text" class="form-control form-control-sm">
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm"><i class="fa fa-thumbs-up"></i></button>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                    {{-- @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
