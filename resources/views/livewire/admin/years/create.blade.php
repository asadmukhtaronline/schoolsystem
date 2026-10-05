@section('title', 'Add Class')
<div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-plus-circle"></i> Create New Class
        </div>
        <div class="container-fluid mt-1">
            <div class="row">
                <div class="col-lg-3 mb-3">
                    <div class="card">
                        <div style="height:227px; width:100%;">
                            @if (!empty($photo))
                                <img src="{{ $photo->temporaryUrl() }}" height="100%" width="100%">
                            @endif
                        </div>
                        <div class="card-footer">
                            <input type="file" wire:model="photo" class="form-control-file">
                            @error('photo')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="form-group">
                        <label for=""><i class="fa fa-university"></i> Class Title</label>
                        <input type="text" class="form-control" wire:model="title">
                        @error('title')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for=""><i class="fas fa-align-left"></i> Description</label>
                        <textarea type="text" wire:model="description" style="resize:none;" rows="8" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-list"></i> Select Subject
        </div>
        <div class="container-fluid mt-2 mb-3">
            <div class="row">
                @if($subjects->count() > 0)
                    @foreach($subjects as $index => $sub)
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-book"></i> {{ ucfirst($sub->title) }}
                                    <input class="float-right" type="checkbox" name="sub[{{$index}}][{{ $sub }}]" wire:model="subs.{{ $sub->id }}">
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                <div class="d-flex justify-content-center align-items-center vh-100">
                    <div class="text-center p-3">
                        <h3>
                            <i class="fa fa-exclamation-triangle"></i> No Subject Added Yet, Please Add Subject First
                        </h3>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="card-footer">
            @if($subjects->count() > 0)
            <button type="button" wire:click="save" class="btn btn-danger btn-sm float-right">
                <i class="fa fa-save"></i> Save Class
            </button>
            @endif
        </div>
    </div>
</div>

