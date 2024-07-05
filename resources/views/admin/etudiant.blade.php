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
                  <h4 class="card-title">Listes des etudiants</h4>
                  <p class="card-description">
                  </p>
       -
                  <div class="table-responsive">
                  <form action="{{route('searEtudiant.admin')}}" method="POST">
                        @csrf
                        <input placeholder="recherche ..." type="text" name="search" required >
                        <button>Valider</button>
                    </form>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Numéro
                          </th>
                          <th>
                            Nom
                          </th>
                          <th>
                           Prenom
                          </th>
                          <th>
                           Email
                          </th>
                          <th>
                           Adresse
                          </th>
                          <th>
                            Profile
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach( $etudiantAll as  $etudiant)
                        <tr>
                          <td class="py-1">
                           {{$etudiant->id}}
                          </td>
                          <td>
                          {{$etudiant->nom}}
                          </td>
                          <td>
                            {{$etudiant->prenom}}
                          </td>
                          <td>
                            {{$etudiant->email}}
                          </td>
                          <td>
                            {{$etudiant->adresse}}
                          </td>
                          <td>
                             <img src="{{asset('storage/'.$etudiant->profile)}}" alt="">

                          </td>


                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {{$etudiantAll->links()}}
                  </div>
                </div>
              </div>
            </div>

<!-- Button trigger modal -->




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
