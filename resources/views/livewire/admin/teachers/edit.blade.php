@section('title','Edit Teacher')
<div>
    <div class="card">
        <div class="card-header"> <i class="fa fa-plus-circle"></i> Edit Teacher</div>
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
                                <input type="file" wire:model="photo">
                                @error('photo')
                                <font color="red"><small>{{ $message }}</small></font>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="form-group">
                            <label class="font-weight-bold"for=""><i class="fa fa-graduation-cap"></i> Teacher Name</label>
                            <input type="text" class="form-control" wire:model="name" />
                            @error('name')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
    
                    </div>
                    <div class="col-lg-16">
                        <div class="form-group">
                            <label class="font-weight-bold"for=""><i class="fa fa-user"></i> Father Name</label>
                            <input type="text" class="form-control" wire:model="father_name" />
                            @error('fathername')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for=""><i class="fa fa-address-card"></i> Email</label>
                        <input type="email" class="form-control" wire:model="email" />
                        @error('email')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                    <div class="col-lg-14">
                        <div class="form-group">
                            <label class="font-weight-bold"for=""><i class="fa fa-address-card"></i> CNIC</label>
                            <input type="text" class="form-control" wire:model="cnic" />
                            @error('cnic')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for=""><i class="fa fa-address-card"></i> Whatsapp</label>
                        <input type="phone" class="form-control" wire:model="whatsapp" />
                        @error('whatsapp')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                    <div class="col-lg-14">
                        <div class="form-group">
                            <label class="font-weight-bold" ><i class="fa fa-map-marker"></i> Address</label>
                            <input type="text" class="form-control" wire:model="address" />
                            @error('address')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
    
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="font-weight-bold"class=" font-weight-bold" for=""><i class="fa fa-users"></i> Gender</label>

                            <select  wire:model="gender" class="form-control" id="exampleFormControlSelect1">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            </select>              
                          @error('gender')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-14">
                        <div class="form-group">
                            <label class="font-weight-bold"for=""><i class="fa fa-calendar"></i> DOB</label>
                            <input type="date" class="form-control" wire:model="dob" />
                            @error('dob')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
    
                    </div>
                  
                    <div class="col-lg-14">
                        <div class="form-group">
                            <label class="font-weight-bold"for=""><i class="fa fa-address-book"></i> Contract</label>
                            <input type="text" class="form-control" wire:model="contract" />
                            @error('contract')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
    
                    </div>
                    <div class="form-group mt-14">
                            <label class="font-weight-bold"for=""><i class="fa fa-list"></i> Description</label>
                            <textarea class="form-control" rows="8" style="resize:none;" wire:model="description"></textarea>
                            @error('description')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                </div>
            </div>
        </div>
        </div>
        <div class="card bg-white ml-auto">    
            <button type="button"  wire:click="update({{$teacher->id}})" class="btn btn-danger btn-sm float-right">
                <i class="fa fa-save"></i> Edit Teacher
            </button>
        </div>
    </div>
    