@section('title', 'Quiz Management')

<div class="container mt-4">
    <!-- Class and Teacher Selection Card -->
    <div class="card mb-4">
        <div class="card-header"><i class="fa fa-plus-circle"></i> Create Quiz</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="class"><i class="fa fa-universal-access"></i> Class</label>
                        <select class="form-control" wire:model="year" wire:change="getsection()" id="exampleFormControlSelect1">
                        <option>Select Class</option>
                            @foreach($years as $years)
                            <option value="{{ $years->id }}">{{ ucfirst($years->title) }}</option>
                            @endforeach
                        </select>
                        @error('year')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="section"><i class="fa fa-university"></i> Section</label>
                        <select wire:model="section" class="form-control" id="exampleFormControlSelect1">
                            <option>Select Section</option>
                            @foreach($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->title }}</option>
                            @endforeach
                            </select>  
                            @error('section')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                            </div>
                            </div>
                            </div>
                            <hr>
                            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="teacher"><i class='fa fa fa-graduation-cap'></i> Teacher</label>
                        <select wire:model="teacher" class="form-control" id="exampleFormControlSelect1">
                            <option>Select Teacher</option>
                            @foreach($sections as $section)
                            <option value="{{ $section->teacher->id }}">{{ $section->teacher->name }}</option>
                            @endforeach
                            </select>
                        @error('teacher')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="subject"><i class="fa fa-book"></i> Subject</label>
                        <select class="form-control" wire:model="subject" placeholder="Search Subject" id="subject">
                            <option>Select Subject</option>
                            @foreach($sectiontimetable as $subject) 
                            <option value="{{$subject->subject_id}}">{{ ucfirst($subject->subject->title)}}</option>
                            @endforeach
                            <!-- Add subject options here -->
                        </select>
                        @error('subject')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Test Details Card -->
    <div class="card mb-4">
        <div class="card-header"><i class="fa fa-info-circle"></i> Quiz Details</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" placeholder="Enter Title" wire:model='title' id="title">
                        @error('title')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_of_questions">No of Questions</label>
                        <input type="number" class="form-control" placeholder="Enter Number of Questions" wire:model='no_of_questions' id="no_of_questions">
                        @error('no_of_questions')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="subjective_questions">Subjective Questions</label>
                        <input type="number" class="form-control" placeholder="Enter Subjective Questions" wire:model='subjective_questions' id="subjective_questions">
                        @error('subjective_questions')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="objective_questions">Objective Questions</label>
                        <input type="number" class="form-control" placeholder="Enter Objective Questions" wire:model='objective_questions' id="objective_questions">
                        @error('objective_questions')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="total_marks">Total Marks</label>
                        <input type="number" class="form-control" placeholder="Enter Total Marks" wire:model='total_marks' id="total_marks">
                        @error('total_marks')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="passing_marks_percentage">Passing Marks Percentage</label>
                        <input type="number" class="form-control" placeholder="Enter Passing Marks Percentage" wire:model='pass_marks_percentage' id="pass_marks_percentage">
                        @error('pass_marks_percentage')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Save Button -->
    <div class="card">
        <div class="card-body">
        <button type="button" wire:click="update({{ $quiz->id }})" class="btn btn-danger btn-sm float-right m-2">
        <i class="fa fa-save"></i> Edit Quiz
                <i class="fa fa-spinner fa-spin" wire:loading></i>
            </button>
        </div>
    </div>
</div>
