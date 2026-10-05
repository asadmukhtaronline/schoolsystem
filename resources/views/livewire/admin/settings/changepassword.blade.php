@section('title', 'Change Password')

<div class="card p-5 d-flex mx-auto mt-5" style="width: 33%;">
    <p class="text-black" style="color:black; font-size:25px;">Change Password</p>
    <p style="width:80%;" class="mb-4">Password will be changed and you will be logged out of all devices</p>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="changePassword">
        <div class="form-group">
            <input type="password" wire:model="oldPassword" class="form-control" placeholder="Old Password">
            @error('oldPassword') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <input type="password" wire:model="newPassword" class="form-control" placeholder="New Password">
            @error('newPassword') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-danger text-center w-100 m-auto">Update Password</button>
    </form>
</div>
