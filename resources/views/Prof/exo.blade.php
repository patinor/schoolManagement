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



        <div class="main-content">
            <p>Listes des exercices </p>
            <button  data-bs-toggle="modal" data-bs-target="#secondModal">+Modifier-un-exercices</button>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Titre</th>
                    <th scope="col">Date</th>
                    <th scope="col">Fichier</th>
                  </tr>
                </thead>
                <tbody>

                  <tr>
                    <th scope="row">{{$cours->titre}} </th>
                    <td>{{$cours->created_at}}</td>
                    <td><a href="{{ Storage::url($cours->cours_pdf) }}" target="_blank">Voir PDF</a></td>
                  </tr>

                </tbody>
              </table>
        </div>

        </div>

    </div>

 

  <div class="modal fade" id="secondModal" tabindex="-1" aria-labelledby="secondModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="secondModalLabel">Ajouter un exercices</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form enctype="multipart/form-data" method="POST" action="{{route('exercices_pdf.update')}}">
                @csrf
                <div class="mb-3">
                  <label for="coursCompleted" class="form-label">Titre :</label>
                  <input type="text" class="form-control" id="coursCompleted" value="{{$cours->titre}}" name="titre">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Cours-vidéo</label>
                  <input type="file" class="form-control" id="exampleInputEmail1" name="cours_pdf">
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

