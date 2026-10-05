@section('title','Staff Category')
<div class="card">
    <div class="card-header"> <i class="fa fa-plus-circle"></i> Create New Category</div>
    <div>
        @if(session()->has('messageadd'))
        <div class="alert alert-success">
             {{session('messageadd')}}
        </div>
        @endif
    </div>
    <div class="card-body"> 
        <div class="container mt-1">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div style="height:230px; width:250px;">
                            @if (!empty($photo))
                                <img src="{{ $photo->temporaryUrl() }}" height="100%" width="100%">
                            @endif
                        </div>
                        <div class="card-footer">
                            <input type="file" wire:model="picture">
                            @error('picture')     
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror  
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="form-group">
                        <i class="fa fa-user"></i>
                        <label for="">Category</label>
                        <input type="text" class="form-control" wire:model="title" />
                        @error('title')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                    <i class="fa fa-align-left"></i>
                        <label for="">Description</label>
                        <textarea class="form-control" rows="8" style="resize:none;" wire:model="categorydescription"></textarea>
                        @error('categorydescription')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">    
        <button type="submit"  wire:click="save" class="btn btn-danger btn-sm float-right">
            <i class="fa fa-save"></i> Save Category
        </button>
    </div>
    
    <div class="card">
        <div class="card-header">
            <i class="fa fa-list"></i> All Designations
        </div>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <table class="table table-bordered table-striped table-bordered table-hover">
            <tr>
            <th><i class="fas fa-pencil"></i> Title</th>
            <th><i class="fa fa-align-left"></i> Desciption</th>
            <th> <i class="fa fa-cog"></i> Action</th>
            </tr>
            @foreach($category as $category)
            <div class="container">
                <div class="row">
            <tr>
                <th class="col-2">
                @if(config('app.env') === 'local')
                    <img src="{{ asset('storage/staffcategory') }}/{{ $category->picture }}" border="25" class="wd-32 rounded-circle" width="30" height="30" alt="Image">
                @else
                <img src="{{ env('APP_URL') }}/storage/app/public/staffcategory/{{ $category->picture }}" border="25" class="wd-32 rounded-circle" width="30" height="30" alt="picture">
                @endif
                {{-- <img src="https://matheducatorz.com/storage/app/public/staffcategory/{{ $category->picture }}" border="25" class="wd-32 rounded-circle" width="30" height="30" alt="Image"> --}}
                    {{ ucfirst($category->title) }}
                </th>
                <th class="col-8">{{$category->description}}</th>
                <th class="col-1">
                    <button class="btn btn-danger btn-sm" wire:click="alertConfirm({{$category->id}})" wire:confirm.prompt="Are you sure, you want to delete?">
                        <i class="fa fa-trash"></i>
                    </button>
                     <button data-toggle="modal" wire:click="edit({{$category->id}})" data-target="#exampleModal" type="button" class="btn btn-success btn-sm" >
                    <i class="fa fa-edit"></i>
                    </button> 
                    @include('livewire.admin.staff.updatecategory')   
                    @livewireScripts
                    <script>
                        window.livewire.on('update',()=>{
                            $('#exampleModal').modal('hide');
                        })
                    </script>
                </th>
            </tr>
        </div>
    </div>
    @endforeach
        </table>
    </div>
</div>