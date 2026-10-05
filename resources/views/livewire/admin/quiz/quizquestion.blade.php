
@section('title', 'Quiz')

<div>
    <div class="card mb-4">
        <div class="card-header"><i class="fa fa-plus-circle"></i> Create Quiz</div>
        <div class="card-body">
            <form wire:submit.prevent="save">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title"><i class="fa fa-universal-access"></i> Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Title" wire:model="title">
                            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="questionCategory"><i class="fa fa-university"></i> Question Category</label>
                            <select class="form-control" id="questionCategory" wire:model="questionCategory">
                                <option>Select Type</option>
                                <option value="Subjective">Subjective</option>
                                <option value="Objective">Objective</option>
                            </select>
                            @error('questionCategory') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="marks"><i class="fa fa-book"></i> Marks</label>
                            <input type="text" class="form-control" id="marks" placeholder="Enter Marks" wire:model="marks">
                            @error('marks') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="options">Options</label>
                            <input type="number" class="form-control" id="options" placeholder="Enter Number of Options" wire:model="options">
                            @error('options') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if ($questionCategory === 'Objective')
                        @foreach ($fields as $index => $field)
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="option{{ $index + 1 }}">Option {{ $index + 1 }}</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="option{{ $index + 1 }}" placeholder="Enter Option {{ $index + 1 }}" wire:model="fields.{{ $index }}">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <input type="checkbox" wire:click="selectOption({{ $index }})" id="checkbox{{ $index }}" aria-label="Checkbox for option {{ $index + 1 }}" style="position:relative; right:20px; z-index:99; top:12.5px;" @if($selectedOptions[$index] == 1) checked="checked" @endif>
                                            </div>
                                        </div>
                                    </div>
                                    @error('fields.' . $index) <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-danger btn-sm float-right m-2">
                        <i class="fa fa-save"></i> Save
                        <i class="fa fa-spinner fa-spin" wire:loading></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
