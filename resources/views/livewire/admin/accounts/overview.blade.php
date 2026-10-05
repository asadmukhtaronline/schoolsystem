<div>
    <div class="container-fluid my-5">
        <div class="row g-4">

            <!-- Total Fees Collected -->
            <div class="col-md-4">
                <div class="card shadow-lg border-0 rounded-4 bg-success text-white h-100 card-hover">
                    <div class="card-body d-flex align-items-center p-4">
                        <div class="icon-circle bg-white text-success me-3">
                            <i class="fa fa-money fa-2x"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 fw-bold">Total Fees Collected</h6>
                            <h3 class="mb-0">Rs {{ number_format($totalFees, 2) }}</h3>
                            <small class="opacity-75">Updated today</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Fees -->
            <div class="col-md-4">
                <div class="card shadow-lg border-0 rounded-4 bg-warning text-dark h-100 card-hover">
                    <div class="card-body d-flex align-items-center p-4">
                        <div class="icon-circle bg-dark text-warning me-3">
                            <i class="fa fa-clock-o fa-2x"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 fw-bold">Pending Fees</h6>
                            <h3 class="mb-0">Rs {{ number_format($pendingFees, 2) }}</h3>
                            <small class="text-dark-50">Awaiting payment</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Expenses -->
            <div class="col-md-4">
                <div class="card shadow-lg border-0 rounded-4 bg-danger text-white h-100 card-hover">
                    <div class="card-body d-flex align-items-center p-4">
                        <div class="icon-circle bg-white text-danger me-3">
                            <i class="fa fa-credit-card fa-2x"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 fw-bold">Total Expenses</h6>
                            <h3 class="mb-0">Rs {{ number_format($totalExpenses, 2) }}</h3>
                            <small class="opacity-75">All categories</small>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row g-4 mt-2">

            <!-- Balance -->
            <div class="col-md-4">
                <div class="card shadow-lg border-0 rounded-4 bg-primary text-white h-100 card-hover">
                    <div class="card-body d-flex align-items-center p-4">
                        <div class="icon-circle bg-white text-primary me-3">
                            <i class="fa fa-line-chart fa-2x"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 fw-bold">Current Balance</h6>
                            <h3 class="mb-0">Rs {{ number_format($balance, 2) }}</h3>
                            <small class="opacity-75">(Fees – Expenses)</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Defaulters -->
            <div class="col-md-4">
                <div class="card shadow-lg border-0 rounded-4 bg-dark text-white h-100 card-hover">
                    <div class="card-body d-flex align-items-center p-4">
                        <div class="icon-circle bg-white text-dark me-3">
                            <i class="fa fa-users fa-2x"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 fw-bold">Defaulters Count</h6>
                            <h3 class="mb-0">{{ $defaultersCount }}</h3>
                            <small class="opacity-75">Students with dues</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Upcoming Payments -->
            <div class="col-md-4">
                <div class="card shadow-lg border-0 rounded-4 bg-info text-dark h-100 card-hover">
                    <div class="card-body d-flex align-items-center p-4">
                        <div class="icon-circle bg-dark text-info me-3">
                            <i class="fa fa-calendar fa-2x"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 fw-bold">Upcoming Payments (This Month)</h6>
                            <h3 class="mb-0">Rs {{ number_format($upcomingPayments, 2) }}</h3>
                            <small class="text-dark-50">Unpaid dues</small>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @livewire('admin.accounts.history')
    @livewire('admin.accounts.expence')
</div>

<!-- Extra styling -->
<style>
    .icon-circle {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }
    .card-hover {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }
</style>
