
<!DOCTYPE html>
<html lang="en">

@include('templates.head_admin')


<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    @include('templates.navbar_prof')



    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

    @include('templates.sidebar_prof')
    <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Apperçu du cours</h4>
                  <p class="card-description">
                  </p>

                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                      <tr>
                    <th >Titre</th>
                    <th >Cours</th>


                  </tr>
                      </thead>
                      <tbody>
                      <tr>
                    <th scope="row">{{$cours->titre}} </th>
                    <td>
                    <video width="320" height="240" controls>
                            <source src="{{asset('storage/'.$cours->titre)}}" type="video/mp4">
                            Your browser does not support the video tag.
                            </video>
                    </td>

                  </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

<!-- Button trigger modal -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color: red;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <div class="form-group first">




          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        
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



