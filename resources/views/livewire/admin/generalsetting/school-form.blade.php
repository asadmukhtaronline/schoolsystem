<div class="row">
    <!-- School Section -->
    <div class="col-12">
        <h5 class="font-weight-bold mb-3"><i class="fa fa-school"></i> School Information</h5>
    </div>

    <!-- School Logo -->
    <div class="col-lg-3">
        <label class="font-weight-bold"><i class="fa fa-image"></i> Add Logo</label>
        <div class="card">
            <div style="height: 190px; width: 100%;">
                @if ($photo)
                    <img src="{{ $photo->temporaryUrl() }}" height="100%" width="100%">
                @endif
            </div>
            <div class="p-2">
                <input type="file" wire:model="photo" class="form-control">
                @error('photo')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div wire:loading wire:target="photo" class="text-primary small mt-1">Uploading...</div>
            </div>
        </div>
    </div>

    <!-- School Input Fields -->
    <div class="col-lg-9">
        <div class="card-body">
            <div class="form-group">
                <label class="font-weight-bold"><i class="fa fa-building"></i> School Name</label>
                <input type="text" wire:model="name" placeholder="Name" class="form-control" />
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label class="font-weight-bold"><i class="fa fa-envelope"></i> Email</label>
                <input type="email" wire:model="email" placeholder="Email" class="form-control" />
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label class="font-weight-bold"><i class="fa-brands fa-whatsapp"></i> WhatsApp</label>
                <input type="tel" wire:model="whatsapp" placeholder="0300-1234567" pattern="[0-9]{4}-[0-9]{7}" class="form-control" />
                @error('whatsapp') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="font-weight-bold"><i class="fa fa-phone"></i> Landline</label>
            <input type="tel" wire:model="landline" placeholder="042-34567891" class="form-control" pattern="[0-9]{3}-[0-9]{8}" />
            @error('landline') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="font-weight-bold"><i class="fa fa-desktop"></i> Website (optional)</label>
            <input type="url" wire:model="website" placeholder="Website" class="form-control" />
            @error('website') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="font-weight-bold"><i class="fa fa-envelope-open"></i> Alternative Email (optional)</label>
            <input type="email" wire:model="alternative_email" placeholder="Alternative Email" class="form-control" />
            @error('alternative_email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="font-weight-bold"><i class="fa-solid fa-tree-city"></i> City</label>
            <input type="text" wire:model="city" placeholder="City" class="form-control" />
            @error('city') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="font-weight-bold"><i class="fa-solid fa-city"></i> State</label>
            <input type="text" wire:model="state" placeholder="State/Province" class="form-control" />
            @error('state') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="font-weight-bold"><i class="fa-solid fa-envelope-open-text"></i> Post Code</label>
            <input type="text" wire:model="post_code" placeholder="Post Code" class="form-control" />
            @error('post_code') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="font-weight-bold"><i class="fa-solid fa-earth-americas"></i> Country</label>
            <input type="text" wire:model="country" placeholder="Country" class="form-control" />
            @error('country') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="font-weight-bold"><i class="fa fa-map-marker"></i> Address</label>
            <input type="text" wire:model="address" placeholder="Address" class="form-control" />
            @error('address') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>
</div>
