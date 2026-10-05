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
    <div class="container-fluid mt-5">
        <div class="row g-4 mt-2">

            <!-- Attendance -->
            <div class="col-md-3">
                <div class="dashboard-card bg-success-gradient shadow-sm">
                    <i class="fa fa-check-circle"></i>
                    <div>
                        <h5>Attendance</h5>
                        <h2>92%</h2>
                        <p class="mb-0">This Month</p>
                    </div>
                </div>
            </div>

            <!-- Assignments -->
            <div class="col-md-3">
                <div class="dashboard-card bg-warning-gradient shadow-sm">
                    <i class="fa fa-tasks"></i>
                    <div>
                        <h5>Assignments Due</h5>
                        <h2>3</h2>
                        <p class="mb-0">Due this week</p>
                    </div>
                </div>
            </div>

            <!-- Exams -->
            <div class="col-md-3">
                <div class="dashboard-card bg-info-gradient shadow-sm">
                    <i class="fa fa-pencil-square-o"></i>
                    <div>
                        <h5>Upcoming Exams</h5>
                        <h2>2</h2>
                        <p class="mb-0">Next: 18 Aug</p>
                    </div>
                </div>
            </div>

            <!-- Subjects -->
            <div class="col-md-3">
                <div class="dashboard-card bg-primary-gradient shadow-sm">
                    <i class="fa fa-book"></i>
                    <div>
                        <h5>Subjects</h5>
                        <h2>6</h2>
                        <p class="mb-0">Enrolled</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">

            <!-- Quizzes -->
            <div class="col-md-3">
                <div class="dashboard-card bg-purple-gradient shadow-sm">
                    <i class="fa fa-question-circle"></i>
                    <div>
                        <h5>Quizzes</h5>
                        <h2>5</h2>
                        <p class="mb-0">Available</p>
                    </div>
                </div>
            </div>

            <!-- Accounts -->
            <div class="col-md-3">
                <div class="dashboard-card bg-dark-gradient shadow-sm">
                    <i class="fa fa-money"></i>
                    <div>
                        <h5>Paid Fee</h5>
                        <h2>$1,200</h2>
                        <p class="mb-0">Pending: $300</p>
                    </div>
                </div>
            </div>

            <!-- Complaints -->
            <div class="col-md-3">
                <div class="dashboard-card bg-danger-gradient shadow-sm">
                    <i class="fa fa-exclamation-triangle"></i>
                    <div>
                        <h5>Complaints</h5>
                        <h2>2</h2>
                        <p class="mb-0">1 Active, 1 Closed</p>
                    </div>
                </div>
            </div>

            <!-- My Enrollments -->
            <div class="col-md-3">
                <div class="dashboard-card bg-success-gradient shadow-sm">
                    <i class="fa fa-graduation-cap"></i>
                    <div>
                        <h5>My Enrollments</h5>
                        <h2>4</h2>
                        <p class="mb-0">Ongoing</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="mt-2">
          @livewire('student.accounts')
        </div>
        <div class="mt-2">
          @livewire('student.assignments')
        </div>
        <div class="mt-2">
          @livewire('student.quiz')
        </div>
        <div class="mt-2">
          @livewire('student.timetable')
        </div>
    </div>
</div>
