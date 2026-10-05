@section('title','Complaines')
<div class="card">
    <div class="card-header">
        <i class="fa fa-list"></i> All Complain
        <div class="form-inline my-2 my-lg-0 float-right">
            <form wire:submit.prevent="">
                <button class="btn btn-danger my-sm-1" wire:click="rest" type="rest">Reset</button>
            </form>
        </div>
        <div class="form-inline my-2 my-lg-0 float-right">
            <form class="btn-sm" wire:submit.prevent="search">
                <div class="input-group">
                    <input class="form-control mr-sm-2" type="search" wire:model.debounce.100ms="search" placeholder="Search">
                    <div class="input-group-append">
                        <button class="btn btn-info" type="submit"> <i class="fa fa-search"></i> Search</button>
                    </div>
                </div>
            </form>
            
        </div>
        
    </div>
    
    <table class="table table-bordered table-striped table-bordered table-hover">
        <tr>
            <th> <i class="fa fa-exclamation-circle"></i> Complain</th>
            <th class=""><i class="fa fa-user"></i> Title</th>
            <th class=""><i class="fa fa-list-alt"></i> Category</th>
            <th class=""> <i class="fa fa-clock-o"></i> Time</th>
            <th class=""> <i class="fa fa-check"></i> Status</th>
            <th class="">Action</th>
        </tr>


        @foreach($complain as $complain)

        <tr>
            <td>
                {{$complain->tracker}}
            </td>
        
            <td>
                {{ucfirst($complain->title)}}
            </td>
            
            <td>
                {{ucfirst($complain->category)}}
            </td>

            <td>
                {{ \Carbon\Carbon::parse($complain->created_at)->diffForHumans() }}
            </td>
            <td>
                @if ($complain->status == 'active')
                    <span class="badge badge-success py-2 px-3 fs-6">{{$complain->status}}</span>
                @else
                    <span class="badge badge-secondary py-2 px-3 fs-6">{{$complain->status}}</span>
                @endif
            </td>
            
             
            <td>
                <button type="button" class="btn btn-danger btn-sm" wire:click="alertConfirm({{ $complain->id }})"><i class="fa fa-trash"></i></button>
                <button data-target="#exampleModal" data-toggle="modal" wire:click="edit({{ $complain->id }})" type="button" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                <a href="{{ route('admin.complainprofile', $complain->id) }}">
                   <button class="btn btn-info btn-sm"> <i class="fa fa-user-circle"></i></button>
                </a>
            </td>
        </tr>

        @endforeach
        
        @include('livewire.admin.complaines.updatepopup')
    </table>
</div>
</div>
