@section('title','Staff')
<div class="card">
        <div class="card-header">
            <i class="fa fa-list"></i> All Staff
        </div>

        <table class="table table-bordered table-striped table-bordered table-hover">
        <tr>
            <td colspan="12">
            <input type="text" class="form-control" wire:keyup="searchstaffs" wire:model="searchstaff" placeholder="Search Staff..." />
            </td>
        </tr>
        
            <tr> 
                <th> <i class="fa fa-user"></i> Name</th>
                <th> <i class="fa fa-envelope"></i> Email</th>   
                <th> <i class="fa fa-whatsapp"></i> Whatsapp</th>        
                <th> <i class="fa fa-user-plus"></i> Designation</th> 
                <th> <i class="fa fa-align-left"></i> Description</th> 
                <th> <i class="fa fa-credit-card-alt"></i> Salary</th>      
                <th> <i class="fa fa-cog"></i> Action</th>
            </tr>
        @if($staff->count() > 0)
           
            @foreach($staff as $staff )  
            <tr>
                <td>
                @if(config('app.env') === 'local')
                    <img src="{{ asset('storage/staff') }}/{{ $staff->image }}" border="25" class="wd-32 rounded-circle" width="30" height="30" alt="Image">
                @else
                <img src="{{ env('APP_URL') }}/storage/app/public/{{ $staff->image }}" border="25" class="wd-32 rounded-circle" width="30" height="30" alt="picture">
                @endif
                   {{ucfirst($staff->name)}}
                </td>     
                <td>{{$staff->email}}</td>
                <td>{{$staff->whatsapp}}</td>
                <td> {{ ucfirst($staff->staffcategory->title ?? 'N/A')}} </td>     
                <td> {{ ucfirst($staff->description) }}</td>
                <td>{{$staff->salary}}</td>
                <td>  
                    <button wire:click="alertConfirm({{$staff->id}})" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                   
        
                    <a href="{{ route('admin.staffprofile', $staff->id) }}">
                        <button class="btn btn-info btn-sm"><i class="fa fa-user-circle"></i></button>
                        </a>   
                    <a href="{{ route('admin.staffupdate', $staff->id)}}">
                    <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                    </a>
                </td>
            </tr>   
            @endforeach
            @else 
        <tr>
            <td colspan="12" class="text-center">
                Not Found
            </td>
        </tr>
        @endif
        </table> 

    </div>
</div>

