<div class="sidebar">
    <h2>Bienvenu {{$user[0]->nom}}</h2>
    <ul>
        <li><a href="/enseignant-home">Home</a></li>
        <li><a href="{{route('update_account.account')}}">Mise à jour</a></li>
        <li><a href="{{route('Prof.home.deconnection')}}">Deconnection</a></li>

    </ul>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">