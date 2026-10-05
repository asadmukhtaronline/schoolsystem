@section('title','Roles')   
<div class="card">
    <div class="card-header">
        <i class="fa fa-list"></i> Roles
    </div>
    <table class="table table-bordered table-striped table-bordered table-hover">
        <tr>
            <th class="font-weight-bold"><i class="fa fa-book"></i> Title</th>
            <th class="font-weight-bold"><i class="fa fa-edit"></i> Status</th>
            <th class="font-weight-bold"><i class="fa fa-pencil"></i> Action</th>
        </tr>
        <tr>
            <td><input wire:model="title" type="text" class="py-1 px-1 w-75 outline-none border border-5" placeholder="Title"></td>
            <td><input wire:model="status" type="text" class="py-1 px-1 w-75 outline-none border border-1" placeholder="Selected Status"></td>
            <td><div class="card" style="width:65px;">    
        <button type="button" wire:click="save" class="btn btn-danger btn-sm">
            <i class="fa fa-save"></i> Save
        </button>
    </div></td>
        </tr>
        @foreach($role as $role)
        <tr>
            <td>{{ucfirst($role->title)}}</td>
            <td>{{ucfirst($role->status)}}</td>
            <td>
            <button wire:click="alertConfirm({{ $role->id }})" class="btn btn-danger btn-sm"  ><i class="fa fa-trash"></i> </button>
            
            <a href="{{route('admin.role_permission',$role->id)}}" >           
                <button class="btn btn-warning btn-sm" ><i class="fa fa-key"></i></button>
                </a>
                <button data-toggle="modal" wire:click="edit({{$role->id}})" data-target="#exampleModal" type="button" class="btn btn-success btn-sm" > <i class="fa fa-edit"></i></button>
                @include('livewire.admin.management.updaterole')
                @livewireScripts
                <script>
                    window.livewire.on('update',()=>{
                        $('#exampleModal').modal('hide');
                    })
                </script>
                </td>
        </tr>
       @endforeach
        </table>
    </div>
</div>

