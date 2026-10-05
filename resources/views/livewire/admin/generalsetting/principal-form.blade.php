<div class="row">
    <!-- Photo Upload Column -->
    <div class="col-lg-3">
        <label class="font-weight-bold"><i class="fa fa-image"></i> Add Photo</label>
        <div class="card">
            <div style="height: 190px; width: 100%;">
                @if ($principal_photo)
                    <img src="{{ $principal_photo->temporaryUrl() }}" height="100%" width="100%">
                @endif
            </div>
            <div>
                <input type="file" wire:model="principal_photo" class="form-control">
                @error('principal_photo')
                    <font color="red"><small>{{ $message }}</small></font>
                @enderror
                <div wire:loading wire:target="principal_photo">Uploading...</div>
            </div>
        </div>
    </div>

    <!-- Input Fields Column -->
    <div class="col-lg-9">
        <div class="card-body">
            <div class="form-group">
                <label class="font-weight-bold"><i class="fa fa-user-o"></i> Full Name</label>
                <input type="text" wire:model="fullname" placeholder="Enter your name" class="form-control" />
                @error('fullname')
                    <font color="red"><small>{{ $message }}</small></font>
                @enderror
            </div>

            <div class="form-group">
                <label class="font-weight-bold"><i class="fa fa-envelope"></i> Email</label>
                <input type="email" wire:model="principal_email" placeholder="Enter your email" class="form-control" />
                @error('principal_email')
                    <font color="red"><small>{{ $message }}</small></font>
                @enderror
            </div>

            <div class="form-group">
                <label class="font-weight-bold"><i class="fa-brands fa-whatsapp fa-lg"></i> WhatsApp</label>
                <input type="tel" wire:model="principal_whatsapp" placeholder="0300-1234567" pattern="[0-9]{4}-[0-9]{7}" class="form-control" />
                @error('principal_whatsapp')
                    <font color="red"><small>{{ $message }}</small></font>
                @enderror
            </div>
        </div>
    </div>

    <!-- Alternative Contact -->
    <div class="col-md-6">
        <div class="form-group">
            <label class="font-weight-bold"><i class="fa fa-phone"></i> Alternative Contact (optional)</label>
            <input type="tel" wire:model="alternative_contact" placeholder="042-34567891" pattern="[0-9]{3}-[0-9]{8}" class="form-control" />
            @error('alternative_contact')
                <font color="red"><small>{{ $message }}</small></font>
            @enderror
        </div>
    </div>

    <!-- City -->
    <div class="col-md-6">
        <div class="form-group">
            <label class="font-weight-bold"><i class="fa-solid fa-tree-city"></i> City</label>
            <input type="text" wire:model="principal_city" placeholder="City" class="form-control" />
            @error('principal_city')
                <font color="red"><small>{{ $message }}</small></font>
            @enderror
        </div>
    </div>

    <!-- Country -->
    <div class="col-md-6">
        <div class="form-group">
            <label class="font-weight-bold"><i class="fa-solid fa-earth-asia"></i> Country</label>
            <input type="text" wire:model="principal_country" placeholder="Country" class="form-control" />
            @error('principal_country')
                <font color="red"><small>{{ $message }}</small></font>
            @enderror
        </div>
    </div>

    <!-- Address -->
    <div class="col-md-6">
        <div class="form-group">
            <label class="font-weight-bold"><i class="fa-solid fa-location-dot"></i> Address</label>
            <input type="text" wire:model="principal_address" placeholder="Enter your address" class="form-control" />
            @error('principal_address')
                <font color="red"><small>{{ $message }}</small></font>
            @enderror
        </div>
    </div>

    <!-- Principal Designation -->
    <div class="col-md-12">
        <div class="form-group">
            <label class="font-weight-bold"><i class="fa-solid fa-briefcase"></i> Designation</label>
            <input type="text" wire:model="principal_designation" placeholder="Principal / Head / Admin" class="form-control" />
            @error('principal_designation')
                <font color="red"><small>{{ $message }}</small></font>
            @enderror
        </div>
    </div>
</div>
