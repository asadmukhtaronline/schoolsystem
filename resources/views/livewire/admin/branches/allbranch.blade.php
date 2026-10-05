@section('title', 'All Branches')

<div class="card">
    <div class="card-header">
        <i class="fa fa-list"></i> All Branches
    </div>

    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>Branch Name</th>
                <th>Campus Name</th>
                <th>Landline</th>
                <th>Location</th>
                <th>City</th>
                <th>Country</th>
                <th>Principal Name</th>
                <th>Principal Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($branches as $branch)
            <tr>
                <td>
                    @if ($branch->photo)
                        @if(config('app.env') === 'local')
                            <img src="{{ asset('storage/' . $branch->photo) }}" border="25" class="wd-32 rounded-circle" width="30" height="30" alt="Image">
                        @else
                        <img src="{{ env('APP_URL') }}/storage/app/public/photos/principal/{{ $branch->photo }}" border="25" class="wd-32 rounded-circle" width="30" height="30" alt="Image">
                        @endif
                    @endif
                    {{ $branch->name }}
                </td>
                <td>{{ $branch->campus_name }}</td>
                <td>{{ $branch->landline }}</td>
                <td>{{ $branch->location }}</td>
                <td>{{ $branch->city }}</td>
                <td>{{ $branch->country }}</td>
                <td>{{ $branch->fullname }}</td>
                <td>{{ $branch->email }}</td>
                <td>
                    <a href="{{ route('edit.branch', $branch->id) }}">
                        <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                    </a>
                    <button wire:click="alertConfirm({{ $branch->id }})" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
