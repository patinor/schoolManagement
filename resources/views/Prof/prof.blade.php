<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Étudiant</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
}

.container {
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 40%;
}

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
        <form enctype="multipart/form-data" action="{{route('create.enseignant')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" >
            </div>
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" >
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" >
            </div>
            
            <div class="form-group">
                <label for="tel">Téléphone :</label>
                <input type="tel" id="tel" name="tel" >
            </div>
            <div class="form-group">
                <label for="profile">Profil :</label>
                <input type="file" id="profile" name="profile" >
            </div>

            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" >
            </div>
            <div class="form-group">
                <label for="password">Confirmation-mot-de-passe :</label>
                <input type="password" id="password_confirmation" name="password_confirm" >
            </div>
            <div class="form-group">
                <label for="adresse">Adresse :</label>
                <input type="text" id="adresse" name="adresse" >
            </div>

            <div class="form-group">
                <label for="adresse">Specialite</label>
                <input type="text" id="adresse" name="specialite" >
            </div>
            <button type="submit">Soumettre</button><br>
            <a href="{{route('store_enseignant')}}">Vous connecter ?</a>
        </form>
    </div>
</body>
</html>
