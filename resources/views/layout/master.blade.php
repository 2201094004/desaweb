<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    @include('includes.style')
  </head>
  <body>
    <div class="container-scroller">
      @include('komponen.setbar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        @include('komponen.navbar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
              @yield('content')
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
            @include('komponen.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    @include('includes.script')
  </body>
</html>