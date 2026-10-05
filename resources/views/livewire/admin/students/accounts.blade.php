@section('title','Accounts')
<div class="card">
        <div class="card-header">
            <i class="fa fa-list"></i> Accounts
            <i class="fa fa-spin fa-spinner float-right" wire:loading></i>
        </div>
        <table class="table table-bordered table-striped table-bordered table-hover">
            <tr>
                <th><i class="fa fa-user"></i> Name</th>
                <th><i class="fa fa-phone"></i> Phone/Whatsapp</th>
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
                        <td><input wire:model="paymethod" class="form-control form-control-sm" type="text"><br>
                        @error('paymethod')
                        <font color="red"><small>{{ $message }}</small></font>
                        @enderror
                    </td>
                    @else
                    <td>{{ $fee->paymethod }}</td>
                    @endif
                    <td>{{ $fee->enrollment->fee }}</td>
                    @if($fee->status == 0)
                        <td>
                            <input wire:model="fee_date"  class="form-control form-control-sm" type="date">
                            @error('fee_date')
                            <font color="red"><small>{{ $message }}</small></font>
                            @enderror
                            <small>{{ $fee->fee_date }}</small>
                    </td>
                    <td>
                        <button wire:click="update({{$fee->id}})" class="btn btn-primary btn-sm ml-2"> Update</button>
                        <button wire:click="save({{$fee->id}})" class="btn btn-success btn-sm tx-bold"> Pay</button>
                    </td>
                    @else
                    <td>{{ $fee->fee_date }}</td>
                    <td>
                        <span class="badge badge-success p-1 tx-20">Paid</span>
                        <button wire:click="generateInvoice({{$fee->id}})" class="badge badge-primary p-1 tx-20"> <i class="fa fa-file-pdf-o"></i></button>
                    </td>
                    @endif
                </tr>
            @endforeach
        </table>
    </div>
</div>

