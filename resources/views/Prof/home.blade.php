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
            <p>Listes de mes cours </p>
            <button data-bs-toggle="modal" data-bs-target="#exampleModal">+Ajouter-un-cours</button>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Date-creation</th>
                    <th scope="col">Date-mise-a-jour</th>
                    <th scope="col">Details</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($coursAll as $prof)
                  <tr>
                    <th scope="row">{{$prof->id}} </th>
                    <td>{{$prof->created_at}}</td>
                    <td>{{$prof->created_at}}</td>
                    <td><a href="{{route('details.cours.prof',['id'=>$prof->id])}}" class="btn btn-info"><i class="bi bi-eye"></i></a></td>
                  </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
        {{$coursAll->links()}}

        <div class="main-content">
            <p>Listes des exercices </p>
            <button  data-bs-toggle="modal" data-bs-target="#secondModal">+ajouter-un-exercices</button>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Date</th>
                    <th scope="col">Fichier</th>
                    <th scope="col">Details</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($exerciesAll as $cours)
                  <tr>
                    <th scope="row">{{$cours->id}} </th>
                    <td>{{$cours->created_at}}</td>
                    <td><a href="{{ Storage::url($cours->cours_pdf) }}" target="_blank">Télécharger PDF</a></td>
                    <td><a href="#" class="btn btn-info"><i class="bi bi-eye"></i></a></td>
                  </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
        {{$exerciesAll->links()}}
        </div>
        
    </div>
    
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form enctype="multipart/form-data" method="POST" action="{{route('addCours.Prof')}}">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Cours-vidéo</label>
                  <input type="file" class="form-control" id="exampleInputEmail1" name="cours">
                </div>
                <input type="hidden" class="form-control" name="id" value="{{$user[0]->id}}" id="exampleInputPassword1">
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
        
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
            <form enctype="multipart/form-data" method="POST" action="{{route('ajouter.exo.cours')}}">
                @csrf
                <div class="mb-3">
                  <label for="coursCompleted" class="form-label">Fichier-pdf</label>
                  <input type="file" class="form-control" id="coursCompleted" name="cours_pdf">
                </div>
                <input type="hidden" class="form-control" name="id" value="{{$user[0]->id}}" id="userIdCompleted">
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

