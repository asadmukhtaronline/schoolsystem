@section('title','Add Student')
<div class="card">
        <div class="card-header"> <i class="fa fa-plus-circle"></i> Student Details</div>
        {{-- <div wire:loading class="float-right ml-auto px-5">
                <font color="red"> <i class="fa fa-spinner fa-spin"></i> </font>
            </div> --}}
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <div class="card-body">
            <div class="container mt-1">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div style="height:190px;  width:238px;">
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
                            <label class=" font-weight-bold" for=""><i class="fa fa-user"></i> Student Name</label>
                            <input type="text" wire:model="name" placeholder="Name" class="form-control" />
                            @error('name')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class=" font-weight-bold" for=""><i class="fas fa-user-tie"></i> Parent/Guardian Name</label>
                            <input type="text" wire:model="parent_name" placeholder="Parent/Guardian Name" class="form-control"  />
                            @error('email')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class=" font-weight-bold" for=""><i class="fas fa-users"></i> Gender</label>
                            <select class="form-control" wire:model="gender" id="exampleFormControlSelect1">
                                <option>Select you Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>              
                        </div>
                            
                    </div>
                    <div class="form-group w-50 container">
                            <label class=" font-weight-bold" for=""><i class="fa fa-address-book"></i> Current Address</label>
                            <input type="email" wire:model="current_address" placeholder="Street Address" class="form-control"  />
                    </div>
                    <div class="form-group w-50 container">
                    <label class=" font-weight-bold" for=""><i class="fa fa-map-marker"></i> Street Address</label>
                            <input type="email" wire:model="street_address" placeholder="Street Address Line 2" class="form-control"  />
                    </div>
                    <div class="form-group col-3 container">
                    <label class=" font-weight-bold" for=""><i class="fa fa-map-pin"></i> City</label>
                    <select class="form-control" wire:model="city" id="exampleFormControlSelect1">
                            <option>Select City</option>
                            <option>Lahore</option>
                            <option>Karachi</option>
                            <option>Islamabad</option>
                            <option>Faisalabad</option>
                        </select>                    
                        </div>
                    <div class="form-group col-3 container">
                    <label class=" font-weight-bold" for=""><i class="fa fa-map-o"></i> Region</label>
                    <select class="form-control" wire:model="region" id="exampleFormControlSelect1">
                            <option>Select Region</option>
                            <option>Punjab</option>
                            <option>Kashmir</option>
                            <option>Sindh</option>
                            <option>Capital</option>
                        </select>             
                            </div>
                    <div class="form-group col-3 container">
                    <label class=" font-weight-bold" for=""><i class="fa fa-address-card-o"></i> Postal / Zip Code</label>
                            <input type="email" wire:model="postal" placeholder="Postal / Zip Code" class="form-control"  />
                    </div>
                    <div class="form-group col-3 container">
                    <label class=" font-weight-bold" for=""><i class="fa fa-map-marker"></i> Country</label>
                        <select class="form-control" wire:model="country" id="exampleFormControlSelect1">
                            <option>Select Country</option>
                            <option>Pakistan</option>
                            <option>India</option>
                            <option>Bangladesh<option>
                        </select>              
                    </div>
                    <div class="form-group w-50 container">
                            <label class=" font-weight-bold" for=""><i class="fa fa-whatsapp"></i> Phone / Whatsapp</label>
                            <input type="email" wire:model="phone" placeholder="Phone / Whatsapp" class="form-control"  />
                    </div>
                    <div class="form-group w-50 container">
                            <label class=" font-weight-bold" for=""><i class="fa fa-envelope"></i> Email</label>
                            <input type="email" wire:model="email" placeholder="Email" class="form-control"  />
                    </div>        
                </div>

                <div class="card mb-5">
                    <div class="card-header"> <i class="fa fa-plus-circle"></i> Section Details</div>
                    <div class="card-body">
                                <div class="row my-5">
                                <div class="form-group col-6 container">
                                    <label class=" font-weight-bold" for=""><i class="fa fa-university"></i> Class</label>
                                    <select class="form-control" wire:model="year" wire:change="getsection()" id="exampleFormControlSelect1">
                                        <option>Select Class</option>
                                        @foreach($years as $years)
                                        <option value="{{ $years->id }}">{{ ucfirst($years->title) }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    <div class="form-group col-6 container">
                                    <label class=" font-weight-bold" for=""><i class="fa fa-map-marker"></i> Section</label>
                                        <select wire:model="section" class="form-control" id="exampleFormControlSelect1">
                                            <option>Select Section</option>
                                            @foreach($sections as $section)
                                            <option value="{{ $section->id }}">{{ $section->title }}</option>
                                            @endforeach
                                        </select>              
                                    </div>
                    </div>
                </div>
                </div>
                <div class="card">
                    <div class="card-header"> <i class="fa fa-plus-circle"></i> Accounts</div>
                    <div class="card-body"> 
                        <div class="row my-5">
                            <div class="form-group col-6 container">
                                                    <label class=" font-weight-bold" for=""><i class="fa fa-money"></i> Admission Fee</label>
                                                    <input type="number" wire:model="admission_fee" placeholder="Admission Fee" class="form-control"  />
                                            </div>
                                            <div class="form-group col-6 container">
                                            <label class=" font-weight-bold" for=""><i class="fa fa-money"></i> Monthly Fee</label>
                                                    <input type="number" wire:model="monthly_fee" placeholder="Monthly Fee" class="form-control"  />
                                            </div>
                                            <div class="form-group col-6 container">
                                            <label class=" font-weight-bold" for=""><i class="fa fa-calendar"></i> Admission Date</label>
                                                    <input type="date" wire:model="admission_date" class="form-control"/>
                                            </div>
                                            <div class="form-group col-6 container">
                                            <label class=" font-weight-bold" for=""><i class="fa fa-calendar"></i> Fee Date</label>
                                                    <input type="number" wire:model="fee_date" class="form-control"/>
                                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" wire:click="save" class="btn btn-danger btn-sm" wire:loading.attr="disabled">
                            <i class="fa fa-save"></i> Submit
                        </button>
                    </div>
                </div>
</div>