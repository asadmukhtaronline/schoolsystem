<?php

namespace App\Http\Livewire\Admin\Accounts;

use Livewire\Component;
use App\Models\fee as fees;
use App\Models\enrollment;
use App\Models\Expense; // 👈 if you already have an expenses table/model
use Carbon\Carbon;

class Overview extends Component
{
    public $totalFees;
    public $pendingFees;
    public $totalExpenses;
    public $balance;
    public $defaultersCount;
    public $upcomingPayments;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        // ✅ Total Fees Collected (status = 1 means paid)
        $this->totalFees = fees::where('status', 1)->sum('fee');

        // ✅ Pending Fees
        $this->pendingFees = fees::where(function($q) {
                                    $q->whereNull('status')->orWhere('status', 0);
                                })->sum('fee');

        // ✅ Expenses (if table exists, else keep 0)
        $this->totalExpenses = class_exists(Expense::class)
                                ? Expense::sum('amount')
                                : 0;

        // ✅ Profit / Balance
        $this->balance = $this->totalFees - $this->totalExpenses;

        // ✅ Defaulters Count
        $this->defaultersCount = enrollment::whereNotIn('id', function($q) {
                                    $q->select('enrollment_id')->from('fees')->where('status', 1);
                                })->count();

        // ✅ Upcoming Payments (fees with due date in current month and not paid)
        $this->upcomingPayments = fees::whereMonth('fee_date', Carbon::now()->month)
                                      ->whereYear('fee_date', Carbon::now()->year)
                                      ->where(function($q) {
                                          $q->where('status', 0)->orWhereNull('status');
                                      })
                                      ->sum('fee');
    }

    public function render()
    {
        return view('livewire.admin.accounts.overview')
                ->layout('Layouts.app');
    }
}

