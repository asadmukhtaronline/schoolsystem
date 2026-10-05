@section('title','Add Complaines')
<div>
    <form wire:submit.prevent='save'>

        <div class="card">
            <div class="card-header"> <i class="fa fa-plus-circle"></i> Add New Complain</div>

            <div class="col-lg-12">
                <div class="form-group">
                    <label class="font-weight-bold" for=""><i class="fa fa-user"></i> Title</label>
                    <input type="text" class="form-control" wire:model="title"/>
                    @error('title')
                    <font color="red"><small>{{ $message }}</small></font>
                    @enderror
                </div>
            </div>

            <div class="col-lg-12">
                <div class="form-group">
                    <label class="font-weight-bold" for=""><i class="fa fa-list-alt"></i> Category</label>
                    <select class="form-control" wire:model="categorycomplain" id="exampleFormControlSelect1">
                        <option>Select Category</option>
                        @foreach($category as $cat)
                        <option>{{$cat->title}}</option>
                        @endforeach
                    </select>
                    @error('title')
                    <font color="red"><small>{{ $message }}</small></font>
                    @enderror
                </div>
            </div>

            <div class="col-lg-12">
                <div class="form-group mt-14">
                    <label class="font-weight-bold" for=""><i class="fa fa-list"></i> Description</label>
                    <textarea class="form-control" rows="8" style="resize:none;" wire:model="description"></textarea>
                    @error('description')
                    <font color="red"><small>{{ $message }}</small></font>
                    @enderror
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <label class="font-weight-bold" for=""><i class="fa fa-book"></i> File</label>
                    <input class="form-control" type="file" wire:model="file" id="formFile">
                    @error('file')
                    <font color="red"><small>{{ $message }}</small></font>
                    @enderror
                </div>
            </div>

            <div class="card ml-3 d-flex ml-auto mt-3" style="width:100px;">
                <button type="submit" class="btn btn-danger btn-sm" wire:loading.attr="disabled">
                    <span wire:loading wire:target="save"><i class="fa fa-spinner fa-spin"></i></span>
                    <span wire:loading.remove wire:target="save"><i class="fa fa-save"></i> Submit</span>
                </button>
            </div>
        </div>
    </form>
</div>
