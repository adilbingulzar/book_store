<html
  class="loading semi-dark-layout"
  lang="en"
  data-layout="semi-dark-layout"
  data-textdirection="ltr"
  >
  <!-- BEGIN: Head-->
  @include('includes/header')
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body
    class="vertical-layout vertical-menu-modern navbar-floating footer-static"
    data-open="click"
    data-menu="vertical-menu-modern"
    data-col=""
    >
    <!-- BEGIN: Main Menu-->
    @include('includes/left_sidebar')
    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->

    <div class="app-content content pt-4">
      <div class="content-wrapper container-xxl p-0">
        @include('includes/top_nav')
        @yield('content')
      </div>
    </div>
    <!-- END: Content-->
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- BEGIN: Footer-->
    @include('includes/footer')
    <!-- END: Footer-->
  </body>
  <!-- END: Body-->
</html>