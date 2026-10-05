@section('title','Dashboard')

<style>
    .dashboard-card {
        display: flex;
        align-items: center;
        padding: 20px;
        border-radius: 5px;
        color: #fff;
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }
    .dashboard-card:hover {
        transform: translateY(-1px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.50);
    }
    .dashboard-card i {
        font-size: 40px;
        margin-right: 15px;
        opacity: 0.9;
    }
    .dashboard-card h5 {
        margin: 0;
        font-size: 16px;
        font-weight: 500;
    }
    .dashboard-card h2 {
        margin: 0;
        font-size: 28px;
        font-weight: bold;
    }

    /* Gradient backgrounds */
    .bg-success-gradient { background: linear-gradient(135deg, #28a745, #218838); }
    .bg-warning-gradient { background: linear-gradient(135deg, #ffc107, #e0a800); }
    .bg-info-gradient { background: linear-gradient(135deg, #17a2b8, #117a8b); }
    .bg-primary-gradient { background: linear-gradient(135deg, #007bff, #0056b3); }
    .bg-danger-gradient { background: linear-gradient(135deg, #dc3545, #b21f2d); }
    .bg-purple-gradient { background: linear-gradient(135deg, #6f42c1, #4e2a91); }
    .bg-dark-gradient { background: linear-gradient(135deg, #343a40, #1d2124); }
</style>

<div class="br-mainpanel mt-0 w-100 mx-auto">
    <div class="container-fluid mt-4">
        <div class="row g-4">

            <!-- Next Class -->
            <div class="col-md-6 col-xl-3">
                <div class="dashboard-card bg-primary-gradient shadow">
                    <i class="fa fa-calendar"></i>
                    <div>
                        <h5>Next Class</h5>
                        <h2>10:00 AM</h2>
                    </div>
                </div>
            </div>

            <!-- Assignments Pending -->
            <div class="col-md-6 col-xl-3">
                <div class="dashboard-card bg-danger-gradient shadow">
                    <i class="fa fa-tasks"></i>
                    <div>
                        <h5>Pending Assignments</h5>
                        <h2>6</h2>
                    </div>
                </div>
            </div>

            <!-- Upcoming Quiz -->
            <div class="col-md-6 col-xl-3">
                <div class="dashboard-card bg-warning-gradient shadow">
                    <i class="fa fa-question-circle"></i>
                    <div>
                        <h5>Upcoming Quiz</h5>
                        <h2>1</h2>
                    </div>
                </div>
            </div>

            <!-- Average Attendance -->
            <div class="col-md-6 col-xl-3">
                <div class="dashboard-card bg-success-gradient shadow">
                    <i class="fa fa-check-circle"></i>
                    <div>
                        <h5>Avg Attendance</h5>
                        <h2>92%</h2>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="mt-2">
      @livewire('teacher.assignment.allassignment')
    </div>
    <div class="mt-1">
      @livewire('teacher.quiz.allquiz')
    </div>
    <div class="mt-1">
      @livewire('teacher.timetable')
    </div>
</div>
