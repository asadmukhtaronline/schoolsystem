    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href=""><span>[</span>bracket<span>]</span></a></div>
    <div class="br-sideleft overflow-y-auto">
      <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
      <div class="br-sideleft-menu">
        <a href="{{ route('student.dashboard') }}" class="br-menu-link">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a>
        <!-- br-menu-link -->
        <a href="{{ route('student.myclass') }}" class="br-menu-link">

          <div class="br-menu-item">
              <i class="fa fa-list"></i>
            <span class="menu-item-label">Classes</span>
          </div><!-- menu-item -->
      </a>
       <!-- br-menu-link -->
        <a href="{{ route('student.timetable') }}" class="br-menu-link">

          <div class="br-menu-item">
              <i class="fa fa-table"></i>
            <span class="menu-item-label">My Timetable</span>
          </div><!-- menu-item -->
      </a>
      <a href="{{ route('student.assignments') }}" class="br-menu-link">

        <div class="br-menu-item">
 
          <i class="menu-item-icon fa fa-tasks tx-20"></i>

          <span class="menu-item-label">Assignments</span>
        </div><!-- menu-item -->
      </a>
      <!-- br-menu-link -->
      <a href="{{ route('student.quiz') }}" class="br-menu-link">

        <div class="br-menu-item">
          <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
          <span class="menu-item-label">Quiz</span>
        </div><!-- menu-item -->
      </a>
        <!-- br-menu-link -->
      
        <!-- br-menu-link -->
        <a href="{{ route('student.activities') }}" class="br-menu-link">

          <div class="br-menu-item">
            <i class="menu-item-icon fa fa-random tx-20"></i>

            <span class="menu-item-label">Activities</span>
          </div><!-- menu-item -->
        </a>
       
        <a href="{{ route('student.accounts') }}" class="br-menu-link">

            <div class="br-menu-item">
              <i class="menu-item-icon 	fa fa-id-card-o tx-20"></i>
  
              <span class="menu-item-label">Accounts</span>
            </div><!-- menu-item -->
          </a>
        <!-- br-menu-link -->
        <a href="{{ route('student.settings') }}" class="br-menu-link">

          <div class="br-menu-item">
            <i class="menu-item-icon fa fa-cogs tx-20"></i>
            <span class="menu-item-label">Settings</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <!-- br-menu-link -->
        <a href="{{ route('student.complain') }}" class="br-menu-link">

          <div class="br-menu-item">
              <i class="fa fa-close"></i>
            <span class="menu-item-label">Complain</span>
          </div><!-- menu-item -->
      </a>
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