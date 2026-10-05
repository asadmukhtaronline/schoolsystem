@section('title', 'Add Branch')

<div class="container mt-4">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Branch Details -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fa fa-plus-circle"></i> Create Branch
        </div>
        <div class="card-body">
            <form action="" method="post" class="row">
                <div class="mb-3 col-6">
                    <label for="branchName" class="form-label">
                        <i class="fa-solid fa-building"></i> Name
                    </label>
                    <input type="text" id="" class="form-control" wire:model="name" placeholder="Branch Name">
                    @error('name')
                    <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>
                <div class="mb-3 col-6">
                    <label for="campusName" class="form-label">
                        <i class="fa-solid fa-tent"></i> Campus Name
                    </label>
                    <input type="text" id="" class="form-control" wire:model="campus_name" placeholder="Campus Name">
                    @error('campus_name')
                    <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>
                <div class="mb-3 col-6">
                    <label for="branchLandline" class="form-label">
                        <i class="fa-solid fa-phone"></i> Landline
                    </label>
                    <input type="text" id="" class="form-control" wire:model="landline" placeholder="042-34567891">
                    @error('landline')
                    <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>
                <div class="mb-3 col-6">
                    <label for="branchCity" class="form-label">
                        <i class="fa-solid fa-city"></i> City
                    </label>
                    <input type="text" id="" class="form-control" wire:model="city" placeholder="City">
                    @error('city')
                    <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>
                <div class="mb-3 col-6">
                    <label for="branchCountry" class="form-label">
                        <i class="fa-solid fa-earth-asia"></i> Country
                    </label>
                    <input type="text" id="" class="form-control" wire:model="country" placeholder="Country">
                    @error('country')
                    <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>

                <div class="mb-3 col-6">
                    <label for="branchLocation" class="form-label">
                        <i class="fa-solid fa-location-dot"></i> Location
                    </label>
                    <input type="text" id="" class="form-control" wire:model="location" placeholder="Address">
                    @error('location')
                    <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>
        </div>
    </div>
    <!-- Principal Details Here -->
    <div>
        <div class="card">
            <div class="card-header"> <i class="fa fa-plus-circle"></i> Principal Details</div>
            <div class="container mt-2">
                <div class="row">
                    <!-- Photo Upload Column -->
                    <div class="col-lg-3">
                        <label class="font-weight-bold" for=""><i class="fa fa-image"></i> Add Photo</label>
                        <div class="card">
                            <div style="height: 190px; width: 100%;">
                                @if ($photo)
                                <img src="{{ $photo->temporaryUrl() }}" height="100%" width="100%">
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
                                <label class="font-weight-bold" for=""><i class="fa fa-user-o"></i> Full Name</label>
                                <input type="text" wire:model="fullname" placeholder="Enter your name"
                                    class="form-control" />
                                @error('name')
                                <font color="red"><small>{{ $message }}</small></font>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for=""><i class="fa fa-envelope"></i> Email</label>
                                <input type="email" wire:model="email" placeholder="Enter your email"
                                    class="form-control" />
                                @error('email')
                                <font color="red"><small>{{ $message }}</small></font>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for=""><i class="fa-brands fa-whatsapp fa-lg"></i>
                                    WhatsApp</label>
                                <input type="tel" wire:model="whatsapp" placeholder="0300-1234567"
                                    pattern="[0-9]{4}-[0-9]{7}" class="form-control" />
                                @error('whatsapp')
                                <font color="red"><small>{{ $message }}</small></font>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="font-weight-bold" for=""><i class="fa fa-phone"></i> Alternative Contact
                                (optional)</label>
                            <input type="tel" wire:model="alternative_contact" placeholder="042-34567891"
                                class="form-control" pattern="[0-9]{3}-[0-9]{8}" />
                            @error('alternative_contact')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="font-weight-bold" for=""><i class="fa-solid fa-location"></i> Address</label>
                            <input type="url" wire:model="address" placeholder="Enter your address"
                                class="form-control" />
                            @error('address')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold" for=""><i class="fa-solid fa-tree-city"></i> City</label>
                            <input type="text" wire:model="principal_city" placeholder="City" class="form-control" />
                            @error('principal_city')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold" for=""><i class="fa-solid fa-earth-asia"></i>
                                Country</label>
                            <input type="text" wire:model="principal_country" placeholder="Country"
                                class="form-control" />
                            @error('principal_country')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3 ml-auto">
                <!-- Add wire:loading to display the loading state -->
                <button type="button" wire:click="save" class="btn btn-danger btn-sm float-right m-2">
                    <!-- Show a loading spinner while the save operation is in progress -->
                    <span wire:loading.remove>
                        <i class="fa fa-save"></i> Save
                    </span>
                    <span wire:loading>
                        <i class="fa fa-spinner fa-spin"></i> Saving...
                    </span>
                </button>
            </div>
            </div>
        </form>
    </div>
</div>