@section('title','Quiz Category')
<div class="card">
        <div class="card-header">
            <i class="fa fa-list"></i> Quiz Category
        </div>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <table class="table table-bordered table-striped table-bordered table-hover">
            <tr>
                <th class="font-weight-bold"><i class="fa fa-pencil" aria-hidden="true"></i> Title</th>
                <!-- <th class="font-weight-bold"><i class="fa fa-edit"></i> Status</th> -->
                <th class="font-weight-bold"><i class="fa fa-cog"></i> Action</th>
            </tr>
            <tr>
                <td><input wire:model="title" class="form-control" type="text" class=" placeholder="Title"></td>
                <!-- <td><input wire:model="status" type="text" class="py-1 px-1 w-75 outline-none border border-1" placeholder="Selected Status"></td> -->
                <td><div class="card" style="width:65px;">    
            <button type="button" wire:click="save" class="btn btn-danger btn-sm">
                <i class="fa fa-save"></i> Save
            </button>
        </div></td>
            </tr>
       @foreach($quiz as $quiz)
            <tr>
                <td>{{$quiz->title}}</td>
              
                <td>
                <button wire:click="alertConfirm({{$quiz->id}})" class="btn btn-danger btn-sm"  ><i class="fa fa-trash"></i> </button>
                 <button data-toggle="modal" wire:click="edit({{$quiz->id}})" data-target="#exampleModal" type="button" class="btn btn-success btn-sm" > <i class="fa fa-edit"></i></button>
                 </td>
                 @include('livewire.admin.quiz.quizupdate')
                 @livewireScripts
                    <script>
                        window.livewire.on('update',()=>{
                            $('#exampleModal').modal('hide');
                        })
                        
                    </script>

            </tr>
    @endforeach
        </table>
    </div>
</div>

