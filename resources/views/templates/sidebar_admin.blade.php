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
            <a class="nav-link" href="/dashboard-admin">
            <i class="bi bi-house"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link btn-btn-info" href="{{route('specialite.listes.admin')}}">
            <i class="bi bi-sticky-fill"></i>
              <span class="menu-title">Lises des spécialité</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('listes.etudiants')}}">
            <i class="bi bi-person-standing"></i>
              <span class="menu-title">Listes des étudiants</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('listes.professeurs')}}">
            <i class="bi bi-person-lines-fill"></i>
              <span class="menu-title">Listes des professeurs</span>
            </a>
          </li>



        </ul>
      </nav>
