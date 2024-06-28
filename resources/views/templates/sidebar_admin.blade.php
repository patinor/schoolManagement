<div class="sidebar">
    <h2>Bienvenu {{Auth::user()->name}}</h2>
    <ul>
        <li><a href="{{route('dashboard.admin')}}">Acceuil</a></li>

        <li><a href="{{route('specialite.listes.admin')}}">Ajouter des spécialité</a></li>

        <li><a href="{{route('update.admin.informations')}}">Mise à jour</a></li>
        <li><a href="{{route('deconnection.admin.account')}}">Deconnection</a></li>

    </ul>
</div>