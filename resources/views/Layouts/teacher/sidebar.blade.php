    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href=""><span>[</span>bracket<span>]</span></a></div>
    <div class="br-sideleft overflow-y-auto">
      <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
      <div class="br-sideleft-menu">
        <a href="{{ route('teacher.dashboard') }}" class="br-menu-link">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a>
        <!-- br-menu-link -->
        <a href="{{ route('teacher.myclasses') }}" class="br-menu-link">
          <div class="br-menu-item">
              <i class="fa fa-list"></i>
            <span class="menu-item-label">Classes</span>
          </div><!-- menu-item -->
      </a>
      <!-- br-menu-link -->
        <a href="{{ route('teacher.timetable') }}" class="br-menu-link">
          <div class="br-menu-item">
              <i class="fa fa-table"></i>
            <span class="menu-item-label">My Timetable</span>
          </div><!-- menu-item -->
      </a>
      <a href="#" class="br-menu-link ">
      <div class="br-menu-item">
        <i class="fa fa-users"></i>
        <span class="menu-item-label">Attendance</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    <ul class="br-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{ route('teacher.attendance') }}" class="nav-link active">Mark Your Attendance</a></li>
      <li class="nav-item"><a href="{{ route('teacher.record') }}" class="nav-link">Attendance Record</a></li>
    </ul>
        <!-- br-menu-link -->
         <a href="{{route('teacher.activities')}}" class="br-menu-link">
          <div class="br-menu-item">
            <i class="menu-item-icon fa fa-random tx-20"></i>

            <span class="menu-item-label">Activities</span>
          </div><!-- menu-item -->
        </a>
       
        <!-- br-menu-link --> 
       
        <a href="#" class="br-menu-link">
          <div class="br-menu-item">
            <i class="fa fa-file"></i>
            <span class="menu-item-label">Assignments</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>   
          </div>
          <!-- menu-item -->
        </a>
        <!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ route('teacher.assignments')}}" class="nav-link active">Create Assignment</a></li>
          <li class="nav-item"><a href="{{ route('teacher.allassignments')}}" class="nav-link">All Assignments</a></li>
        </ul>
       
        <a href="#" class="br-menu-link">
          <div class="br-menu-item">
            <i class="fa fa-question fa-lg"></i>
            <span class="menu-item-label">Quiz</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>   
          </div>
          <!-- menu-item -->
        </a>
        <!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ route('teacher.quiz')}}" class="nav-link active">Create Quiz</a></li>
          <li class="nav-item"><a href="{{ route('teacher.allquiz')}}" class="nav-link">All Quizzes</a></li>
        </ul>
        <!-- br-menu-link -->
       
        <a href="#" class="br-menu-link">
          <div class="br-menu-item">
            <i class="fa fa-gear"></i>
            <span class="menu-item-label">Settings</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>   
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ route('teacher.profile')}}" class="nav-link active">Profile </a></li>
          <li class="nav-item"><a href="{{ route('change.password')}}" class="nav-link">Change Password</a></li>
        </ul>
        <a href="{{ route('logout') }}" class="br-menu-link">
          <div class="br-menu-item">
            <i class="fa fa-sign-out" style="font-size:21px"></i>    
    
            <span class="menu-item-label">Logout</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link ------------------------------------------------------------------------------------------------->
       
      </div><!-- br-sideleft-menu -->
      <br>
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->