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
    <div class="sidebar">
        <h2>Bienvenu {{$user[0]->nom}}</h2>
        <ul>
            <li><a href="{{route('home.etudiant.form')}}">Mes cours</a></li>
            <li><a href="{{route('logout.etudiant')}}">Deconnection</a></li>
        </ul>
    </div>
    <div class="content">

        <div class="main-content">
            <p>Listes des cours en vidéo</p>

            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color: red;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Titre</th>
                    <th scope="col">Date</th>
                    <th scope="col">Cours</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($coursAll as $prof)
                  <tr>
                  <td >{{$prof->titre}} </td>
                  <td>
                  {{$prof->enseignant->specialite->created_at}}
                  <td>

                  <td><a href="{{route('cours.etudiant.vue',['id'=>$prof->id])}}" class="btn btn-info"><i class="bi bi-eye"></i></a></td>

                  </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
        {{$coursAll->links()}}



        <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Date</th>
                    <th scope="col">Cours</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($exoAll as $exo)
                  <tr>
                    <th scope="row">{{$exo->enseignant->specialite->specialite}} </th>
                    <th scope="row">{{$exo->enseignant->specialite->created_at}} </th>

                    <td><a href="{{ Storage::url($exo->cours_pdf) }}" target="_blank">Consulter</a></td>

                  </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
        {{$exoAll->links()}}

        </div>

    </div>

</body>
</html>
