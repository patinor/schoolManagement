

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
                  <h4 class="card-title">Listes des correction des doc soumis </h4>
                  <p class="card-description">
              </p>
          <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                      <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Date-creation</th>
                    <th scope="col">Correction</th>
                    <th scope="col">Details</th>

                  </tr>
                      </thead>
                      <tbody>
                      @foreach($cours as $prof)
                  <tr>
                  <th scope="row">{{optional($prof->enseignant)->nom}} </th>
                  <td>{{$prof->updated_at}}</td>
                    <td><a href="{{Storage::url($prof->correction)}}" target="_blank">Voir<a/></td>
                    <td>
                    <a href="{{route('edite.Soumission.etudiant',['id'=>$prof->id])}}" class="btn btn-success"><i class="bi bi-eye"></i></a>

                    </td>
                  </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
        {{$cours->links()}}
                  </div>
                </div>
              </div>
            </div>


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
