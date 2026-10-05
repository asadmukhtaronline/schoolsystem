@section('title','Edit Subject')
 <div class="card">
    <div class="card-header"> <i class="fa fa-plus-circle"></i> Update Subject</div>
    <div class="card-body">
        <div class="container mt-1">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div style="height:230px; width:250px;">
                            @if (!empty($photo))
                                <img src="{{ $photo->temporaryUrl() }}" height="100%" width="100%">
                            @endif
                        </div>
                        <div class="card-footer">
                            <input type="file" wire:model="image">
                            {{-- <input type="file" wire:model="photo"> --}}

                            @error('photo')     
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="form-group">
                        <i class="fa fa-book"></i>
                        <label for="">Subject</label>
                        <input type="text" class="form-control" wire:model="title" />
                        @error('title')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                        <i class="fa fa-pencil"></i>

                        <label for="">Description</label>
                        <textarea class="form-control" rows="8" style="resize:none;" wire:model="description"></textarea>
                        @error('description')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">    
        <button type="button"  wire:click="update({{$subject->id}})" class="btn btn-danger btn-sm float-right">
            <i class="fa fa-save"></i> Update Subject
        </button>
    </div>
</div> 
