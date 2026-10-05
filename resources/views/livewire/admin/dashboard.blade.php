<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@section('title', 'Dashboard') </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .dashboard-card {
            display: flex;
            align-items: center;
            padding: 15px;
            color: white;
            border-radius: 8px;
            margin-bottom: 15px;
            transition: box-shadow 0.3s, background-color 0.3s;
        }
        .dashboard-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .bg-primary:hover {
            background-color: #0056b3 !important;
        }
        .bg-success:hover {
            background-color: #218838 !important;
        }
        .bg-warning:hover {
            background-color: #e0a800 !important;
        }
        .bg-danger:hover {
            background-color: #c82333 !important;
        }
        .bg-info:hover {
            background-color: #117a8b !important;
        }
        .bg-purple:hover {
            background-color: #6f42c1 !important;
        }
        .bg-orange:hover {
            background-color: #fd7e14 !important;
        }
        .bg-teal:hover {
            background-color: #20c997 !important;
        }
        .icon-circle {
            width: 50px;
            height: 50px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 15px;
            font-size: 24px;
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }
        .dashboard-card h5 {
            margin: 0;
            font-size: 18px;
        }
        .dashboard-card p {
            margin: 0;
            font-size: 14px;
        }
        .chart-container {
            background: #f9f9f9;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .round-chart-container {
            display: flex;
            justify-content: center;
        }
        .progress-text {
            position: absolute;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <!-- First Row -->
            <div class="col-md-4">
                <div class="dashboard-card bg-primary">
                    <div class="icon-circle">
                        <i class="fas fa-school"></i>
                    </div>
                    <div>
                        <h5>Classes</h5>
                        <p>Total: {{ $totalYear }}</p>
                    </div>
                </div>
                <div class="dashboard-card bg-success mt-1">
                    <div class="icon-circle">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <div>
                        <h5>Sections</h5>
                        <p>Total:{{ $totalSection }}</p>
                    </div>
                </div>
                <div class="dashboard-card bg-info mt-1">
                    <div class="icon-circle">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div>
                        <h5>Attendance</h5>
                        <p>Total: 95%</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <canvas id="barChart"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="dashboard-card bg-warning">
                    <div class="icon-circle">
                        <i class="fas fa-book"></i>
                    </div>
                    <div>
                        <h5>Subjects</h5>
                        <p>Total: {{ $totalSubject }}</p>
                    </div>
                </div>
            </div>
            <!-- Second Row -->
            <div class="col-md-4">
                <div class="dashboard-card bg-danger">
                    <div class="icon-circle">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <div>
                        <h5>Trainers</h5>
                        <p>Total: {{ $totalTeachers }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard-card bg-teal">
                    <div class="icon-circle">
                        <i class="fas fa-users"></i>
                    </div>
                    <div>
                        <h5>Staff</h5>
                        <p>Total: {{ $totalStaff }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard-card bg-primary">
                    <div class="icon-circle">
                        <i class="fas fa-user-tag"></i>
                    </div>
                    <div>
                        <h5>Roles</h5>
                        <p>Total: {{ $roles }}</p>
                    </div>
                </div>
            </div>
            <!-- Third Row -->
            <div class="col-md-4">
                <div class="dashboard-card bg-teal">
                    <div class="icon-circle">
                        <i class="fas fa-question-circle"></i>
                    </div>
                    <div>
                        <h5>Quizzes</h5>
                        <p>Total: {{ $quizes }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard-card bg-primary">
                    <div class="icon-circle">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <div>
                        <h5>Assignments</h5>
                        <p>Total: {{ $assignment }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard-card bg-success">
                    <div class="icon-circle">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div>
                        <h5>Complaints</h5>
                        <p>Total: {{ $complain }}</p>
                    </div>
                </div>
            </div>
            <!-- Fourth Row -->
            <div class="col-md-4">
                <div class="dashboard-card bg-warning">
                    <div class="icon-circle">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div>
                        <h5>Students</h5>
                        <p>Total: {{ $totalStudents }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard-card bg-danger">
                    <div class="icon-circle">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div>
                        <h5>Enrollments</h5>
                        <p>Total: {{ $enrollment }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Round Chart -->
            <div class="col-md-6 round-chart-container chart-container">
                <canvas id="roundChart"></canvas>
                <div id="progressText" class="progress-text"></div>
            </div>
            <!-- Line Chart -->
            <div class="col-md-6 chart-container">
                <canvas id="lineChart"></canvas>
            </div>
            <!-- Bar Chart -->
        </div>
    </div>

    <script>
        // Doughnut Chart
        var roundCtx = document.getElementById('roundChart').getContext('2d');
        var roundChart = new Chart(roundCtx, {
            type: 'doughnut',
            data: {
                labels: ['Classes', 'Sections', 'Subjects', 'Trainers', 'Staff', 'Roles'],
                datasets: [{
                    data: [{{ $totalYear }}, {{ $totalSection }}, {{ $totalSubject }}, {{ $totalTeachers }}, {{ $totalStaff }}, {{ $roles }}],
                    backgroundColor: ['#ff6384', '#36a2eb', '#cc65fe', '#ffce56', '#4bc0c0', '#f9a825'],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true,
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                },
                elements: {
                    center: {
                        text: 'Progress',
                        color: '#36a2eb',
                        fontStyle: 'Arial',
                        sidePadding: 20
                    }
                }
            }
        });

        // Line Chart
        var lineCtx = document.getElementById('lineChart').getContext('2d');
        var lineChart = new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Teachers',
                    data: [65, 59, 80, 81, 56, 55, 40],
                    borderColor: '#ff6384',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    fill: true,
                    tension: 0.1,
                    borderWidth: 2
                }, {
                    label: 'Sections',
                    data: [28, 48, 40, 19, 86, 27, 90],
                    borderColor: '#36a2eb',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    fill: true,
                    tension: 0.1,
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true,
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.dataset.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });

        // Bar Chart
        var barCtx = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['Classes', 'Sections', 'Subjects', 'Trainers', 'Staff', 'Roles'],
                datasets: [{
                    label: 'Count',
                    data: [{{ $totalYear }}, {{ $totalSection }}, {{ $totalSubject }}, {{ $totalTeachers }}, {{ $totalStaff }}, {{ $roles }}],
                    backgroundColor: ['#ff6384', '#36a2eb', '#cc65fe', '#ffce56', '#4bc0c0', '#f9a825'],
                    borderColor: '#fff',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true,
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
