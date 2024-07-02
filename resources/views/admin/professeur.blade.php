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
                            tel
                          </th>
                          <th>
                            Profile
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach( $professeurAll as  $prof)
                        <tr>
                          <td class="py-1">
                           {{$prof->id}}
                          </td>
                          <td>
                          {{$prof->nom}}
                          </td>
                          <td>
                            {{$prof->prenom}}
                          </td>
                          <td>
                            {{$prof->email}}
                          </td>
                          <td>
                            {{$prof->adresse}}
                          </td>
                          <td>
                            {{$prof->tel}}
                          </td>
                          <td>
                             <img src="{{asset('storage/'.$prof->profile)}}" alt="">

                          </td>


                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {{$professeurAll->links()}}
                  </div>
                </div>
              </div>
            </div>

<!-- Button trigger modal -->




          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
          </div>
        </footer>
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
