<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracket/img/bracket-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracket">
    <meta property="og:title" content="Bracket">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">
    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">
    <title> @yield('title') | Web School</title>

    <!-- vendor css -->
  
    <link href="{{ asset('admin/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('path/to/sweetalert2.min.css') }}">

    <link href="{{ asset('admin/lib/jquery-switchbutton/jquery.switchButton.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/lib/highlightjs/github.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    


   

    <!-- Bracket CSS -->
    <!-- <link rel="stylesheet" href="../css/bracket.css"> -->
    <link rel="stylesheet" href="{{ asset('admin/css/bracket.css') }}">
    @livewireStyles
  </head>

  <body>
   @auth
        @if(Auth::user()->is_admin == 1)
          @include('Layouts.admin.headsection')
          @include('Layouts.admin.adminsidebar')
        @elseif(Auth::user()->is_teacher == 1)
          @include('Layouts.admin.headsection')
          @include('Layouts.teacher.sidebar')
        @elseif(Auth::user()->is_student == 1)
          @include('Layouts.admin.headsection')
          @include('Layouts.student.sidebar')
        @endif
    @else
        @include('Layouts.guest')
    @endauth
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        @auth
          @include('Layouts.breadcrumbs')
        @endauth
      </div><!-- br-pageheader -->
      {{ $slot }}
    </div>
    @livewireScripts
    <script src="{{ asset('admin/lib/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin/lib/popper.js/popper.js') }}"></script>
    <script src="{{ asset('admin/lib/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('admin/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
    <script src="{{ asset('admin/lib/moment/moment.js') }}"></script>
    <script src="{{ asset('admin/lib/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('admin/lib/jquery-switchbutton/jquery.switchButton.js') }}"></script>
    <script src="{{ asset('admin/lib/peity/jquery.peity.js') }}"></script>
    <script src="{{ asset('admin/lib/highlightjs/highlight.pack.js') }}"></script>

    <script src="{{ asset('admin/js/bracket.js') }}"></script>
    <script src="{{ asset('admin/js/ResizeSensor.js') }}"></script>
    <script src="{{ asset('admin/js/dashboard.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('path/to/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('admin/js/sweetalerts.js') }}"></script>
  <script>
      window.addEventListener('swal:modal', event => { 
          swal({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
          });
      });
      window.addEventListener('swal:confirmperm', event => { 
          swal({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              window.livewire.emit('deletepermissions');
            }
          });
      });
      window.addEventListener('swal:confirmclass', event => { 
          swal({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              window.livewire.emit('deleteclass');
            }
          });
      });
      window.addEventListener('swal:confirm', event => { 
          swal({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              window.livewire.emit('deleteyears');
            }
          });
      });
      window.addEventListener('swal:confirmcategory', event => { 
          swal({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              window.livewire.emit('deletecategory');
            }
          });
      });
      window.addEventListener('swal:confirmsubject', event => { 
          swal({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              window.livewire.emit('deletesubject');
            }
          });
      });
      window.addEventListener('swal:confirmstaff', event => { 
          swal({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              window.livewire.emit('deletestaff');
            }
          });
      });
      window.addEventListener('swal:confirmrole', event => { 
          swal({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              window.livewire.emit('deleteroles');
            }
          });
      });
      window.addEventListener('swal:confirmteacher', event => { 
          swal({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              window.livewire.emit('deleteteachers');
            }
          });
      });
      window.addEventListener('swal:confirmstudent', event => { 
          swal({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              window.livewire.emit('deletestudents');
            }
          });
      });
        window.addEventListener('swal:confirmtime', event => { 
          swal({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              window.livewire.emit('deletetimeslot');
            }
          });
      });
      window.addEventListener('swal:confirmday', event => { 
          swal({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              window.livewire.emit('deleteday');
            }
          });
      });
          window.addEventListener('swal:confirmuser', event => { 
          swal({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              window.livewire.emit('deleteuser');
            }
          });
      });
      window.addEventListener('swal:confirmsection', event => { 
          swal({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              window.livewire.emit('deletesection');
            }
          });
      });
      window.addEventListener('swal:confirmschool', event => { 
          swal({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              window.livewire.emit('deleteschool');
            }
          });
      });
      
      window.addEventListener('swal:confirmbranch', event => { 
          swal({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              window.livewire.emit('deletebranch');
            }
          });
      });
      window.addEventListener('swal:confirmcomplain', event => { 
          swal({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              window.livewire.emit('deletecomplain');
            }
          });
      });
      window.addEventListener('swal:confirmquiz', event => { 
          swal({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              window.livewire.emit('deletequiz');
            }
          });
      });
      window.addEventListener('swal:confirmassignment', event => { 
          swal({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              window.livewire.emit('deleteassignment');
            }
          });
      });
      window.addEventListener('swal:confirmquestion', event => { 
          swal({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              window.livewire.emit('deletequestion');
            }
          });
      });
      window.addEventListener('swal:confirmassignments', event => { 
          swal({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              window.livewire.emit('deleteassignments');
            }
          });
      });
     
      </script>
  </body>
</html>
