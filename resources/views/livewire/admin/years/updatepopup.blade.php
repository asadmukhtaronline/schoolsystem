@section('title','Update Class')
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> --}}
{{-- <div wire:ignore.self class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"> --}}
<div wire:ignore.self  class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
        <button type="button" wire:click.prevent="cancel()" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <input type="hidden" wire:model="create_id">
          
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">create</label>
            <input type="text" wire:model="title" class="form-control" >
            @error('title')
            <font color="red"><small>{{ $message }}</small></font>
            @enderror
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Picture</label>
            <input type="file" wire:model="photo" class="form-control" >
            @error('picture')
            <font color="red"><small>{{ $message }}</small></font>
            @enderror
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Description</label>
            <textarea wire:model="description" class="form-control" id="message-text"></textarea>
            @error('description')
            <font color="red"><small>{{ $message }}</small></font>
            @enderror
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" wire:click.prevent="update()" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
{{-- </div> --}}
