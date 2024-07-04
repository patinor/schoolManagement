

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
                  <h4 class="card-title">Listes des Cours-vidéos de {{$specialite->specialite}} </h4>
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
                      @foreach($coursAll as $prof)
                  <tr>
                    <th scope="row">{{$prof->titre}} </th>
                    <td>{{$prof->created_at}}</td>
                    <td><a href="{{route('cours.etudiant.vue',['id'=>$prof->id])}}" class="btn btn-info"><i class="bi bi-eye"></i></a></td>
                  </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
        {{$coursAll->links()}}
                  </div>
                </div>
              </div>
            </div>

<!-- Button trigger modal -->          <div class="form-group first">



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
