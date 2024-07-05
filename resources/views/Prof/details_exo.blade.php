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
                  <h4 class="card-title">Details Exercices</h4>
                  <p class="card-description">
                  </p>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  +Modifier-un-exercice
</button>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                           Titre
                          </th>
                          <th>
                          PDF
                          </th>
                          <th>
                           Date de creation
                          </th>
                          <th>
                           Date de mise à jour
                          </th>

                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="py-1">
                           {{ $cours->titre}}
                          </td>
                          <td>
                          <a href="{{Storage::url( $cours->cours_pdf)}}">Voir</a>
                          </td>
                          <td>
                            {{ $cours->created_at}}
                          </td>
                          <td>
                          {{ $cours->updated_at}}
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


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Ajouter une spécialité</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('exercices_pdf.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Titre</label>
    <input type="text" class="form-control" required id="exampleInputEmail1" value="{{ $cours->titre}}" name="titre">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Exercices</label>
    <input type="file" class="form-control"  id="exampleInputEmail1" name="cours_pdf">
  </div>
  <input type="hidden" name="id" value="{{ $cours->id}}">
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
      </div>

    </div>
  </div>
</div>

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
