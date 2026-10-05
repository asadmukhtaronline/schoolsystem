@section('title', 'Profile Settings')

<div class="container mt-4">
    <!-- User Edit Card -->
    <div class="card mb-4">
        <div class="card-header"><i class="fa fa-plus-circle"></i> Edit User</div>
        <div class="card-body">
            <div class="row">
                <!-- Photo Upload Section -->
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <div style="height: 200px; width: 100%;">
                                @if ($photo instanceof \Livewire\TemporaryUploadedFile)
                                    <img src="{{ $photo->temporaryUrl() }}" height="100%" width="100%">
                                @else
                                    <img src="{{ asset('storage/' . $photo) }}" alt="User Photo" style="max-width: 100%; max-height: 250px; height: 200px; width: auto;">
                                @endif
                            </div>
                            <input type="file" wire:model="photo" class="form-control mt-3">
                            @error('photo')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                            <div wire:loading wire:target="photo">Uploading...</div>
                        </div>
                    </div>
                </div>


                <!-- User Details Section -->
                <div class="col-lg-9">
                    <form>
                        <div class="form-group">
                            <label for="name" class="font-weight-bold"><i class="fa fa-user"></i> Name</label>
                            <input type="text" id="name" wire:model="name" placeholder="Name" class="form-control">
                            @error('name')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="font-weight-bold"><i class="fa fa-envelope"></i> Email</label>
                            <input type="email" id="email" wire:model="email" placeholder="Email" class="form-control">
                            @error('email')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone" class="font-weight-bold"><i class="fa fa-phone"></i> Contact</label>
                            <input type="text" id="phone" wire:model="whatsapp" placeholder="0300-1234567" class="form-control">
                            @error('phone')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Details Card -->
    <div class="card mb-4">
        <div class="card-header"><i class="fa fa-list"></i> Details</div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th class="font-weight-bold"><i class="fa fa-address-card"></i> CNIC</th>
                        <th class="font-weight-bold"><i class="fa fa-male"></i> Gender</th>
                    </tr>
                    <tr>
                        <td><input type="text" wire:model="cnic" class="form-control"></td>
                        <td>
                            <select id="gender" wire:model="gender" class="form-control">
                                <option value="gender" disabled>Select your Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            @error('gender')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Description Card -->
    <div class="card mb-4">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th class="font-weight-bold"><i class="fa fa-list"></i> Description</th>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <textarea class="form-control" wire:model="description" rows="3" cols="5"></textarea>
                                @error('description')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Save Button -->
    <div class="text-right mb-5">
        <button type="button" wire:click="save" class="btn btn-danger">
            <i class="fa fa-save"></i> Update Profile
        </button>
    </div>
</div>
