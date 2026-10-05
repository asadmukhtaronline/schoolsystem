@section('title','Permissions')
<div class="card">
        <div class="card-header">
            <i class="fa fa-list"></i> Permissions
            <div wire:loading class="float-right">
                <font color="red"> <i class="fa fa-spinner fa-spin"></i> </font>
            </div>
        </div>
        <table class="table table-bordered table-striped table-bordered table-hover">
            <tr>
                <th class="font-weight-bold"><i class="fa fa-book"></i> Title</th>
                <th class="font-weight-bold"><i class="fa fa-globe"></i> Url Slug</th>
                <th class="font-weight-bold"><i class="fa fa-map-pin"></i> Route Name</th>
                <th class="font-weight-bold"><i class="fa fa-pencil"></i> Action</th>
            </tr>
            <tr>
                <td>
                    <input type="text" wire:model="title" class=" w-75 form-control form-control-sm mb-0" placeholder="Name"> <br />
                    @error('title')
                    <font color="red"><small> <i class="fa fa-warning"></i> {{ $message }}</small></font>
                    @enderror
                </td>
                <td><input type="text" wire:model="url_slug" class=" w-75 form-control form-control-sm mb-0" placeholder="Url Slug">
            <br>
            @error('url_slug')
                    <font color="red"><small> <i class="fa fa-warning"></i> {{ $message }}</small></font>
                    @enderror</td>
                <td><input type="text" wire:model="route_name"  class="form-control form-control-sm w-75" placeholder="Route Name">
            <br>
            @error('route_name')
                    <font color="red"><small> <i class="fa fa-warning"></i> {{ $message }}</small></font>
                    @enderror</td>
                <td>
                    <button type="button" wire:click="save" class="btn btn-danger btn-sm">
                     <i class="fa fa-save"></i> Save
                    </button>
                </td>
            </tr>
            @foreach($permission as $permission)
            <tr>
                <td>{{ucfirst($permission->title)}}</td>
                {{-- <td> <input type="checkbox"  class="select-item" wire:model="title" value="1"  @if($permission->title ===1) checked @endif>{{ucfirst($permission->title)}}</td> --}}
                <td>{{($permission->url_slug)}}</td>
                <td>{{ucfirst($permission->route_name)}}</td>
                <td>
                <button wire:click="alertConfirm({{ $permission->id }})" class="btn btn-danger btn-sm"  >
                        <i class="fa fa-trash"></i>
                </button>
                <button data-toggle="modal" wire:click="edit({{$permission->id}})" data-target="#exampleModal" type="button" class="btn btn-success btn-sm" >
                    <i class="fa fa-edit"></i>
                </button>
                    @include('livewire.admin.management.updatepopup')
                    @livewireScripts
                    <script>
                        window.livewire.on('update',()=>{
                            $('#exampleModal').modal('hide');
                        })
                    </script>
                    </div>
                    </div>
                </div>
                </div>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>