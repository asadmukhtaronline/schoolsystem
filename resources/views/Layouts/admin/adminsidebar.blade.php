   <!-- ########## START: LEFT PANEL ########## -->
<div class="br-logo"><a href=""><span>[</span>Webeducatorz<span>]</span></a></div>
<div class="br-sideleft overflow-y-auto">
  <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
  <div class="br-sideleft-menu">
    
    @if(hasPermission("admin/dashboard"))
    <a href="{{ route('admin.dashboard') }}" class="br-menu-link">
      <div class="br-menu-item">
        <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
        <span class="menu-item-label">Dashboard</span>
      </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    @endif
    @if(Auth::user()->branch->type == 1)
    @if(hasPermission("admin/branches"))
    <a href="#" class="br-menu-link ">
      <div class="br-menu-item">
        <i class="fa fa-plus-circle tx-20"></i>
        <span class="menu-item-label">Branches</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    <ul class="br-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{ route('admin.createbranch') }}" class="nav-link active">Create New Branch</a></li>
      <li class="nav-item"><a href="{{ route('admin.allbranch') }}" class="nav-link">All Branches</a></li>
    </ul>
    @endif
    @endif
    @if(hasPermission("admin/classes"))
    <a href="#" class="br-menu-link ">
      <div class="br-menu-item">
        <i class="fa fa-list"></i>
        <span class="menu-item-label">Classes</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    <ul class="br-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{ route('admin.year') }}" class="nav-link active">Create Class</a></li>
      <li class="nav-item"><a href="{{ route('admin.allclass') }}" class="nav-link">All Classes</a></li>
    </ul>
    @endif

    @if(hasPermission("admin/subjects"))
    <a href="#" class="br-menu-link">
      <div class="br-menu-item">
        <i class="fa fa-book"></i>
        <span class="menu-item-label">Subjects</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    <ul class="br-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{ route('admin.book') }}" class="nav-link">Create a Subject</a></li>
    </ul>
    @endif

    @if(hasPermission("admin/attendance"))
    <a href="#" class="br-menu-link ">
      <div class="br-menu-item">
        <i class="fa fa-users"></i>
        <span class="menu-item-label">Attendance</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    <ul class="br-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{ route('admin.attendance') }}" class="nav-link active">Mark Your Attendance</a></li>
      <li class="nav-item"><a href="{{ route('attendance.record') }}" class="nav-link">Attendance Record</a></li>
    </ul>
    @endif

    @if(hasPermission("admin/assignments"))
    <a href="#" class="br-menu-link ">
      <div class="br-menu-item">
        <i class="fa fa-gear"></i>
        <span class="menu-item-label">Assignments</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    <ul class="br-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{ route('admin.createassignment') }}" class="nav-link active">Create Assignment</a></li>
      <li class="nav-item"><a href="{{ route('admin.assignment') }}" class="nav-link">All Assignment</a></li>
    </ul>
    @endif
    @if(hasPermission("admin/quiz"))
    <a href="#" class="br-menu-link ">
      <div class="br-menu-item">
        <i class="fa fa-users"></i>
        <span class="menu-item-label">Quiz</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    <ul class="br-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{ route('admin.createquiz') }}" class="nav-link active">Create Quiz</a></li>
      <li class="nav-item"><a href="{{ route('admin.quizz') }}" class="nav-link">Quiz Category</a></li>
      <li class="nav-item"><a href="{{ route('admin.fetch') }}" class="nav-link">All Quizzes</a></li>
    </ul>
    @endif

    @if(hasPermission("admin/teachers"))
    <a href="#" class="br-menu-link">
      <div class="br-menu-item">
        <i class="fa fa-graduation-cap"></i>
        <span class="menu-item-label">Teachers</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    <ul class="br-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{ route('admin.addteacher') }}" class="nav-link active">Create Teacher</a></li>
      <li class="nav-item"><a href="{{ route('admin.allteachers') }}" class="nav-link">All Teachers</a></li>
    </ul>
    @endif

    @if(hasPermission("admin/staff"))
    <a href="#" class="br-menu-link">
      <div class="br-menu-item">
        <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
        <span class="menu-item-label">Staff</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    <ul class="br-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{ route('admin.create-staff') }}" class="nav-link active">Create Staff</a></li>
      <li class="nav-item"><a href="{{ route('admin.all-staff') }}" class="nav-link">All Staff</a></li>
      <li class="nav-item"><a href="{{ route('admin.staffcategory') }}" class="nav-link">Designation</a></li>
    </ul>
    @endif

    @if(hasPermission("admin/students"))
    <a href="#" class="br-menu-link ">
      <div class="br-menu-item">
        <i class="fa fa-users"></i>
        <span class="menu-item-label">Students</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    <ul class="br-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{ route('admin.admissionform') }}" class="nav-link active">New Students</a></li>
      <li class="nav-item"><a href="{{ route('admin.allstudents') }}" class="nav-link">All Students</a></li>
    </ul>
    @endif

    @if(hasPermission("admin/students"))
    <a href="{{ route('admin.admissionform') }}" class="br-menu-link">
      <div class="br-menu-item">
        <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
        <span class="menu-item-label">New Admissions</span>
      </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    @endif

    @if(hasPermission("admin/accounts"))
    <a href="#" class="br-menu-link">
      <div class="br-menu-item">
        <i class="menu-item-icon ion-ios-redo-outline tx-24"></i>
        <span class="menu-item-label">Accounts</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    <ul class="br-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{ route('admin.overview') }}" class="nav-link">Overview</a></li>
      <li class="nav-item"><a href="{{ route('admin.feecollection') }}" class="nav-link">Fee Collection</a></li>
      <li class="nav-item"><a href="{{ route('admin.history') }}" class="nav-link">History</a></li>
      <li class="nav-item"><a href="{{ route('admin.expence') }}" class="nav-link">Expense Track</a></li>
    </ul>
    @endif

    @if(hasPermission("admin/timetable"))
    <a href="{{ route('admin.timetable') }}" class="br-menu-link">
      <div class="br-menu-item">
        <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
        <span class="menu-item-label">TimeTable</span>
      </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    @endif

    @if(hasPermission("admin/profile"))
    <a href="#" class="br-menu-link">
      <div class="br-menu-item">
        <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
        <span class="menu-item-label">Settings</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    <ul class="br-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{ route('admin.profilesettings') }}" class="nav-link">Profile Settings</a></li>
      <li class="nav-item"><a href="{{ route('admin.changepassword') }}" class="nav-link">Change Password</a></li>
    </ul>
    @endif

    @if(hasPermission("admin/complain"))
    <a href="#" class="br-menu-link">
      <div class="br-menu-item">
        <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
        <span class="menu-item-label">Complaines</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    <ul class="br-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{ route('admin.createcomplain') }}" class="nav-link active">Create new Complain</a></li>
      <li class="nav-item"><a href="{{ route('admin.allcomplaines') }}" class="nav-link">All Complains</a></li>
      <li class="nav-item"><a href="{{ route('admin.complaincategory') }}" class="nav-link">Complain Category</a></li>
    </ul>
    @endif

    @if(hasPermission("admin/users"))
    <a href="#" class="br-menu-link">
      <div class="br-menu-item">
        <i class="menu-item-icon icon ion-ios-briefcase-outline tx-22"></i>
        <span class="menu-item-label">User Management</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    <ul class="br-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{ route('admin.createuser') }}" class="nav-link active">Create New User</a></li>
      <li class="nav-item"><a href="{{ route('admin.allusers') }}" class="nav-link">All Users</a></li>
      <li class="nav-item"><a href="{{ route('admin.roles') }}" class="nav-link">Roles</a></li>
      <li class="nav-item"><a href="{{ route('admin.permissions') }}" class="nav-link">Permissions</a></li>
    </ul>
    @endif

    @if(hasPermission("admin/school"))
    <a href="#" class="br-menu-link ">
      <div class="br-menu-item">
        <i class="fa fa-gear"></i>
        <span class="menu-item-label">General Setting</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    <ul class="br-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{ route('admin.addschool') }}" class="nav-link active">Add School</a></li>
      <li class="nav-item"><a href="{{ route('admin.allschool') }}" class="nav-link">All School</a></li>
      <li class="nav-item"><a href="{{ route('admin.reset') }}" class="nav-link">Reset Complete Setup</a></li>
    </ul>
    @endif
    
    <a href="{{ route('logout') }}" class="br-menu-link">
      <div class="br-menu-item">
        <i class="fa fa-power-off"></i>
        <span class="menu-item-label">Logout</span>
      </div><!-- menu-item -->
    </a><!-- br-menu-link -->

  </div><!-- br-sideleft-menu -->
  <br>
</div>
