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
            <li><a href="#home">Mes cours</a></li>
            <li><a href="#contact">Deconnection</a></li>
        </ul>
    </div>
    <div class="content">
        <div class="header">
            <h1>Dashboard</h1>
        </div>
        <div class="main-content">
            <p>Bienvenue sur le tableau de bord !</p>
            <!-- Ajoutez ici le contenu principal du dashboard -->
        </div>
    </div>
</body>
</html>
