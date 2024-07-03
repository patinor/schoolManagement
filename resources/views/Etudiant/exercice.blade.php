

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
                  <h4 class="card-title">Listes des Cours de {{$specialite->specialite}} </h4>
                  <p class="card-description">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  +Soumettre un devoir pour correction
</button>
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
                    <td><a href="{{asset('storage/'.$prof->cours_pdf)}}" target="_blank" class="btn btn-primary"><i class="bi bi-filetype-pdf"></i></a></td>
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
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Soumettre un exercice</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('soumettre.Exerices')}}" method="POST" enctype="multipart/form-data">
        @csrf
  <div class="mb-3">
    <input type="hidden" class="form-control" required id="exampleInputEmail1" value="{{$specialite->id }}" name="specialite_id">
  </div>
  <div class="mb-3">
    <input type="hidden" class="form-control"  id="exampleInputEmail1" value="{{$user[0]->id}}" name="etudiant_id">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Soumettre</label>
    <input type="file" class="form-control"  id="exampleInputEmail1"  name="document">
  </div>
  <input type="hidden" name="id" value="">
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
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
