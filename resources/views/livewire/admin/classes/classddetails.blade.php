@section('title','Class Details')
<div>
    <div class="card">
        <div class="card-header"> <i class="fa fa-plus-circle"></i> Class Details</div>
            <div>
                <div class="container-fluid mt-1">
                    <div class="row">
                        <div class="col-3">
                            @if(config('app.env') === 'local')
                                <img src="{{ asset('storage/years') }}/{{ $class->image }}" border="25" width="100%" height="100%" alt="Image">
                            @else
                            <img src="{{ env('APP_URL') }}/storage/app/public/years/{{ $class->image }}" border="25" width="100%" height="100%"  alt="Image">
                            @endif
                        </div>
                        <div class="col-9">
                            <div class="form-group">
                                <table class="table table-bordered table-striped table-bordered table-hover">
                                    <tr>
                                        <th><i class="fa fa-pencil"></i> Title</th>
                                    </tr>
                                    <tr>
                                        <td>{{ ucfirst($class->title) }}</td>
                                    </tr>
                                    <tr>
                                        <th><i class="fa fa-align-left"></i> Description</th>
                                    </tr>
                                    <tr>
                                        <td>{{ ucfirst($class->description) }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    <div>
    <div class="card">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <div class="card-header"> <i class="fa fa-plus-circle"></i> Sections</div>
            <table class="table table-bordered table-striped table-hover">
                <tr>
                <th><i class="fas fa-pencil"></i> Title</th>
                <th><i class="fas fa-user"></i> Teacher</th>
                <th> <i class="fa fa-cog"></i> Action</th>
                    </tr>
                <tr>
                    <td>
                        <input type="text" class="form-control" placeholder="Title" wire:model="title"/>
                        @error('title')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </td>
                    <td>
                        <select class="form-control" wire:model="teacher">
                            <option>Select Teacher</option>
                            @foreach($addteachers as $addteacher)
                            <option value="{{ $addteacher->id }}">{{ ucfirst($addteacher->name) }}</option>
                            @endforeach
                        </select>   
                        @error('teacher')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </td>
                    <td>
                        <button class="btn btn-danger btn-sm mt-2" wire:click="createsection({{ $class->id }})"><i class="fa fa-save"></i> Save </button>
                    </td>
                </tr>
                @foreach($sections as $section)
                @if($section->count() > 0)
                        <tr>
                            <td>{{ucfirst($section->title )}}</td>
                            <td>{{ucfirst($section->teacher->name)}}</td>
                            <td>
                                <button wire:click="alertConfirm({{ $section->id }})" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                <button data-toggle="modal" wire:click="edit({{$section->id}})" data-target="#exampleModal" type="button" class="btn btn-success btn-sm" ><i class="fa fa-edit"></i></button>
                                <a href="{{ route('admin.sectiondetails', $section->id) }}">
                                <button data-toggle="modal" type="button" class="btn btn-success btn-sm" ><i class="fa fa-hand-pointer-o"></i></button>
                                </a>
                                @include('livewire.admin.classes.updatepopup')
                        @livewireScripts
                        <script>
                            window.livewire.on('update',()=>{
                                $('#exampleModal').modal('hide');
                            })
                            
                        </script>
                    </td>
                        </tr>
                @else 
                        <tr>
                            <td colspan="3" align="center">
                            <i class="fa fa-question-circle"></i> No Record Found
                            </td>
                        </tr>
                @endif
                @endforeach
            </table>
    </div>
</div>




