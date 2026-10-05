@section('title', 'Attendance Record')
<div>
    <div class="card">
        <div class="card-header"> <i class="fa fa-plus-circle"></i> Attendance Management</div>
        <table class="table table-bordered table-striped table-bordered table-hover">
                <tr>
                    <th ><i class="fa fa-user"></i> Teacher</th>
                    <th ><i class="fas fa-layer-group"></i> Class</th>
                    <th ><i class="fa fa-pie-chart"></i> Section</th>
                    <th ><i class="fa fa-calendar"></i> Date</th>
                    <th><i class="fa fa-search"></i> Action</th>
                </tr>
                <form wire:submit.prevent="search">
                <tbody>
                    <tr>
                        <td class= "d-flex text-dark"><h5 class="align-itms-center">{{$teacherName}}</h5></td>
                        <td>
                            <select type="text" class="form-control" placeholder="Search Class" wire:model='year' wire:change='getsection'>
                                    <option>Select Class</option>
                                    @foreach($years as $year)
                                        <option value="{{$year->id}}">{{$year->title}}</option>
                                    @endforeach
                            </select> 
                                @error('year')
                                <font color="red"><small>The class field is required</small></font>
                                @enderror
                        </td>
                        <td>
                            <select type="text" wire:model="section" wire:change="getrecord" class="form-control" placeholder="Select Section">
                            <option>Select Section</option>
                                @forelse($sections as $section)
                                    <option value="{{$section->id}}">{{$section->title}}</option>
                                @empty
                                    <option disabled>No Record Found</option>
                                @endforelse
                            </select> 
                            @error('section')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </td>
                        <td>
                            <input type="date" wire:model="date" class="form-control" placeholder="Select Date">
                            @error('date')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </td>
                        <td>
                            <button type="submit" class="btn btn-sm btn-info" wire:click="search">
                                <i class="fa fa-search" aria-hidden="true"></i> Search
                            </button>
                        </td>
                    </tr>
            </tbody>
            </form>
        </table>
        <div class="float-left col-2">
            <p class="text-dark"> Date: {{ date('d-m-Y') }}</p>
        </div>
        <table class="table table-bordered table-striped table-bordered table-hover">
            <tr>
                <th class="col-2"><i class="fa fa-id-badge"></i> Student ID</th>
                <th><i class="fa fa-user"></i> Name</th>
                <th><i class="fa fa-user-circle"></i> Parent Name</th>
                <th class="col-2"><i class="fa fa-check"></i> Attendance</th>
            </tr>
            <tbody>
                @foreach($attendance as $attendence)
                <tr>
                    <td>{{$attendence->id}} </td>
                    <td>{{ucfirst($attendence->student->name)}} </td>
                    <td>{{ucfirst($attendence->student->parent_name)}} </td>
                    <td>
                        @if($attendence->status == 1)
                            <span class="badge badge-success">  Present </span>
                        @else
                            <span class="badge badge-danger">  Absent </span>
                        @endif
                    </td>
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>
