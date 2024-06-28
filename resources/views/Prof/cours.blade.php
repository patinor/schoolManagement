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
    <div class="sidebar">
        <h2>Bienvenu {{$user[0]->nom}}</h2>
        <ul>
            <li><a href="#home">Mes cours</a></li>

            <li><a href="#contact">Mise à jour</a></li>
            <li><a href="{{route('Prof.home.deconnection')}}">Deconnection</a></li>

        </ul>
    </div>
    <div class="content">
        <div class="header">
            <h1>Dashboard</h1>
        </div>
        <div class="main-content">
            <div class="container">
                <h1>Créer mon compte  Enseignant</h1>
                @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color: red;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
                <form enctype="multipart/form-data" action="{{route('update.account.enseignant')}}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label for="profile">Profil :</label>
                        <input type="file" id="profile" name="profile" >
                    </div>
        
                    
                    <div class="form-group">
                        <label for="adresse">Cours</label>
                        <input type="text" id="adresse" name="cours">
                    </div>
        
                    <input type="hidden" name="id" value="{{$user[0]->id}}" id="">
                    <div class="form-group">
                        <label for="adresse">Specialite</label>
                        <input type="text" id="adresse" name="specialite" value="{{$user[0]->specialite}}">
                    </div>
                    <input type="hidden" name="id" value="{{$user[0]->id}}">
                    <button type="submit">Soumettre</button><br>
                </form>
            </div>
        
        
        </div>
    </div>
</body>
</html>
