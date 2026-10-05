{{-- @section('title','Create User') --}}
<div>
    <div class="card">
        <div class="card-header"> <i class="fa fa-plus-circle"></i> Update User</div>
        <div class="card-body">
            <div class="container mt-1">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div style="height:270px; width:238px;">
                                @if (!empty($photo))
                                    <img src="{{ $photo->temporaryUrl() }}" height="100%" width="100%">
                                @endif
                            </div>
                            <div class="card-footer">
                                <input type="file" wire:model="image">
                                @error('image')     
                                <font color="red"><small>{{ $message }}</small></font>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="form-group">
                            <label class=" font-weight-bold" for=""><i class="fa fa-user"></i> Name</label>
                            <input type="text" name="name" wire:model="name" class="form-control" />
                            @error('name')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class=" font-weight-bold" for=""><i class="fa fa-envelope"></i> Email</label>
                            <input type="email" name="email" wire:model="email" class="form-control"  />
                            @error('email')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class=" font-weight-bold" for=""><i class="fa fa-phone"></i> Phone</label>
                            <input type="number" name="phone" wire:model="phone" class="form-control"  />
                            @error('phone')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class=" font-weight-bold" for=""><i class="fa fa-list"></i> Role</label>
                            <select wire:model="role"  class="form-control">
                                <option>Choose Role</option>
                                @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ ucfirst($role->title)}}</option>
                                 @endforeach 
                           </select>
                               
                          @error('role')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mt-4 ml-3">
                            <label class=" font-weight-bold" for=""><i class="fa fa-align-center"></i> Description</label>
                            <textarea class="form-control" name="description" wire:model="description" rows="8" style="resize:none; width: 572%;" ></textarea>
                            @error('description')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                </div>
                <div class="d-flex">
                        <div class="form-group mr-2" style="width:50%;">
                            <label class=" font-weight-bold" for=""><i class="fa fa-lock"></i> Password</label>
                            <input type="password" wire:model="password" class="form-control"  />
                            @error('password')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                        <div class="form-group" style="width:50%;">
                            <label class=" font-weight-bold" for=""><i class="fa fa-lock"></i> Confirm Password</label>
                            <input type="password" wire:model="password_confirmation" class="form-control"  />
                            @error('confirm_password')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>

                   </div> 
             </div>
                        
        </div>
        
        <div class="ml-3" style="width:100px;">    
            <button type="button" wire:click="update({{ $user_id }})" class="btn btn-danger float-right btn-sm">
                <i class="fa fa-spinner fa-spin" wire:loading></i> <i class="fa fa-save"></i> Update User
            </button>
        </div>
        </div>
    </div>
</div>
