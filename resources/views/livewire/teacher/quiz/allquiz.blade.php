

@section('title','All Quizzes')

@section('content')
<div class="card">
    <div class="card-header">
        <i class="fa fa-list"></i> All Quizzes
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <td colspan="12">
            <input type="text" class="form-control" wire:keyup="searchquizes" wire:model="searchquiz" placeholder="Search Quizzes..." />
            </td>
        </tr>
            <tr>
            
                <th>ID</th> 
                <th><i class="fa fa-pencil" aria-hidden="true"></i> Title</th> 
                <th><i class="fa fa-universal-access"></i> Classes</th>
                <th><i class="fas fa-user"></i> Teachers</th>
                <th><i class="fa fa-university" aria-hidden="true"></i> Subjects</th>
                <th><i class="fas fa-cog"></i> Action</th>

            </tr>
            
        </thead>
        <tbody>
        @if($quizzes->count() > 0)

            @foreach($quizzes as $quiz)
                <tr>
                <td>{{$quiz->id}}</td>

                    <td>{{ ucfirst($quiz->title)  }}</td>
                    <td>{{ ucfirst($quiz->class->title?? 'N/A')  }} <span class="badge badge-warning">{{ ucfirst($quiz->section->title ?? 'N/A') }}</span></td>
                    <td><img src="https://matheducatorz.com/storage/app/public/teachers/{{ $quiz->picture }}" border="25" class="wd-32 rounded-circle" width="30" height="30" alt="picture">
                    {{ ucfirst($quiz->teacher->name?? 'N/A') }}</td>
                    <td>{{ ucfirst($quiz->subject->title??'N/A') }}</td>
                    <td>
                    <a href="{{route('teacher.editquiz', $quiz->id)}}">
                        <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                    </a>

                      <a href="{{ route('teacher.quizprofile', $quiz->id) }}">
                        <!-- <a href=""> -->
                        <button class="btn btn-info btn-sm"><i class="fa fa-user-circle"></i></button>
                        </a> 
                    <button wire:click="alertConfirm({{ $quiz->id }})" class="btn btn-danger btn-sm"  ><i class="fa fa-trash"></i></button>
                    </td>
                        </a>

                </tr>
            @endforeach
            @else 
        <tr>
            <td colspan="12" class="text-center">
                Not Found
            </td>
        </tr>
        @endif
        </tbody>
    </table>
</div>
