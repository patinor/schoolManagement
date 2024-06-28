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
                <h1>Mise à jour de mon compte</h1>
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
                        <label for="nom">Nom :</label>
                        <input type="text" id="nom" name="nom"  value="{{$user[0]->nom}}">
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom :</label>
                        <input type="text" id="prenom" name="prenom" value="{{$user[0]->prenom}}" >
                    </div>
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" id="email" name="email" value="{{$user[0]->email}}" >
                    </div>
                    
                    <div class="form-group">
                        <label for="tel">Téléphone :</label>
                        <input type="tel" id="tel" name="tel" value="{{$user[0]->tel}}">
                    </div>
                    <div class="form-group">
                        <label for="profile">Profil :</label>
                        <input type="file" id="profile" name="profile" >
                    </div>
        
                    
                    <div class="form-group">
                        <label for="adresse">Adresse :</label>
                        <input type="text" id="adresse" name="adresse" value="{{$user[0]->adresse}}">
                    </div>
        
                    
                    <input type="hidden" name="id" value="{{$user[0]->id}}">
                    <button type="submit">Soumettre</button><br>
                </form>
            </div>
        
        
        </div>
    </div>
</body>
</html>