@include('templates.styles')

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    @include('templates.sidebar_admin')
    <div class="content">
        <div class="header">
            <h1>Dashboard</h1>
        </div>
        <div class="main-content">
            <p>Listes des professeurs</p>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tel</th>
                    <th scope="col">Specialite</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach($profAll as $prof)
                  <tr>
                    <th scope="row">{{$prof->id}} </th>
                    <td>{{$prof->nom}}</td>
                    <td>{{$prof->prenom}}</td>
                    <td>{{$prof->email}}</td>
                    <td>{{$prof->email}}</td>

                  </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
        {{$profAll->links()}}

        <p>Listes des etudiants</p>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Email</th>
                <th scope="col">Tel</th>
                <th scope="col">Specialite</th>

              </tr>
            </thead>
            <tbody>
                @foreach($etudiantAll as $prof)
              <tr>
                <th scope="row">{{$prof->id}} </th>
                <td>{{$prof->nom}}</td>
                <td>{{$prof->prenom}}</td>
                <td>{{$prof->email}}</td>
                <td>{{$prof->email}}</td>

              </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</body>
</html>
