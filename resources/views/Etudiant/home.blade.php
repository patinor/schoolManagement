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
        <div class="header">
            <h1>Dashboard</h1>
        </div>
        <div class="main-content">
            <p>Choisr le cours de votre choix 👇</p>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Date-creation</th>
                    <th scope="col">Consulter</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($exercices as $prof)
                  <tr>
                    <th scope="row">{{$prof->specialite}} </th>
                    <td>{{$prof->created_at}}</td>
                    <td><a href="{{route('cours_etudiant.details',['id'=>$prof->id])}}" class="btn btn-info"><i class="bi bi-eye"></i></a></td>
                  </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
        {{$exercices->links()}}
        </div>
    </div>
</body>
</html>
