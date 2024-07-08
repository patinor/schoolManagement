<!-- partial:../../partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="user-profile">
        <div class="user-image">
            <img src="{{ asset('storage/' . session()->get('prof')[0]->profile) }}" alt="">
        </div>
        <div class="user-name">
            <!-- User name goes here -->
        </div>
        <div class="user-designation">
            <!-- User designation goes here -->
        </div>
    </div>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/enseignant-home">
            <i class="bi bi-house"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('cours.Listes') }}">
            <i class="bi bi-backpack4"></i>
                <span class="menu-title">Listes des cours</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('listes.Lecon') }}">
            <i class="bi bi-backpack4"></i>
                <span class="menu-title">Listes des leçons</span>
            </a>
        </li>
       
        <li class="nav-item">
            <a class="nav-link" href="{{ route('listes.Soumission.prof') }}">
            <i class="bi bi-send"></i>
                <span class="menu-title">Soumission des exos</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('Prof.home.deconnection') }}">
            <i class="bi bi-power"></i>
                <span class="menu-title">Déconnexion</span>
            </a>
        </li>
    </ul>
</nav>
