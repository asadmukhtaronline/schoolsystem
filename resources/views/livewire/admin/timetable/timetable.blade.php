@section('title','Time Table')
<div class="container mt-3">
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header"><i class="fa fa-clock-o"> Create Time</i></div>
                <button class="btn-primary btn mx-5" wire:click="createDefaultTimeSlots" ><i class="fa fa-clock-o"></i>12 Time Slots</button>
            <div>
                    <table class="table table-bordered table-striped table-bordered table-hover">
                        <tr>
                            <th class="font-weight-bold"> Start Time</th>
                            <th class="font-weight-bold"> End Time</th>
                            <th class="font-weight-bold"> Action</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="time" class="form-control" wire:model="start_time"  />
                                @error('start_time')
                                <font color='red'><small>{{ $message }}</small></font>
                                @enderror    
                            </td>
                            <td>
                                <input type="time" class="form-control" wire:model="end_time" />
                                @error('end_time')
                                <font color='red'><small>{{ $message }}</small></font>
                                @enderror    
                            </td>
                            <td>
                            <button class="btn-primary btn" wire:click="savetime"  ><i class="fa fa-save"></i></button>

                            </td>
                        </tr>
                        @foreach($timeslot as $timeslot )  
                            <tr>
                                <td>{{ucfirst($timeslot->start_time)}}</td>
                                <td>{{ucfirst($timeslot->end_time)}}</td>
                                <td>
                                <button wire:click="alertConfirm({{ $timeslot->id }})" class="btn btn-danger btn-sm"  ><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
            </div>
        </div>
    </div>
    
    <div  class="col-lg-6">
        <div class="card">
            <div class="card-header"><i class="fa fa-calendar"> Create Day</i></div>
            <button class="btn-primary btn mx-5" wire:click="createAutoDays" ><i class="fa-solid fa-calendar-days"></i> Auto Days</button>
            <div>
                    <table class="table table-bordered table-striped table-bordered table-hover">
                        <tr>
                            <th class="font-weight-bold"> Start</th>
                            <th class="font-weight-bold"> Action</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" wire:model="title" />
                                @error('time')
                                <font color='red'><small>{{ $message }}</small></font>
                                @enderror    
                            </td>
                            <td>
                                <button class="btn-primary btn" wire:click="saveday" ><i class="fa fa-save"></i></button>
                            </td>
                        </tr>
                        @foreach($day as $day )  

                            <tr>
                                <td>{{ucfirst($day->title)}} </td>
                                <td>
                                <button wire:click="allertConfirm({{ $day->id }})" class="btn btn-danger btn-sm"  ><i class="fa fa-trash"></i></button>
                                </td>

                            </tr>
                        @endforeach

                    </table>
            </div>
        </div>
    </div>
</div>
</div>


       