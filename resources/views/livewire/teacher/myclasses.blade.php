@section('title', 'All Classes')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    
<div>
    <div class="card">
        <div class="card-header">
            <i class="fa fa-tasks"></i> Your Classes
        </div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th><i class="fa fa-school"></i> Class</th>
                    <th><i class="fas fa-layer-group"></i> Section</th>
                    <th><i class="fa fa-book-open"></i> Subjects</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($years as $year)
                <tr>
                    <td>{{ $year->year->title }}</td>
                    <td>{{ $year->section->title }}</td>
                    <td>{{ $year->subject->title }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
