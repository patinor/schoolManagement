@include('templates.styles')

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
   @include('templates.sidebar_prof')
    <div class="content">
        <div class="header">
            <h1>Dashboard</h1>
        </div>
        <div class="main-content">
            <p>Details du cours </p>
            <button data-bs-toggle="modal" data-bs-target="#exampleModal">+Modifier</button>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Date-creation</th>
                    <th scope="col">Date-mise-a-jour</th>
                    <th scope="col">Supprimer</th>

                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">{{$cours->id}} </th>
                    <td>{{$cours->created_at}}</td>
                    <td>{{$cours->created_at}}</td>
                    <td><a href="{{route('delete.cours.prof',['id'=>$cours->id])}}" class="btn btn-danger"><i class="bi bi-trash3"></i></a></td>

                  </tr>
                 
                </tbody>
              </table>
        </div>
        </div>
    </div>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier le cours</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form enctype="multipart/form-data" method="POST"   action="{{route('updateCours.professeur')}}">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Cours-vidéo</label>
                  <input type="file" class="form-control" id="exampleInputEmail1" name="cours">
                </div>
                  <input type="hidden" class="form-control" name="id" value="{{$cours->id}}" id="exampleInputPassword1">
                
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
        
      </div>
    </div>
  </div>
</body>
</html>
