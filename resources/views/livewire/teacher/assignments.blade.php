@section('title', 'Create Assigment ')

<div class="container mt-4">
    <!-- Class and Teacher Selection Card -->
    <div class="card mb-4">
        <div class="card-header"><i class="fa fa-plus-circle"></i> Create Assignment</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="class"><i class="fa fa-universal-access"></i> Class</label>
                        <select class="form-control" wire:model="year" wire:change="getsection"  id="exampleFormControlSelect1">
                            <option>Select Classesdddd</option>
                            @foreach($years as $year)
                            <option value="{{ $year->id }}">{{ ucfirst($year->title) }}</option>
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
                        <label for="subject"><i class="fa fa-book"></i> Subject</label>
                        <select class="form-control" wire:model="subject" placeholder="Search Subject" id="subject">
                            <option>Select Subject</option>
                            @foreach($assignsubjects as $subject)
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
        <div class="card-header"><i class="fa fa-info-circle"></i> Assignment Details</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="objective_questions">Creator</label>
                        <input type="text" class="form-control" placeholder="Enter Creator"  id="objective_questions">
                        @error('creator_name')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" placeholder="Enter Title" wire:model='title' id="title">
                        @error('title')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Description</label>
                        <input type="text" class="form-control" placeholder="Enter Description" wire:model='description' id="title">
                        @error('description')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="total_marks">Total Marks</label>
                        <input type="number" class="form-control" placeholder="Enter Total Marks" wire:model='total_marks' id="total_marks">
                        @error('total_marks')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                  
                    <div class="form-group">
                        <label for="title">Due Date</label>
                        <input type="date" class="form-control" placeholder="Enter Title" wire:model='due_date' id="title">
                        @error('due_date')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="passing_marks_percentage">Reference</label>
                        <input type="text" class="form-control" placeholder="Enter Reference" wire:model='reference' id="passing_marks_percentage">
                        @error('reference')
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
            <button type="button" wire:click="save" class="btn btn-danger btn-sm float-right m-2">
                <i class="fa fa-save"></i> Save
                <i class="fa fa-spinner fa-spin" wire:loading></i>
            </button>
        </div>
    </div>
</div>
