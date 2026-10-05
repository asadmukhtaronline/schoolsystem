@section('title','Add Teacher')

<div class="card">
    <div class="card-header"> <i class="fa fa-plus-circle"></i> Add New Teacher</div>
    <div class="card-body">

        <div class="container mt-1">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div style="height:230px; width:237px;">
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
                    <div class="mt-3">
                        <div class="form-group">
                            <ul class="list-group">
                                <li class="list-group-item active">List Of Subjects</li>
                                @error('subs')
                                <font color="red"><small>{{ $message }}</small></font>
                                @enderror
                                @foreach($subjects as $index => $sub)
                                    <li class="list-group-item "><i class="fa fa-book"></i> {{ucfirst($sub->title)}}<input class="float-right" type="checkbox" name="sub[{{$index}}][{{ $sub }}]" wire:model="subs.{{ $sub->id }}"></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>  
                <div class="col-lg-9">
                    <div class="form-group">
                        <label class="font-weight-bold" for=""><i class="fa fa-graduation-cap"></i> Teacher Name</label>
                        <input type="text" class="form-control" wire:model="name" />
                        @error('name')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for=""><i class="fa fa-user"></i> Father Name</label>
                        <input type="text" class="form-control" wire:model="father_name" />
                        @error('father_name')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for=""><i class="fa fa-enevlop"></i> Email</label>
                        <input type="email" class="form-control" wire:model="email" />
                        @error('email')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for=""><i class="fa fa-address-card"></i> CNIC</label>
                        <input type="text" class="form-control" wire:model="cnic" />
                        @error('cnic')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for=""><i class="fa fa-whatsapp"></i> Whatsapp</label>
                        <input type="phone" class="form-control" wire:model="whatsapp" />
                        @error('whatsapp')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for=""><i class="fa fa-map-marker"></i> Address</label>
                        <input type="text" class="form-control" wire:model="address" />
                        @error('address')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for=""><i class="fa fa-users"></i> Gender</label>
                        <select  wire:model="gender" class="form-control" id="exampleFormControlSelect1">
                            <option>Select your Gender</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>              
                        @error('gender')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for=""><i class="fa fa-calendar"></i> DOB</label>
                        <input type="date" class="form-control" wire:model="dob" />
                        @error('dob')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for=""><i class="fa fa-address-book"></i> Contract</label>
                        <input class="form-control" type="file" wire:model="contract" id="formFile">
                        @error('contract')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                        <label class="font-weight-bold" for=""><i class="fa fa-align-left"></i> Description</label>
                        <textarea class="form-control" rows="8" style="resize:none;" wire:model="description"></textarea>
                        @error('description')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer bg-white">    
        <button type="button" wire:click="save" class="btn btn-danger btn-sm float-right m-2">
            <i class="fa fa-save"></i> Save Teacher
            <i class="fa fa-spinner fa-spin ml-1" wire:loading> </i> 
        </button>
    </div>
</div>
