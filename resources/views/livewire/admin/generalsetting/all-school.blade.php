@section('title','All Schools')
<div class="card">
        <div class="card-header">
            <i class="fa fa-list"></i> All Schools
        </div>

        <table class="table table-bordered table-striped table-bordered table-hover">
            <tr>
                <th>School Name</th>
                <th>Email</th>
                <th>WhatsApp</th>
                <th>Landline</th>
                <th>Website</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            @foreach($school as $school)
            <tr>
                <td>
                <img src="{{ asset('storage/' . $school->photo) }}" border="25" class="wd-32 rounded-circle" width="30" height="30" alt="">
                    {{$school->name}}
                </td>
                <td>{{$school->email}}</td>
                <td>{{$school->whatsapp}}</td>
                <td>{{$school->landline}}</td>
                <td>{{$school->website}}</td>
                <td>{{$school->address}}</td>
                <td>  
                    <a href="{{route('edit.school', $school->id)}}">
                        <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                    </a>
                    <button wire:click="alertConfirm({{ $school->id }})" class="btn btn-danger btn-sm"  ><i class="fa fa-trash"></i></button>
                </td>
            </tr>
            @endforeach
        </table>
</div>