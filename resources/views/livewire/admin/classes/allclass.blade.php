@section('title','Classess')
       <div class="card">
        <div class="card-header">
            <i class="fa fa-list"></i> All Classes
        </div>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <table class="table table-bordered table-striped table-bordered table-hover">
        <tr>
            <td colspan="12">
            <input type="text" class="form-control" wire:keyup="searchyears" wire:model="searchclass" placeholder="Search Classes..." />
            </td>
        </tr>
       
        <tr>
            <th><i class="fa fa-university" aria-hidden="true"></i> Classes</th>
            <th><i class="fas fa-align-left"></i> Description</th>
            <th><i class="fas fa-cog"></i> Action</th>
        </tr>
        
        @if($years->count() > 0)
            @foreach($years as $years)
            <div class="container-fluid">
                <div class="row">
                    <tr class="col-2">
                    <th>
                    @if(config('app.env') === 'local')
                        <img src="{{ asset('storage/years') }}/{{ $years->image }}" border="25" class="wd-32 rounded-circle" width="30" height="30" alt="Image">
                    @else
                    <img src="{{ env('APP_URL') }}/storage/app/public/years/{{ $years->image }}" border="25" class="wd-32 rounded-circle" width="30" height="30" alt="Image">
                    @endif
                        {{ ucfirst($years->title) }}
                    </th>
                    <td class="col-8">
                    {{ ucfirst($years->description) }}
                    </td>
                    <td class="col-2">
                    <button class="btn btn-danger btn-sm" wire:confirm="Please confirm, you want to delete?" wire:click="alertConfirm({{$years->id}})">
                            <i class="fa fa-trash"></i>
                    </button>
                    <a href="{{ route('admin.classddetails', $years->id) }}" ><button class="btn btn-success btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-mouse-pointer"></i></button></a>
                    <button data-toggle="modal" wire:click="edit({{$years->id}})" data-target="#exampleModal" type="button" class="btn btn-success btn-sm" >
                        <i class="fa fa-edit"></i>
                        </button> 
                    @include('livewire.admin.years.updatepopup')
                        @livewireScripts
                        <script>
                        window.livewire.on('update',()=>{
                            $('#exampleModal').modal('hide');
                        })
                        
                    </script>
                </td>
            </tr>  
        </div>
    </div>
        @endforeach
        @else 
        <tr>
            <td colspan="12" class="text-center">
                Not Found
            </td>
        </tr>
        @endif
        </table>
    </div>
</div>

