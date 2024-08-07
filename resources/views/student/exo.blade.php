<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>EDTS</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{asset('/student/css/bootstrap.css')}}" />

    <style>
        .carousel-item img {
            height: 500px; /* Ajustez cette valeur en fonction de la hauteur souhaitée */
            object-fit: cover;
        }

        .carousel-caption {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
        }

        .course-table {
            margin-top: 20px;
        }

        .user-info {
            display: flex;
            align-items: center;
            background-color: #f8f9fa;
            padding: 10px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-left: auto;
            margin-right: 20px;
        }

        .user-info img {
            border-radius: 50%;
            margin-right: 15px;
            width: 40px;
            height: 40px;
        }

        .user-info .user-name {
            font-weight: bold;
            font-size: 1.2rem;
        }

        .search-bar {
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>

    <!-- font awesome style -->
    <link href="{{asset('/student/css/font-awesome.min.css')}}" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{asset('/student/css/style.css')}}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{asset('/student/css/responsive.css')}}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="sub_page">

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="/">
            <span>EDTS</span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item ">
                <a class="nav-link" href="/">Acceuil <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="{{route('home.etudiant.form')}}"> Cours</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="{{route('listes.exercices.etudiant')}}">Exercice</a>
              </li>
            </ul>
            <div class="user-info">
              <img src="https://via.placeholder.com/40" alt="User Avatar">
              <span class="user-name">Connecté : {{ $user[0]->nom }}</span>
            </div>
            <div class="quote_btn-container me-3">
              <a href="{{route('login.student')}}" class="quote_btn" style="font-weight: bold;">
                Connexion
              </a>
            </div>
            <div>
              <!---parametres-->
              <a href="{{route('update.account.etudiant')}}"><img src="{{asset('/student/images/settings.png')}}" alt=""></a>
            </div>
            <!---fin parametres-->
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!--barre de recherche -->
  <div class="container search-bar">
    <form action="{{route('searchCours.etudiant')}}" method="POST" class="d-flex">
      @csrf
      <input type="search" id="form1" class="form-control" name="search" placeholder="Rechercher un cours" required />
      <button type="submit" class="btn btn-primary ms-2">
        <i class="bi bi-search"></i>
      </button>
    </form>
  </div>
  <!--fin barre de recherche-->

  <!-- Grille des cours -->
  <div class="container course-table">
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Titre</th>
          <th scope="col">Enseignant</th>
          <th scope="col">Détails</th>
        </tr>
      </thead>
      <tbody>
        @foreach($leconAll as $cours)
        <tr>
          <th scope="row">{{ $cours->id }}</th>
          <td>{{ $cours->cours->titre }}</td>
          <td>{{ $cours->cours->enseignant->nom .' '. $cours->cours->enseignant->prenom}}</td>
          <td><a href="{{ route('listes.details.Exercices', ['id' => $cours->id]) }}" class="btn btn-info"><i class="bi bi-eye"></i></a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{$leconAll->links()}}
  </div>
  <!-- Fin de la grille des cours -->

  <div class="footer_container">
    <!-- footer section -->
    <footer class="footer_section">
      <div class="container">
        <div class="info_social">
          <a href="">
            <i class="fa fa-facebook" aria-hidden="true"></i>
          </a>
          <a href="">
            <i class="fa fa-twitter" aria-hidden="true"></i>
          </a>
          <a href="">
            <i class="fa fa-linkedin" aria-hidden="true"></i>
          </a>
          <a href="">
            <i class="fa fa-instagram" aria-hidden="true"></i>
          </a>
        </div>
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="#">Free Html Templates</a>
        </p>
      </div>
    </footer>
    <!-- footer section -->
  </div>

  <!-- jQery -->
  <script src="{{asset('/student/js/jquery-3.4.1.min.js')}}"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <!-- bootstrap js -->
  <script src="{{asset('/student/js/bootstrap.js')}}"></script>
  <script src="{{asset('/student/js/custom.js')}}"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->

</body>

</html>
