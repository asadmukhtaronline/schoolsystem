@section('title', 'Edit School')
<div>
    <div class="card">
        <div class="card-header"> <i class="fa fa-plus-circle"></i> Edit Institute</div>
        <div class="container mt-2">
            <div class="row">
                <!-- Photo Upload Column -->
                <div class="col-lg-3">
                    <label class="font-weight-bold" for=""><i class="fa fa-image"></i> Add Logo</label>
                    <div class="card">
                        <div style="height: 190px; width: 100%;">
                            @if ($photo)
                                <img src="{{ asset('storage/' . $school->photo) }}" alt="Photo" style="max-width: 250px;">
                            @endif
                        </div>
                        <div class="">
                            <input type="file" wire:model="photo" class="form-control">
                            @error('photo')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                            <div wire:loading wire:target="photo">Uploading...</div>
                        </div>
                    </div>
                </div>
                <!-- Input Fields Column -->
                <div class="col-lg-9">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="font-weight-bold" for=""><i class="fa fa-building"></i> School Name</label>
                            <input type="text" wire:model="name" placeholder="Name" class="form-control" />
                            @error('name')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for=""><i class="fa fa-envelope"></i> Email</label>
                            <input type="email" wire:model="email" placeholder="Email"  class="form-control" />
                            @error('email')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for=""><i class="fa fa-whatsapp"></i> WhatsApp</label>
                            <input type="tel" wire:model="whatsapp" placeholder="0300-1234567" pattern="[0-9]{4}-[0-9]{7}" class="form-control"/>
                            @error('whatsapp')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for=""><i class="fa fa-phone"></i> Landline</label>
                            <input type="tel" wire:model="landline" placeholder="042-34567891" class="form-control" pattern="[0-9]{3}-[0-9]{8}" />
                            @error('landline')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for=""><i class="fa fa-desktop"></i> Website</label>
                            <input type="url" wire:model="website" placeholder="Website" class="form-control" />
                            @error('website')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for=""><i class="fa fa-map-marker"></i> Address</label>
                            <input type="text" wire:model="address" placeholder="Address" class="form-control" />
                            @error('address')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card ml-auto">
            <button type="button" wire:click="update" class="btn btn-danger btn-sm float-right m-2">
                <i class="fa fa-save"></i> Update School
                <i class="fa fa-spinner fa-spin" wire:loading wire:target="save"></i>
            </button>
        </div>
    </div>
</div>
