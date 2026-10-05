@section('title','All Teachers')
<div class="card">
        <div class="card-header">
            <i class="fa fa-list"></i> All Teachers
        </div>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <table class="table table-bordered table-striped table-bordered table-hover">
        <tr>
            <td colspan="12">
            <input type="text" class="form-control" wire:keyup="searchteachers" wire:model="searchteacher" placeholder="Search Teachers..." />
            </td>
        </tr>

        <tr>
            <th>ID</th> 
            <th><i class="fas fa-user"></i> Name</th>
            <th><i class="fas fa-user-tie"></i> Father Name</th>
            <th><i class="fas fa-envelope"></i> Email</th>
            <th><i class="fas fa-id-card"></i> Cnic</th>
            <th><i class="fas fa-users"></i> Gender</th>
            <th><i class="fas fa-cog"></i> Action</th>
            
        </tr>
@if($addteachers->count() > 0)

@foreach($addteachers as $addteachers )
            <tr>
                <td>{{$addteachers->id}}</td>
                <td>
                @if(config('app.env') === 'local')
                    <img src="{{ asset('storage/teachers') }}/{{ $addteachers->picture }}" border="25" class="wd-32 rounded-circle" width="30" height="30" alt="Image">
                @else
                <img src="{{ env('APP_URL') }}/storage/app/public/teachers/{{ $addteachers->picture }}" border="25" class="wd-32 rounded-circle" width="30" height="30" alt="picture">
                @endif
                    {{ ucfirst($addteachers->name)}}
                </td>
                <td>{{ucfirst($addteachers->father_name)}}</td>
                <td>{{($addteachers->email)}}</td>
                <td>{{($addteachers->cnic)}}</td>
                <td>{{ucfirst($addteachers->gender)}}</td>
    
                <td>
                    <a href="{{ route('edit.teacher',$addteachers->id) }}">
                        <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                    </a>
                    
                    <a href="{{ route('admin.teacherprofile', $addteachers->id) }}">
                        <!-- <a href=""> -->
                        <button class="btn btn-info btn-sm"><i class="fa fa-user-circle"></i></button>
                    </a>  
                    <button wire:click="alertConfirm({{ $addteachers->id }})" class="btn btn-danger btn-sm"  ><i class="fa fa-trash"></i></button>
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

