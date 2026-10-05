<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Quiz</h5>
        <button type="button" wire:click.prevent="cancel()" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form style="width:300px;">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Title</label>
            <input type="text" wire:model="title" class="form-control">
            @error('title')
            <font color="red"><small>{{ $message }}</small></font>
            @enderror
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" wire:click.prevent="update({{ $quiz->id }})" class="btn btn-primary">Update Quiz</button>
      </div>
    </div>
  </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        window.addEventListener('closeModal', event => {
            $('#exampleModal').modal('hide');
        });
    });
</script>
