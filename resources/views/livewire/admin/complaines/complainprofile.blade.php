<div class="container mt-4">
    <div class="card">
        <div class="card-header"> <i class="fa fa-user-circle"></i> Complain 
            @if($complain->status == "active")
            <button class="btn btn-danger float-right btn-sm m-2" wire:click="close">
                <i class="fa fa-close"> Close</i>
            </button>
            @endif
        </div>
        
        <div>
            <div class="row">
                <div class="col-lg-4" >
                @if (config('app.env') === 'local')
                <img src="{{ asset('storage') }}/{{ $complain->file }}"  height="100%" width="100%" alt="">
              @else
                <img src="{{ env('APP_URL') }}/storage/app/public/{{ $complain->file }}" height="100%" width="100%" alt="">
              @endif
                    {{-- <img src="{{ asset('storage/' . $complain->file) }}" alt="complain" width="100%" height="255px"> --}}
                </div>
                <div class="col-lg-8">
                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <th> <i class="fa fa-exclamation-circle"></i> Tracker ID</th>
                            <td>{{ ($complain->tracker) }}</td>
                        </tr>
                        <tr>
                            <th> <i class="fa fa-user-circle py-2"></i> Title</th>
                            <td>{{ ucfirst($complain->title) }}</td>
                        </tr>
                        <tr>
                            <th> <i class="fa fa-list-alt py-2"></i> Category</th>
                            <td>{{ ucfirst($complain->category) }}</td>
                        </tr>
                        <tr>
                            <th> <i class="fa fa-file py-2"></i> File</th>
                            <td> <button class="btn btn-secondary btn-sm m-2 " wire:click="downloadFile('{{ $complain->file }}')"> <i class="fa fa-download"></i> Download </button></td>    
                        </tr>
                        <tr>
                            <th> <i class="fa fa-clock-o py-2"></i> Time</th>
                            <td>{{ \Carbon\Carbon::parse($complain->created_at)->diffForHumans() }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <i class="fa fa-list"></i>  Description
        </div>
        <div class="card-body">
            {{ ucfirst($complain->description) }}
        </div>
    </div>
    
</div>