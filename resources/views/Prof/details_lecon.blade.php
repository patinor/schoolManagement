


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
                  <h4 class="card-title">Details leçons</h4>
                  <p class="card-description">
                  </p>
                   <p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        +Modifier-la-leçon
                      </button>
                   </p>
                  <div class="table-responsive">
                  <p>
                   
                  </p>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                           Titre
                          </th>
                          <th>
                        Cours
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
                            {{ $cours->cours->titre}}
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
        <h4 class="modal-title fs-5 " id="staticBackdropLabel">Modification une leçon</h1>
        <button type="button" class="btn-close alert alert-btn" data-bs-dismiss="modal" aria-label="Close">Fermer</button>
      </div>
      <div class="modal-body">
      <form action="{{route('updateLecon.enseignant')}}" method="POST" enctype="multipart/form-data">
        @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Titre</label>
    <input type="text" class="form-control" value="{{$cours->titre}}" required id="exampleInputEmail1"  name="titre">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Url-vidéo</label>
    <input type="text" class="form-control" value="{{$cours->video}}"  id="exampleInputEmail1" name="video">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Cours</label>
     <select name="cours_id" id="" class="form-select">
        @foreach($coursLecon as $cours)
        <option value="{{$cours->id}}">{{$cours->titre}}</option>
        @endforeach
     </select>
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
