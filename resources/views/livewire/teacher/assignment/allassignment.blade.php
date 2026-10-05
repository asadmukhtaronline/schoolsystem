
@section('title','All Assignments')
<div class="card">
    <div class="card-header">
        <i class="fa fa-tasks"></i> All Assignments  

    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <td colspan="12">
            <input type="text" class="form-control" wire:keyup="searchassignments" wire:model="searchassignment" placeholder="Search Assignments..." />
            </td>
        </tr>
            <tr>
                <th> ID</th> 
                <th><i class="fa fa-pencil" aria-hidden="true"></i> Title</th> 
                <th><i class="fa fa-universal-access"></i> Classes</th>
                <th><i class="fa fa-users"></i> Creator</th>
                <th><i class="fa fa-university" aria-hidden="true"></i> Subjects</th>
                {{-- <th><i class="fa fa-status"></i> Status</th> --}}
                <th><i class="fa fa-cog"></i> Action</th>
            </tr>
            @foreach ($assignments as $assignment)
                
            <tr>
                <td> {{$assignment->id}}</td> 
                    <td>{{ucfirst($assignment->title)}}</td>   
                    <td>{{ ucfirst($assignment->class->title)?? 'N/A' }} <span class="badge badge-warning">{{ $assignment->section->title ?? 'N/A' }}</span></td>

                    <td>{{ucfirst($assignment->creator_name)}}</td>
                    <td>{{ucfirst($assignment->subject->title)}}</i></td>
                    <td>
                        <a href="{{route('teacher.updateassignments',$assignment->id)}}">
                            <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                        </a>
    
                          <a href="{{route('teacher.assignmentprofile',$assignment->id)}}">
                            <button class="btn btn-info btn-sm"><i class="fa fa-user-circle"></i></button>
                         </a> 
                        
                        <button wire:click="alertConfirm({{$assignment->id}})" class="btn btn-danger btn-sm"  ><i class="fa fa-trash"></i></button>
                        </td>
                </tr>
                @endforeach
            
        </thead>
      
    </table>
</div> 
