@section('title','Fee History')

<div class="container-fluid mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="fa fa-history"></i> Fee Payment History
            </h5>
            <button wire:click="loadFees" class="btn btn-light btn-sm">
                <i class="fa fa-refresh"></i> Refresh
            </button>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive" wire:poll.10s>
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th><i class="fa fa-hashtag"></i> </th>
                            <th><i class="fa fa-user"></i> Student</th>
                            <th><i class="fa fa-money"></i> Fee</th>
                            <th><i class="fa fa-credit-card"></i> Payment Method</th>
                            <th><i class="fa fa-check-circle"></i> Status</th>
                            <th><i class="fa fa-file-pdf-o"></i> Receipt</th>
                            <th><i class="fa fa-calendar"></i> Admission Date</th>
                            <th><i class="fa fa-clock-o"></i> Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($fees as $fee)
                            <tr>
                                <td>{{ $fee->id }}</td>
                                <td>{{ $fee->student->name }}</td>
                                <td><span class="badge bg-success">{{ number_format($fee->fee, 2) }}</span></td>
                                <td><i class="fa fa-credit-card"></i> {{ ucfirst($fee->paymethod) }}</td>
                                <td>
                                    @if($fee->status == 1)
                                        <span class="badge bg-success"><i class="fa fa-check"></i> Paid</span>
                                    @else
                                        <span class="badge bg-danger"><i class="fa fa-times"></i> Unpaid</span>
                                    @endif
                                </td>
                                <td>
                                    @if($fee->recipe)
                                        <a href="{{ asset('storage/'.$fee->recipe) }}" target="_blank" class="btn btn-sm btn-info">
                                            <i class="fa fa-file-pdf-o"></i> View
                                        </a>
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($fee->admission_date)->format('d M Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($fee->created_at)->diffForHumans() }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted">
                                    <i class="fa fa-exclamation-circle"></i> No fee records found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
