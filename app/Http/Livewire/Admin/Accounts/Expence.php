<?php

namespace App\Http\Livewire\Admin\Accounts;

use Livewire\Component;
use App\Models\Expense;
use App\Models\ExpenseCategory;

class Expence extends Component
{
    # Expense fields
    public $expenses, $categories;
    public $expense_id, $expense_category_id, $description, $amount, $expense_date;
    public $isEdit = false;

    # Category fields
    public $category_id, $category_name;
    public $isCatEdit = false;

    protected $rules = [
        'expense_category_id' => 'required|integer',
        'description' => 'required|string|max:255',
        'amount' => 'required|numeric',
        'expense_date' => 'required|date',
    ];

    public function mount()
    {
        $this->categories = ExpenseCategory::latest()->get();
    }

    public function render()
    {
        $this->expenses = Expense::with('category')->latest()->get();
        $this->categories = ExpenseCategory::latest()->get();
        return view('livewire.admin.accounts.expence')->layout('Layouts.app');
    }

    # ---------------- Expense Methods ----------------
    public function resetFields()
    {
        $this->expense_id = $this->expense_category_id = $this->description = $this->amount = $this->expense_date = '';
        $this->isEdit = false;
    }

    public function store()
    {
        $this->validate();
        Expense::create([
            'expense_category_id' => $this->expense_category_id,
            'description' => $this->description,
            'amount' => $this->amount,
            'expense_date' => $this->expense_date,
        ]);

        session()->flash('success', 'Expense Added Successfully!');
        $this->resetFields();
    }

    public function edit($id)
    {
        $expense = Expense::findOrFail($id);
        $this->expense_id = $expense->id;
        $this->expense_category_id = $expense->expense_category_id;
        $this->description = $expense->description;
        $this->amount = $expense->amount;
        $this->expense_date = $expense->expense_date;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate();
        $expense = Expense::findOrFail($this->expense_id);
        $expense->update([
            'expense_category_id' => $this->expense_category_id,
            'description' => $this->description,
            'amount' => $this->amount,
            'expense_date' => $this->expense_date,
        ]);
        session()->flash('success', 'Expense Updated Successfully!');
        $this->resetFields();
    }

    public function delete($id)
    {
        Expense::findOrFail($id)->delete();
        session()->flash('success', 'Expense Deleted Successfully!');
    }

    # ---------------- Category Methods ----------------
    public function resetCategoryFields()
    {
        $this->category_id = $this->category_name = '';
        $this->isCatEdit = false;
    }

    public function storeCategory()
    {
        $this->validate(['category_name' => 'required|string|max:100']);
        ExpenseCategory::create(['name' => $this->category_name]);
        session()->flash('success', 'Category Added Successfully!');
        $this->resetCategoryFields();
    }

    public function editCategory($id)
    {
        $cat = ExpenseCategory::findOrFail($id);
        $this->category_id = $cat->id;
        $this->category_name = $cat->name;
        $this->isCatEdit = true;
    }

    public function updateCategory()
    {
        $this->validate(['category_name' => 'required|string|max:100']);
        $cat = ExpenseCategory::findOrFail($this->category_id);
        $cat->update(['name' => $this->category_name]);
        session()->flash('success', 'Category Updated Successfully!');
        $this->resetCategoryFields();
    }

    public function deleteCategory($id)
    {
        ExpenseCategory::findOrFail($id)->delete();
        session()->flash('success', 'Category Deleted Successfully!');
    }
}
