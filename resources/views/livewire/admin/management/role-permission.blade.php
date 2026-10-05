{{-- <div class="card">
    <div class="card-header"> <i class="fa fa-plus-circle"></i> Roles and Permission</div>
    <div class="float-left px-5">
        <div class="mt-3">
            <div class="form-group">
                <ul class="list-group">
                    <li class="list-group-item active"><i class="fa fa-key"></i> List Of Permissions</li>
                    @foreach($permission as $index => $permission)
                    <li class="list-group-item"> 
                        <i class="fa fa-key"></i>
                        <input type="checkbox" class="float-right" name="permission[{{$index}}][{{ $permission->title }}]" wire:model="per.{{ $permission->id }}" />
                        {{ ucfirst($permission->title) }}
                    </li>
                    @endforeach       
                </ul>
            </div>
            <button type="submit" wire:click="save({{ $role->id }})" class="btn btn-danger btn-sm float-center float-right">
                <i class="fa fa-save"></i> Assign Permission 
            </button>
        </div>
    </div>
</div> --}}
<div class="card">
    <div class="card-header"> <i class="fa fa-plus-circle"></i> Roles and Permission</div>
    <div class="float-left px-5">
        <div class="mt-3">
            <div class="form-group">
                <ul class="list-group">
                    <li class="list-group-item active"><i class="fa fa-key"></i> List Of Permissions</li>
                    {{-- @foreach($permission as $perm)
                    <li class="list-group-item"> 
                        <i class="fa fa-key"></i>
                        <input type="checkbox" class="float-right" name="per[{{$perm->id}}][{{ $perm->title }}]" wire:model="pers.{{ $perm->id }}" @if(in_array($perm->id, $assignedPermissions)) checked @endif />
                        {{ ucfirst($perm->title) }}
                    </li>
                    @endforeach
                     --}}
                     @foreach($permissions as $permission)
                     <li class="list-group-item">
                         <i class="fa fa-key"></i>
                         <input type="checkbox" class="float-right"
                                name="permissions[{{$permission->id}}]" 
                                wire:model="pers.{{$permission->id}}" 
                                @if(in_array($permission->id, $assignedPermissions)) checked @endif />
                         {{ ucfirst($permission->title) }}
                     </li>
                 @endforeach

                       
                </ul>
            </div>
            <button type="submit" wire:click="save({{ $role->id }})" class="btn btn-danger btn-sm float-center float-right">
                <i class="fa fa-save"></i> Assign Permission 
            </button>
        </div>
    </div>
</div>
