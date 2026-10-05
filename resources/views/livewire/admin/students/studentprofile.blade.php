@section('title','Student Profile')
<div>
    <!-- Student Details -->
    <div class="card">
        <div class="card-header"> <i class="fa fa-user-circle"></i> Student Profile</div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4" >
                    @if(config('app.env') === 'local')
                        <img src="{{ asset('storage/admissionform') }}/{{ $students->photo }}" border="25" class="wd-100"  alt="Image">
                    @else
                        <img src="{{ env('APP_URL') }}/storage/app/public/admissionform/{{ $students->photo }}" border="25" with="100%" height="250px" alt="Image">
                    @endif   
                </div>
                    <div class="col-lg-8">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th> <i class="fa fa-user-circle py-2"></i> Name</th>
                            <td>{{ ucfirst($students->name ?? 'N/A') }}</td>
                            </tr>
                            <tr>
                                <th> <i class="fa fa-male py-2"></i> Parent Name</th>
                                <td>{{ ucfirst($students->parent_name ?? 'N/A') }}</td>
                            </tr>
                            <tr>
                                <th> <i class="fa fa-users py-2"></i> Gender</th>
                                <td>{{ ucfirst($students->gender ?? 'N/A') }}</td>
                            </tr>
                            <tr>
                                <th> <i class="fa fa-whatsapp"></i> Phone</th>
                                <td>{{ucfirst ($students->phone ?? 'N/A') }}</td>
                            </tr>
                            <tr>
                                <th> <i class="fa fa-envelope"></i> Email</th>
                                <td>{{ucfirst ($students->email ?? 'N/A') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Address Details -->
    <div class="card">
        <div class="card-header"> <i class="fa fa-map-marker"></i> Address</div>
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th> <i class="fa fa-map"></i> Current Address</th>
                <td>{{ ($students->current_address) }}</td>
            </tr>
            <tr>
                <th> <i class="fa fa-map-marker"></i> Street Addrss</th>
                <td>{{ ($students->street_address) }}</td>
            </tr>
            <tr>
                <th> <i class="fa fa-map-signs"></i> City</th>
                <td>{{ ($students->city) }}</td>
            </tr>
            <tr>
                <th> <i class="fa fa-map-o"></i> Region</th>
                <td>{{ ($students->region) }}</td>
            </tr>
            <tr>
                <th> <i class="fa fa-map-pin"></i> Postal</th>
                <td>{{ ($students->postal) }}</td>
            </tr>
            <tr>
                <th> <i class="fa fa-map-marker"></i> country</th>
                <td>{{ ($students->country) }}</td>
            </tr>
        </table> 
    </div>
     <!-- Enrollments Details -->
     <div class="card">
        <div class="card-header"> <i class="fa fa-list"></i> Enrollments</div>
        <div>
            <table class="table table-bordered table-striped table-hover">
                <tr>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Fee</th>
                    <th>Fee Date</th>
                    <th>Accounts</th>
                </tr>
                @if($students->enrollment->count() > 0)
                    @foreach($students->enrollment as $enrollment)
                    <tr>
                        <td>{{ ucfirst($enrollment->year->title) }}</td>
                        <td>{{ ucfirst($enrollment->section->title) }}</td>
                        <td>{{ $enrollment->fee }}</td>
                        <td>{{ $enrollment->fee_date }}th of every month</td>
                        <td>
                            <a href="{{ route('admin.accounts', $enrollment->id) }}">
                                <button class="btn btn-info btn-sm mr-5"><i class="fa fa-bank"> Accounts</i></button>
                            </a>  
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center"><i class="fa fa-exclamation-triangle"></i> No Enrollment Yet</td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
  
</div>