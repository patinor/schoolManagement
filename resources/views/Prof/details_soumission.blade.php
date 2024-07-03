

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
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  +Envoyer une correction
</button>

              </p>
          <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                      <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Date-creation</th>
                    <th scope="col">Correction</th>

                  </tr>
                      </thead>
                      <tbody>
                  <tr>
                  <th scope="row">{{optional($cours->etudiant)->nom}} </th>
                  <td>{{$cours->updated_at}}</td>
                    <td><a   href="{{asset('storage/'.$cours->correction)}}" target="_blank" ></td>

                  </tr>
                </tbody>
              </table>
        </div>
                  </div>
                </div>
              </div>
            </div>


                <div class="form-group first">


<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Envoyer une correction</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('update.Cour.Soumission')}}" method="POST" enctype="multipart/form-data">
        @csrf

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Exercices</label>
    <input type="file" class="form-control" id="exampleInputEmail1" name="correction" required>
  </div>
  <input type="hidden" name="id" value="{{$cours->id}}">
  <button type="submit" class="btn btn-primary">Submit</button>
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>

</form>
      </div>
      <
    </div>
  </div>
</div>

          </div>

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
