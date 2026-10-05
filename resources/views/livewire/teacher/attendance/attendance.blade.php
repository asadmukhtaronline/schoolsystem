@section('title', 'Attendance')
<div>
    <div class="card">
        <div class="card-header"> <i class="fa fa-plus-circle"></i> Attendance Management</div>
        <table class="table table-bordered table-striped table-bordered table-hover">
                <tr>
                    <th ><i class="fa fa-user"></i> Teacher</th>
                    <th ><i class="fa fa-universal-access"></i> Class</th>
                    <th ><i class="fa fa-pie-chart"></i> Section</th>
                    <th><i class="fa fa-cog"></i> Action</th>
                </tr>
                <tbody>
                    <tr>
                        <td>
                           <h5 class = "text-dark"> {{$teacherName}} </h5>
                        </td>
                        <td>
                            <select type="text" class="form-control" placeholder="Search Class" wire:model='year' wire:change='getsection' id="exampleFormControlSelect1">
                                    <option>Select Class</option>
                                    @foreach($years as $year)
                                        <option value="{{$year->id}}">{{$year->title}}</option>
                                    @endforeach
                            </select> 
                                @error('year')
                                <font color="red"><small>{{ $message }}</small></font>
                                @enderror
                        </td>
                        <td>
                            <select type="text" wire:model="section" class="form-control" placeholder="Search Section" id="exampleFormControlSelect1">
                            <option>Select Section</option>
                                @forelse($sections as $section)
                                    <option value="{{$section->id}}">{{$section->title}}</option>
                                @empty
                                    <option disabled>No Record Found</option>
                                @endforelse
                            </select> 
                            @error('Section')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-info" wire:click="search">
                                <i class="fa fa-search" aria-hidden="true"></i> Search
                            </button>
                        </td>
                    </tr>
            </tbody>
        </table>
        <div class="float-left col-2">
            <p class="text-dark"> Date: {{ date('d-m-Y') }}</p>
        </div>
        <div>
            <table class="table table-bordered table-striped table-bordered table-hover">
                <tr>
                    <th class="col-2"><i class="fa fa-id-badge"></i> Student ID</th>
                    <th><i class="fa fa-user-circle"></i> Name</th>
                    <th><i class="fa fa-user"></i> Parent Name</th>
                    <th class="col-2"><i class="fa fa-check"></i> Attendance</th>
                </tr>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>{{$student->id}} </td>
                        <td>{{ucfirst($student->student->name)}} </td>
                        <td>{{ucfirst($student->student->parent_name)}} </td>
                        <td>
                            <div class="checkbox ml-5">
                                <input type="checkbox" class="primary" wire:model="status.{{$student->student_id}}" name="" id="">
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card ml-auto">    
            <button type="button" wire:click="save" class="btn btn-danger btn-sm float-right m-2">
                <i class="fa fa-save"></i> Mark
                <i class="fa fa-spinner fa-spin" wire:loading> </i>
            </button>
        </div>
    </div>
</div>
