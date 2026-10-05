@section('title','Complain Category')
<div class="card">
    <div class="card-header"> <i class="fa fa-plus-circle"></i> Add Complain Category</div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <table class="table table-bordered table-striped table-bordered table-hover">
        <tr>
           <th class="font-weight-bold"><i class="fa fa-pencil"></i> Title</th>
           <th class="font-weight-bold"><i class="fa fa-cog"></i>Action</th>
        </tr>
        <tr>
            <td><input wire:model="title" class="form-control" type="text" class="" placeholder="Title">
                @error('title')
                <font color="red"><small>{{ $message }}</small></font>
                @enderror
            </td>
                 <td><div class="card" style="width:65px;">
 
                    
            <div> 
                <button type="submit" wire:click="save" wire:loading.attr="enabled" wire:target="save" class="btn btn-danger btn-sm">
                    <i class="fa fa-save"></i> Save
                    <span wire:loading>
                    <i class="fa fa-spinner fa-spin"></i>
                    </span>
                 </button>
    
            </div>
        </td>
            </tr>        
           <br>

        <div>

            <tbody>
                @foreach ($tickets as $ticket)
                   <tr>
                        <td> 
                         {{$ticket->title}}
                        </td>

                      <td>
                        <button type="button" class="btn btn-danger btn-sm" wire:click="alertConfirm({{$ticket->id}})"><i class="fa fa-trash"></i>
                        </button>
                      </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

