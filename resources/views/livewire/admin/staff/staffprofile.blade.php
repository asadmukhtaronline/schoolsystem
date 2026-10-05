@section('title','Staff Profile')
<div>
  <div class="card">
      <div class="card-header"> <i class="fa fa-user-circle"></i> Staff Profile</div>
  </div>
  <div class="card-body">
      <div class="row">
          <div class="col-lg-3" >
             @if(config('app.env') === 'local')
                    <img src="{{ asset('storage/staff') }}/{{ $staff->image }}" border="25"  width="100%" height="100%" alt="Image">
                @else
                <img src="{{ env('APP_URL') }}/storage/app/public/{{ $staff->image }}" border="25"  width="100%" height="100%" alt="picture">
                @endif
          </div>
          <div class="col-lg-9">
              <table class="table table-bordered table-striped table-hover">
                  <tr>
                      <th> <i class="fa fa-user-circle"></i> Name</th>
                      <td>{{ ucfirst($staff->name) }}</td>
                  </tr>
                  <tr>
                      <th> <i class="fa fa-envelope-o"></i> Email</th>
                      <td>{{ ucfirst($staff->email) }}</td>
                  </tr> <tr>
                      <th> <i class="fa fa-whatsapp"></i> Whatsapp</th>
                      <td>{{ ($staff->whatsapp) }}</td>
                  </tr>
                  
                 
                  <tr>
                      <th> <i class="fa fa-users"></i> GENDER</th>
                      <td>{{ ucfirst($staff->gender) }}</td>
                  </tr>
                  <tr>
                      <th> <i class="fa fa-address-book"></i> CNIC</th>
                      <td><button type="button" wire:click="download({{$staff->id}})" class="btn btn-primary btn-sm" data-mdb-ripple-init>
                        <i class=" fa fa-download sm"></i> Download
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <th> <i class="fa fa-credit-card-alt"></i> SALARY</th>
                    <td>{{ ($staff->salary) }}</td>
                </tr>
              </table>
          </div>
      </div>
  </div>
</div>


