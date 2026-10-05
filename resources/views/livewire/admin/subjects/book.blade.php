@section('title','Subjects')
<div>
    <div class="card">
        <div class="card-header"> <i class="fa fa-plus-circle"></i> Create New Subject</div>
        <div class="card-body">
            <div class="container mt-1">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div style="height:230px; width:250px;">
                                @if (!empty($photo))
                                    <img src="{{ $photo->temporaryUrl() }}" height="100%" width="100%">
                                @endif
                            </div>
                            <div class="card-footer">
                                <input type="file" wire:model="photo">
                                @error('photo')     
                                <font color="red"><small>{{ $message }}</small></font>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                        <i class="fa fa-university" aria-hidden="true"></i><label for="">Subject</label>
                            <input type="text" class="form-control" wire:model="title" />
                            @error('title')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                        <div class="form-group mt-4">
                        <i class="fas fa-align-left"></i>
                            <label for="">Description</label>
                            <textarea class="form-control" rows="8" style="resize:none;" wire:model="description"></textarea>
                            @error('description')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">    
            <button type="button"  wire:click="save" class="btn btn-danger btn-sm float-right">
                <i class="fa fa-save"></i> Save Subject
            </button>
        </div>
    </div>
    <!-- -------------------------------------------------------------- -->
    <div class="card">
        <div class="card-header">
            <i class="fa fa-list"></i> All Subjects
        </div>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  
        <table class="table table-bordered table-striped table-bordered table-hover">     
        <tr>
            <td colspan="3">
            <input type="text" class="form-control" wire:keyup="searchsubjects" wire:model="searchsubject" placeholder="Search Subjects..." />
            </td>
        </tr>    
        <tr>
            <th><i class="fa fa-university" aria-hidden="true"></i> Subjects</th>
            <th><i class="fas fa-align-left"></i> Description</th>
            <th><i class="fas fa-cog"></i> Action</th>
        </tr>
            
        @if($subjects->count() > 0)

            @foreach($subjects as $subject)
            <tr>
                <th class = "col-2">
                @if(config('app.env') === 'local')
                    <img src="{{ asset('storage/subject') }}/{{ $subject->image }}" border="25" class="wd-32 rounded-circle" width="30" height="30" alt="Image">
                @else
                    <img src="{{ env('APP_URL') }}/storage/app/public/subject/{{ $subject->image }}" border="25" class="wd-32 rounded-circle" width="30" height="30" alt="Image">
                @endif
                    {{ ucfirst($subject->title) }}
                </th>
                <th class = "col-9">
                    {{ ucfirst($subject->description) }}
                </th>
                <th class = "col-1">
                    <button class="btn btn-danger btn-sm" wire:click="alertConfirm({{$subject->id}})" wire:confirm.prompt="Are you sure, you want to delete?">
                        <i class="fa fa-trash"></i>
                </button>
                <a href="{{ route('admin.editbook', $subject->id) }}">   
                    <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                    </a>
                
                {{-- <button class="btn btn-success btn-sm" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-edit"></i></button> --}}
                </td>
            </tr>
            @endforeach
            @else 
            <tr>
                <td colspan="3" class="text-center">
                    <i class="fa fa-exclamation-triangle text-warning"></i>  Not Found Any Subject 
                </td>
            </tr>
            @endif
        </table>
    </div>
</div>