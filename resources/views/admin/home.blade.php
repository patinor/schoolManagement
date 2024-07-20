<!DOCTYPE html>
<html lang="en">


@include('templates.head_admin')
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('templates.navBar_admin')

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      @include('templates.sidebar_admin')

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12 mb-4 mb-xl-0">
              <h4 class="font-weight-bold text-dark">Hi, Bienvenue {{Auth::user()->name}} </h4>
              <p class="font-weight-normal mb-2 text-muted"></p>
            </div>
          </div>
          <div class="row mt-3">


          </div>
          
         
        </div>
        <!-- content-wrapper ends -->
      
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  @include('templates.js_admin')
</body>

</html>

