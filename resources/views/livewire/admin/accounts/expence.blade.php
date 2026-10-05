@section('title','Expense Tracker')

<div class="container mt-4">

    {{-- Flash Message --}}
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fa fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        {{-- Categories Card --}}
        <div class="col-lg-4 mb-3">
            <div class="card shadow">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0"><i class="fa fa-folder"></i> Manage Categories</h5>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="{{ $isCatEdit ? 'updateCategory' : 'storeCategory' }}">
                        <div class="input-group mb-2">
                            <input type="text" wire:model="category_name" class="form-control" placeholder="Category Name">
                            <button class="btn btn-success">
                                <i class="fa {{ $isCatEdit ? 'fa-refresh' : 'fa-plus' }}"></i>
                            </button>
                        </div>
                        @error('category_name') <small class="text-danger">{{ $message }}</small> @enderror
                    </form>

                    <table class="table table-sm table-bordered table-hover mt-3">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th width="100">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $index => $cat)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $cat->name }}</td>
                                    <td>
                                        <button wire:click="editCategory({{ $cat->id }})" class="btn btn-sm btn-warning">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                        <button wire:click="deleteCategory({{ $cat->id }})" class="btn btn-sm btn-danger" onclick="return confirm('Delete this category?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="3" class="text-center">No Categories</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Expenses Card --}}
        <div class="col-lg-8 mb-3">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fa fa-money"></i> {{ $isEdit ? 'Edit Expense' : 'Add New Expense' }}</h5>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}">
                        <div class="row g-2">
                            <div class="col-md-3">
                                <select wire:model="expense_category_id" class="form-control">
                                    <option value="">-- Select Category --</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                @error('expense_category_id') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-3">
                                <input type="text" wire:model="description" class="form-control" placeholder="Description">
                                @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-2">
                                <input type="number" wire:model="amount" class="form-control" placeholder="Amount">
                                @error('amount') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-2">
                                <input type="date" wire:model="expense_date" class="form-control">
                                @error('expense_date') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-success w-100">
                                    <i class="fa {{ $isEdit ? 'fa-refresh' : 'fa-plus' }}"></i> {{ $isEdit ? 'Update' : 'Add' }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Expense List --}}
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0"><i class="fa fa-list"></i> Expense Records</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($expenses as $index => $exp)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $exp->category->name ?? 'N/A' }}</td>
                                        <td>{{ $exp->description }}</td>
                                        <td>{{ number_format($exp->amount,2) }}</td>
                                        <td>{{ $exp->expense_date }}</td>
                                        <td>
                                            <button wire:click="edit({{ $exp->id }})" class="btn btn-sm btn-warning">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <button wire:click="delete({{ $exp->id }})" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="6" class="text-center text-muted">No Expenses Found</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div> {{-- end expenses --}}
    </div>
</div>
