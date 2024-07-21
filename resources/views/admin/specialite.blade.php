<!DOCTYPE html>
<html lang="en">

@include('templates.head_admin')


<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    @include('templates.navBar_admin')



    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

    @include('templates.sidebar_admin')
    <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Liste des Spécialités</h4>
                  <p class="card-description">
                  </p>
                   <p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                      +Ajouter-une-spécialité
                    </button>
                   </p>
                  <div class="table-responsive">
                 <p>
                  <form action="{{route('searchSpecialite.admin')}}" method="POST">
                    @csrf
                    <input placeholder="recherche ..." type="text" name="search" required >
                    <button>Valider</button>
                </form>
                 </p>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Numéro
                          </th>
                          <th>
                            Nom-spécialité
                          </th>
                          <th>
                           Date de création
                          </th>
                          <th>
                           Date de mise à jour
                          </th>
                          <th>
                            Détails
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach( $specialiteAll as  $special)
                        <tr>
                          <td class="py-1">
                           {{$special->id}}
                          </td>
                          <td>
                          {{$special->specialite}}
                          </td>
                          <td>
                            {{$special->created_at}}
                          </td>
                          <td>
                          {{$special->updated_at}}
                          </td>
                          <td>
                           <a href="{{route('updateSpecialite.details',['id'=>$special->id])}}" class="btn btn-success"><i class="bi bi-eye"></i></a>
                          </td>

                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {{$specialiteAll->links()}}
                  </div>
                </div>
              </div>
            </div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Ajouter une spécialité</h1>
      </div>
      <div class="modal-body">
      <form action="{{route('addSpecialite.prof')}}" method="POST">
        @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Spécialité</label>
    <input type="text" class="form-control" required id="exampleInputEmail1" name="specialite">
  </div>
  <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
      </div>
    </div>
  </div>
</div>

          </div>
        </div>

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
