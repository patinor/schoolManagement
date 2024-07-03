

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
                  <h4 class="card-title">Details du cours</h4>
                  <p class="card-description">
                  </p>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  +Modifier-mes-informations
</button>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                      <tr>
                    <th >Nom</th>
                    <th >Prenom</th>
                    <th >Email</th>
                    <th >Tel</th>
                    <th >Adresse</th>

                  </tr>
                      </thead>
                      <tbody>
                      <tr>
                    <th scope="row">{{$user[0]->nom}} </th>
                    <td>{{$user[0]->prenom}}</td>
                    <td>{{$user[0]->email}}</td>
                    <td>{{$user[0]->tel}}</td>
                    <td>{{$user[0]->adresse}}</td>

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
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modifier mes informations</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form enctype="multipart/form-data" action="{{route('update.account.enseignant')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" class="form-control" name="nom" value="{{$user[0]->nom}}">
            </div>
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="{{$user[0]->prenom}}">
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$user[0]->email}}">
            </div>

            <div class="form-group">
                <label for="tel"> Téléphone :</label>
                <input type="tel" class="form-control" id="tel" name="tel" value="{{$user[0]->tel}}">
            </div>



            <div class="form-group">
                <label for="adresse">Adresse :</label>
                <input type="text" class="form-control" id="adresse" value="{{$user[0]->adresse}}" name="adresse" >
            </div>

            <div class="form-group">
                <label for="adresse">Specialite</label>
                <select name="specialite_id" id="" class="form-control">
                    @foreach($specialite as $special)
                    <option value="{{$special->id}}">{{$special->specialite}}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" id="adresse" value="{{$user[0]->id}}" name="id" >

            <button type="submit" class="btn btn-info">Soumettre</button><br>
        </form>
      </div>

    </div>
  </div>
</div>

          </div>
        </div>

      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  @include('templates.js_admin')

</body>

</html>
