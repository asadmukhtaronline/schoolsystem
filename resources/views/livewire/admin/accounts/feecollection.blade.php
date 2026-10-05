@section('title','Fee Collection')
<div>
    <div class="card">
        <div class="card-header bg-danger text-white">
            <i class="fa fa-money"></i> Fee Collection
        </div>
        <table class="table table-bordered table-stripped table-hover">
            <tr>
                <th><i class="fa fa-id-badge"></i> ID</th>
                <th><i class="fa fa-user-circle"></i> Student  </th>
                <th><i class="fa fa-whatsapp"></i> What's App </th>
                <th><i class="fa fa-certificate"></i> Enrollment </th>
                <th><i class="fa fa-money"></i> Received Amount </th>
                <th><i class="fa fa-credit-card"></i> Monthly Fee </th>
                <th><i class="fa fa-play-circle"></i> Action</th>
            </tr>
            @foreach($fees as $fee)
            <tr>
                <td>{{ $fee->id }}</td>
                <td>{{ $fee->student->name }}</td>
                <td>{{ $fee->student->phone }} </td>
                <td>{{ $fee->year->title }} <span class="badge bg-danger">{{ $fee->section->title }}</span> </td>
                <td>{{ $fee->fees->where('status', 1)->sum('fee') }}</td>
                <td>{{ $fee->fee }}</td>
                <td>
                    <a href="{{ route('admin.accounts',$fee->id) }}">
                        <button class="btn btn-sm btn-info">
                                <i class="fa fa-eye"></i> Details
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>