


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
                  <h4 class="card-title">Listes des cours</h4>
                  <p class="card-description">
                  </p>
                 <p>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    +Ajouter-un-cours
                  </button>
                 </p>

                  <div class="table-responsive">
                 <p>
                  <form action="{{route('Search.cours.details')}}" method="POST">
                    @csrf
                    <input placeholder="recherche ..." type="text" name="search" required >
                    <button>Valider</button>
                </form>
                 </p>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                           Titre
                          </th>
                          <th>
                         Image
                          </th>
                          <th>
                           Date de creation
                          </th>
                          <th>
                           Date de mise à jour
                          </th>
                          <th>
                            Details
                          </th>
                         
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($coursAll as $cours)
                        <tr>
                          <td class="py-1">
                           {{ $cours->titre}}
                          </td>
                          <td>
                          <img src="{{asset('storage/'.$cours->image)}}">
                          </td>
                          <td>
                            {{ $cours->created_at}}
                          </td>
                          <td>
                          {{ $cours->updated_at}}
                          </td>

                          <td>
                           <a href="{{route('details.cours.prof',['id'=>$cours->id])}}" class="btn btn-success"><i class="bi bi-eye"></i></a>
                          </td>
                         

                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {{$coursAll->links()}}
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
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Ajouter un cours</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('addCours.Prof')}}" method="POST" enctype="multipart/form-data">
        @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Titre</label>
    <input type="text" class="form-control" required id="exampleInputEmail1"  name="titre">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Image</label>
    <input type="file" class="form-control"  id="exampleInputEmail1" name="image">
  </div>
  <input type="hidden" name="id" value="{{ $user[0]->id}}">
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
