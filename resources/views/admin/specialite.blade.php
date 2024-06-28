@include('templates.styles')

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        

h1 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

.form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #0056b3;
}
    </style>
</head>
<body>
   
     @include('templates.sidebar_admin')
    <div class="content">
        <div class="header">
            <h1>Dashboard</h1>
        </div>
        <div class="main-content">
            <div class="container">
                <h1>Listes des spécialite</h1>
                <button data-bs-toggle="modal" data-bs-target="#exampleModal">+Spécialite</button>

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
                <th scope="col">Numéro</th>
                <th scope="col">Specialite</th>
                <th scope="col">Date-creation</th>
                <th scope="col">Details</th>
              </tr>
            </thead>
            <tbody>
                @foreach($specialiteAll as $special)
              <tr>
                <th scope="row"> {{$special->id}} </th>
                <td>{{$special->specialite}}</td>
                <td>{{$special->created_at}}</td>
              </tr>
              
              @endforeach

            </tbody>
          </table>
            </div>
            {{$specialiteAll->links()}}
        
        </div>
    </div>

    <!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">AJouter-une-spécialite</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form enctype="multipart/form-data" action="{{route('addSpecialite.prof')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nom">Specialite</label>
                    <input type="text" id="nom" name="specialite"  required>
                </div>
                <button type="submit">Soumettre</button><br>

            </form>
        </div>
        
      </div>
    </div>
  </div>
</body>
</html>
