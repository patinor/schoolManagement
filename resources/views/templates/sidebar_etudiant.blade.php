 <!-- partial:../../partials/_sidebar.html -->
 <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="user-profile">
          <div class="user-image">
          </div>
          <div class="user-name">

          </div>
          <div class="user-designation">

          </div>
        </div>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/etudiant-home_page">
            <i class="bi bi-house"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('listes.Soumission')}}">
            <i class="bi bi-send"></i>
              <span class="menu-title">Listes des exercices soumis</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  " href="{{route('logout.etudiant')}}">
            <i class="bi bi-power"></i>
              <span class="menu-title">Deconnection</span>
            </a>
          </li>



        </ul>
      </nav>
