@section('title', 'Quiz Management')
<div class="card">
    <div class="card-header">
        <i class="fa fa-user-circle"></i> Quiz Profile
        <div class="float-right d-flex align-items-center">
            @if($quiz_status === 'open')
                <input type="date" class="form-control form-control-sm mr-2" style="width: 150px;" wire:model='due_date'>
                <button class="btn btn-success btn-sm mr-2" wire:click="extendDate({{ $quiz->id }})">
                    <i class="fa fa-spinner fa-spin" wire:loading></i>
                    <i class="fa fa-save"></i> Extend Date
                </button>
            @endif
            <a href="#" class="btn btn-danger btn-sm mr-2">
                <i class="fa fa-print"></i> Print
            </a>
            <a href="{{ route('teacher.quizassign', $quiz->id) }}" class="btn btn-primary btn-sm mr-2">
                <i class="fa fa-users"></i> Assigned Students
            </a>
            <a href="{{ route('teacher.question', $quiz->id) }}" class="btn btn-success btn-sm">
                <i class="fa fa-plus-circle"></i> Create Question
            </a>
        </div>
    </div>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th><i class="fa fa-user-circle"></i> Title</th>
                <th><i class="fa fa-list"></i> Class</th>
                <th><i class="fa fa-columns"></i> Subject</th>
                <th><i class="fa fa-status"></i> Status</th>
                <th><i class="fa fa-status"></i> Due Date</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ ucfirst($quiz->title) }}</td>
                <td>{{ ucfirst($quiz->class->title ?? 'N/A') }} <span class="badge badge-warning">{{ ucfirst($quiz->section->title ?? 'N/A') }}</span></td>
                <td>{{ ucfirst($quiz->subject->title) }}</td>
                <td>
                    <button class="btn btn-{{ $quiz_status === 'open' ? 'success' : 'danger' }} btn-sm" wire:click="toggleQuizStatus">
                        <i class="fa fa-{{ $quiz_status === 'open' ? 'check' : 'close' }}"></i> {{ $quiz_status === 'open' ? 'Close' : 'Open' }}
                    </button>
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
                            <i class="fa fa-question-circle"></i> {{ ucfirst($question->title) }}
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
