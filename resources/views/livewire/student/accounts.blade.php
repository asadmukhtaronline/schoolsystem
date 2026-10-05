<div>
   <div class="card">
    <div class="card-header">
        <i class="fa fa-money"></i> Your Accounts History
    </div>
    <table class="table table-bordered table-stripped table-hover">
        @foreach(Auth::user()->student->enrollment as $enrollment)
            <tr>
                <th class="bg-danger text-white" colspan="7">
                    <i class="fa fa-id-card"></i> {{ $enrollment->rollnumber }}
                </th>
            </tr>
            <tr>
                <th><i class="fa fa-user-circle"></i> Name</th>
                <th><i class="fa fa-whatsapp"></i> Phone/Whatsapp</th>
                <th><i class="fa fa-university"></i> Class</th>
                <th><i class="fa fa-paypal"></i> Payment Method</th>
                <th><i class="fa fa-money"></i> Payment</th>
                <th><i class="fa fa-calendar"></i> Payment Date</th>
                <th><i class="fa fa-check"></i> Status</th>
            </tr>
            @foreach($enrollment->fees->reverse() as $fee)
                <tr>
                    <td>{{ $fee->student->name }}</td>
                    <td>{{ $fee->student->phone }}</td>
                    <td>{{ $fee->enrollment->year->title }} <span class="badge badge-danger">{{ ucfirst($fee->enrollment->section->title) }}</span></td>
                    @if($fee->paymethod === null)
                        <td>
                            No submitted Yet
                        </td>
                    @else
                        <td>{{ $fee->paymethod }}</td>
                    @endif
                    <td>{{ $fee->enrollment->fee }}</td>
                    @if($fee->status == 0)
                    <td>
                        <small>{{ $fee->fee_date }}</small>
                    </td>
                    <td>
                       <span class="badge badge-warning">Pending</span>
                    </td>
                    @else
                    <td>{{ $fee->fee_date }}</td>
                    <td>
                        <a href="https://matheducatorz.com/storage/app/public/invoice/{{ $fee->recipe }}" target="_blank">
                        <button class="btn btn-info btn-sm"> <i class="fa fa-file-pdf-o"></i> Invoice </button>
                        </a>
                    </td>
                    @endif
                </tr>
            @endforeach
        @endforeach
    </table>
   </div>
</div>
