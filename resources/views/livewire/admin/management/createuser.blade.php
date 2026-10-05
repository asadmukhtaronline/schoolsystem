@section('title', 'Create User')
<div>
    <div class="card">
        <div class="card-header"> <i class="fa fa-plus-circle"></i> Create New User</div>
        <div class="card-body">
            <div class="container mt-1">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                        <div style="height: 190px; width: 100%;">
                                @if (!empty($image))
                                    <img src="{{ $image->temporaryUrl() }}" height="100%" width="100%">
                                @endif
                            </div>
                            <div class="card-footer">
                                <input type="file" wire:model="image" class="form-control">
                                @error('image')
                                    <font color="red"><small>{{ $message }}</small></font>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="form-group">
                            <label class="font-weight-bold" for="name"><i class="fa fa-user"></i> Name</label>
                            <input type="text" id="name" wire:model="name" class="form-control" />
                            @error('name')
                                <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="email" wire:model="email" class="form-control" />
                            @error('email')
                                <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="phone"><i class="fa fa-phone"></i> Phone</label>
                            <input type="number" id="phone" wire:model="phone" class="form-control" />
                            @error('phone')
                                <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="role_id"><i class="fa fa-list"></i> Role</label>
                            <select id="role_id" wire:model="role_id" class="form-control">
                                <option value="">Choose Role</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ ucfirst($role->title) }}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mt-4 ml-3">
                        <label class="font-weight-bold" for="description"><i class="fa fa-align-left"></i> Description</label>
                        <textarea id="description" class="form-control" wire:model="description" rows="8"></textarea>
                        @error('description')
                            <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                </div>
                <div class="d-flex">
                    <div class="form-group mr-2" style="width:50%;">
                        <label class="font-weight-bold" for="password"><i class="fa fa-lock"></i> Password</label>
                        <input type="password" wire:model="password" class="form-control" />
                        @error('password')
                            <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                    <div class="form-group" style="width:50%;">
                        <label class="font-weight-bold" for="password_confirmation"><i class="fa fa-lock"></i> Confirm Password</label>
                        <input type="password" wire:model="password_confirmation" class="form-control" />
                        @error('password_confirmation')
                            <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" wire:click="save" class="btn btn-danger btn-sm float-right">
                <i class="fa fa-spinner fa-spin" wire:loading></i>  <i class="fa fa-save"></i> Save User 
            </button>
        </div>
    </div>
</div>
