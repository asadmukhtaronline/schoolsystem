{{-- @section('title','Users') --}}
<div class="card">
    <div class="card-header">
        <i class="fa fa-users"></i> All Users
    </div>
    <table class="table table-bordered table-striped table-bordered table-hover">
        <tr>
            <th class="font-weight-bold"><i class="fa fa-user"></i> Name</th>
            <th class="font-weight-bold"><i class="fa fa-envelope"></i> Email</th>
            <th class="font-weight-bold"><i class="fa fa-pencil"></i> Description</th>
            <th class="font-weight-bold"><i class="fa fa-phone"></i> Phone</th>
            <th class="font-weight-bold"><i class="fa fa-list"></i> Role</th>
            <th class="font-weight-bold"><i class="fa fa-pencil"></i> Action</th>
        </tr>
        @foreach ($users as $user)   
        <tr>
            <td>
                {{-- @if(config('app.env') === 'local')
                    <img src="{{ asset('storage/user/' . $user->image) }}" border="25" class="wd-32 rounded-circle" width="30" height="30" alt="Image">
                @else
                <img src="{{ env('APP_URL') }}/storage/app/public/user/{{ $user->image }}" border="25" class="wd-32 rounded-circle" width="30" height="30" alt="Image">
                @endif --}}
               {{-- <img src="{{ asset('storage/user/' . $user->image) }}" border="25" class="wd-32 rounded-circle" width="30" height="30" alt="Image"> --}}
              {{$user->name}}
            </td>
            <td>{{$user->email}}</td>
            <td>{{$user->description}}</td>
            <td>{{$user->phone}}</td>
            {{-- <td>admin.....</td> --}}
            <td>{{ ucfirst($user->role->title??'N/A') }}</td>
          
           
          
            <td>
              <button wire:click="alertConfirm({{$user->id}})" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
              <a href="{{ route('admin.updateuser', $user->id)}}">
                <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                </a>
            </td>       
          </tr>
          @endforeach 
    </table>
        
</div>
</div>

