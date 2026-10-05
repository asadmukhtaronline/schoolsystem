@section('title','Add Staff')
<div>
    <div class="card">
        <div class="card-header"> <i class="fa fa-plus-circle"></i> Create Staff</div>
        <div class="card-body">
            <div class="container mt-1">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                        <div style="height: 190px; width: 100%;">
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
                  
                    <div class="col-lg-9">
                        <div class="form-group">
                            <label class=" font-weight-bold" for=""><i class="fa fa-address-card"></i> Name</label>
                            <input type="text" wire:model="name" class="form-control" placeholder="Enter your name" />
                            @error('name')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class=" font-weight-bold" for=""><i class="fa fa-envelope"></i> Email</label>
                            <input type="email" wire:model="email" placeholder="Enter your email" class="form-control"  />
                            @error('email')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class=" font-weight-bold" for=""><i class="fa fa-cnic"></i> CNIC</label>
                            <input type="file" wire:model="cnic" class="form-control"  />
                            @error('cnic')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gender" class=" font-weight-bold" for=""><i class="fa fa-user"></i> Gender</label>
                            <select wire:model="gender"  placeholder="gender" class="form-control" id="exampleFormControlSelect1">
                                <option>Select your gender </option>
                            
                                <option>Male</option>
                            <option>Female</option>
                            </select>              
                          @error('gender')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                       
                        <div class="form-group">
                            <label class=" font-weight-bold" for=""><i class="ion ion-social-whatsapp"></i> Whatsapp</label>
                            <input type="text" wire:model="whatsapp" placeholder="Enter your whatsapp" class="form-control"  />
                            @error('whatsapp')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class=" font-weight-bold" for=""><i class="fa fa-list"></i> Designation</label>
                            <select  wire:model="stafcategory_id" class="form-control" id="exampleFormControlSelect1">    
                                <option >Select Designation</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ ucfirst($category->title)}}</option>
                                @endforeach            
                            </select>  
                            @error('category')
                                <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class=" font-weight-bold" for=""><i class="fa fa-users"></i> Role In Software</label>
                            <select  wire:model="role" class="form-control" id="exampleFormControlSelect1">    
                                <option >Select Role</option>
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ ucfirst($role->title)}}</option>
                                @endforeach            
                            </select>  
                            @error('category')
                                <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class=" font-weight-bold" for=""><i class="fa fa-pencil-square"></i> Salary</label>
                            <input type="text" wire:model="salary" placeholder="Salary" class="form-control"  />
                            @error('description')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                         <div class="form-group">
                            <label class=" font-weight-bold" for=""><i class="fa fa-pencil-square"></i> Description</label>
                            <input type="text" wire:model="description" placeholder="Description" class="form-control"  />
                            @error('description')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div> 
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <div class="card mt-3">    
        <div class="card-body d-flex justify-content-end">
            <button type="submit" wire:click="save" class="btn btn-danger btn-sm">
                <i class="fa fa-save"></i> Save Staff
                <span wire:loading>
                    <i class="fa fa-spinner fa-spin"></i>
                </span>
            </button>
        </div>
    </div>
</div>
