<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    @section('title','Edit Category')
<div wire:ignore.self  class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Complain</h5>
        <button type="button" wire:click.prevent="cancel()" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <input type="hidden" wire:model="update">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label"><i class="fa fa-user"></i>Title</label>
            <input type="text" wire:model="title" class="form-control" >
            @error('title')
            <font color="red"><small>{{ $message }}</small></font>
            @enderror
          </div>

          <div class="form-group">
            <label class="font-weight-bold"for=""><i class="fa fa-list-alt"></i> Category</label>
            <select class="form-control" wire:model="category" id="exampleFormControlSelect1">
                <option>Select Category</option>
                @foreach($complaincategory as $category)
                <option>{{$category->title}}</option>
                @endforeach
            </Select>
            @error('category')
            <font color="red"><small>{{ $message }}</small></font>
            @enderror
        </div>
          
          <div class="form-group">
            <label for="message-text" class="col-form-label"><i class="fa fa-list"></i> Description</label>
            <textarea wire:model="description" class="form-control" id="message-text"></textarea>
            @error('description')
            <font color="red"><small>{{ $message }}</small></font>
            @enderror
          </div>     

          <div class="form-group">
            <label for="recipient-name" class="col-form-label"><i class="fa fa-book"></i>File</label>
            <input type="file" wire:model="file" class="form-control" >
            @error('file')
            <font color="red"><small>{{ $message }}</small></font>
            @enderror
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" data-target="#exampleModal" wire:click.prevent="update" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>

</div>
