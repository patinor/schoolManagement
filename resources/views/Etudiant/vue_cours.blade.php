

<!DOCTYPE html>
<html lang="en">

@include('templates.head_admin')


<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    @include('templates.navbar_etudiant')



    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

    @include('templates.sidebar_etudiant')
    <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Cours vidéo</h4>
                  <p class="card-description">

                  </p>
          <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                      <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Date-creation</th>
                    <th scope="col">Consulter</th>
                  </tr>
                      </thead>
                      <tbody>

                  <tr>
                    <th scope="row">{{$cours->titre}} </th>
                    <td>{{$cours->created_at}}</td>
                    <td>
                    <video width="320" height="240" controls>
                <source src="{{asset('storage/'.$cours->cours)}}" type="video/mp4">
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
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">

      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  @include('templates.js_admin')

</body>

</html>
