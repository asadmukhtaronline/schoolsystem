@section('title', 'Quiz Management')
<div class="card">
    <div class="card-header">
        <i class="fa fa-user-circle"></i> Quiz Profile
        <div class="float-right d-flex align-items-center">
            @if($quiz->status == 1)
                <input type="date" class="form-control form-control-sm mr-2" style="width: 150px;" wire:model='due_date'>
                <button class="btn btn-success btn-sm mr-2" wire:click="extendDate({{ $quiz->id }})">
                    <i class="fa fa-spinner fa-spin" wire:loading></i>
                    <i class="fa fa-save"></i> Extend Date
                </button>
            @endif
            <a href="#" class="btn btn-danger btn-sm mr-2">
                <i class="fa fa-print"></i> Print
            </a>
            <a href="{{ route('admin.assignquiz', $quiz->id) }}" class="btn btn-primary btn-sm float-right mr-2">
            <i class="fa fa-users"></i> Assigned Students
        </a>
            <a href="{{ route('admin.question', $quiz->id) }}" class="btn btn-success btn-sm float-right">
            <i class="fa fa-plus-circle"></i> Create Question
        </a>
        </div>
    </div>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th><i class="fa fa-user-circle"></i> Title</th>
                <th><i class="fa fa-graduation-cap"></i> Teacher</th>
                <th><i class="fa fa-list"></i> Class</th>
                <th><i class="fa fa-columns"></i> Subject</th>
                <th><i class="fa fa-status"></i> Status</th>
                <th><i class="fa fa-status"></i> Due Date</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ ucfirst($quiz->title) }}</td>
                <td>{{ ucfirst($quiz->teacher->name ?? 'N/A') }}</td>
                <td>{{ ucfirst($quiz->class->title ?? 'N/A') }} <span class="badge badge-warning">{{ ucfirst($quiz->section->title ?? 'N/A') }}</span></td>
                <td>{{ ucfirst($quiz->subject->title) }}</td>
                <td>
                  @if($quiz->status == 1)
                     <button class="btn btn-success btn-sm" wire:click="toggleQuizStatus" data-toggle="tooltip" data-placement="top" title="Click For Close Quiz" wire:confirm="Are you sure? You want to close quiz."> <i class="fa fa-unlock"></i> Live</button>
                  @else
                      <button class="btn btn-danger btn-sm" wire:click="toggleQuizStatus" data-toggle="tooltip" data-placement="top" title="Click For Open Quiz" wire:confirm="Are you sure? You want to Live Quiz."> <i class="fa fa-clock"></i>Close</button>
                  @endif
                </td>
                <td>{{ ucfirst($quiz->due_date ?? 'N/A') }}</td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <div class="card-header">
        <i class="fa fa-question-circle"></i> Questions
        <div class="float-right">
            <button wire:click="setFilter('Subjective')" class="btn btn-info btn-sm">Subjective</button>
            <button wire:click="setFilter('Objective')" class="btn btn-info btn-sm">Objective</button>
        </div>
    </div>
    <div>
        <table class='table'>
            <tbody>
                @foreach($questions as $index => $question)
                    <tr class="bg-info" style="color:white;">
                        <td colspan="4">
                            <i class="fa fa-question-circle"></i> #{{ $question->question_no }} {{ ucfirst($question->title) }}
                            <button wire:click="alertConfirm({{ $question->id }})" class="btn btn-danger btn-sm float-right">
                                <i class="fa fa-trash"></i> 
                            </button>
                        </td>
                    </tr>
                    @foreach($question->answers as $answer)
                        <tr>
                            <td style="background-color: {{ $answer->status == 1 ? 'lightgreen' : 'white' }}">
                                <strong>{{ $loop->index + 1 }}.</strong> {{ ucfirst($answer->title) }}
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>
