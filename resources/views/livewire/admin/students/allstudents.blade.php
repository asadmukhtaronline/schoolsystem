@section('title','Students')
<div class="card">
        <div class="card-header">
            <i class="fa fa-list"></i> All Students
        </div>

        <table class="table table-bordered table-striped table-bordered table-hover">
        <tr>
            <td colspan="12">
            <input type="text" class="form-control" wire:keyup="searchstudents" wire:model="searchstudent" placeholder="Search Students..." />
            </td>
        </tr>
        <tr>
                <th><i class="fa fa-user-circle"></i> Name</th>
                <th><i class="fa fa-user"></i> Parent Name</th>
                <th><i class="fa fa-envelope"></i> Email</th>
                <th><i class="fa fa-whatsapp"></i> Phone/Whatsapp</th>
                <th><i class="fa fa-cog"></i> Action</th>
            </tr>
            
        @if($students->count() > 0)

            @foreach($students as $students)
            <tr>
               <!-- <th>  -->
                    <td>
                    @if(config('app.env') === 'local')
                        <img src="{{ asset('storage/admissionform') }}/{{ $students->photo }}" border="25" class="wd-32 rounded-circle" width="30" height="30" alt="Image">
                    @else
                        <img src="{{ env('APP_URL') }}/storage/app/public/admissionform/{{ $students->photo }}" border="25" class="wd-32 rounded-circle" width="30" height="30" alt="Image">
                    @endif    
                        {{ ucfirst($students->name) }}
                    </td>
                    <td>
                    {{ ucfirst($students->parent_name) }}
                    </td>
                    <td>
                    {{ ucfirst($students->email) }}
                    </td>
                    <td>
                    {{ ucfirst($students->phone) }}
                    </td>
               <!-- </th> -->
                <td>
<button class="btn btn-danger btn-sm" wire:click="alertConfirm({{$students->id}})">
                        <i class="fa fa-trash"></i>
                </button>
                <a href="{{ route('admin.studentprofile', $students->id) }}">
                    <button class="btn btn-info btn-sm"><i class="fa fa-user-circle"></i></button>
                </a>
                 <a href="{{ route('admin.studentupdate', $students->id) }}">
                <button data-toggle="modal" wire:click="edit({{$students->id}})" data-target="#exampleModal" type="button" class="btn btn-success btn-sm" >
                <i class="fa fa-edit"></i>
                </button>
                </a> 
                </td>
            </tr>
            @endforeach
            @else 
        <tr>
            <td colspan="12" class="text-center">
                <i class="fa fa-exclamation-triangle text-warning"></i> Not Found
            </td>
        </tr>
        @endif
        </table>
    </div>
</div>

