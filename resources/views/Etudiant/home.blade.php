

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
                  <h4 class="card-title">Listes des Cours disponoble</h4>
                  <p class="card-description">
                  </p>
          <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                      <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Date-creation</th>
                    <th scope="col">Consulter</th>
                    <th scope="col">Viédo</th>

                  </tr>
                      </thead>
                      <tbody>
                      @foreach($exercices as $prof)
                  <tr>
                    <th scope="row">{{$prof->specialite}} </th>
                    <td>{{$prof->created_at}}</td>
                    <td><a href="{{route('listes.Exercices.cours',['id'=>$prof->id])}}" class="btn btn-info"><i class="bi bi-eye"></i></a></td>
                    <td><a href="{{route('listes.Video',['id'=>$prof->id])}}" class="btn btn-primary"><i class="bi bi-camera-reels"></i></a></td>

                  </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
        {{$exercices->links()}}
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


<!-- Modal -->

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
