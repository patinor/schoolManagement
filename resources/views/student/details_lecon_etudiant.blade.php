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
    <link rel="stylesheet" type="text/css" href="{{ asset('/student/css/bootstrap.css') }}" />

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

        .search-bar {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .course-table {
            margin-top: 20px;
        }
    </style>

    <!-- font awesome style -->
    <link href="{{ asset('/student/css/font-awesome.min.css') }}" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('/student/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('/student/css/responsive.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="sub_page">

    <div class="hero_area">
        <!-- header section starts -->
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container">
                    <a class="navbar-brand" href="/">
                        <span>EDTS</span>
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/">Accueil <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('home.etudiant.form') }}">Cours</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('listes.exercices.etudiant')}}">Exercice</a>
                            </li>
                        </ul>
                        @if($user)
                        <div class="quote_btn-container me-3">
                         <a href="{{route('logout.etudiant')}}" class="quote_btn" style="font-weight: bold;">
                           Deconnection
                         </a>
                       </div>
                       @else 
                       <div class="quote_btn-container me-3">
                         <a href="{{route('login.student')}}" class="quote_btn" style="font-weight: bold;">
                           Connexion
                         </a>
                       </div>
                       @endif
                    </div>
                    <div>
                        <!---parametres-->
                        <a href="{{ route('update.account.etudiant') }}"><img src="{{ asset('/student/images/settings.png') }}" alt="Settings"></a>
                    </div>
                    <!---fin parametres-->
                </nav>
            </div>
        </header>
        <!-- end header section -->
    </div>

    <!--barre de recherche -->
    <div class="container search-bar">
        <form action="{{ route('searchCours.etudiant') }}" method="POST" class="d-flex">
            @csrf
           
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                  <label for="inputPassword6" class="col-form-label"></label>
                </div>
                <div class="col-auto">
                  <input type="password" name="search" placeholder="Recherche cours" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                </div>
               
              </div>
              <button type="submit" class="btn btn-primary ms-2">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>
    <!--fin barre de recherche-->

    <!-- Grille des cours -->
    <div class="container course-table">
        <div class="card mb-3">
            <div class="card-header bg-primary text-white">
                Cours : {{$cours->titre}}
            </div>
            <p>
                <ul class="list-group list-group-flush">
                    @foreach($leconAll as $lecon)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{$lecon->titre}}
                        <a href="{{ route('play.Video.Lecon', ['id' => $lecon->id]) }}" class="btn btn-info btn-sm">
                            <i class="bi bi-play-fill"></i>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </p>
        </div>
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
                    <a href="https://html.design/">Free Html Templates</a>
                </p>
            </div>
        </footer>
        <!-- footer section -->
    </div>

    <!-- jQery -->
    <script src="{{ asset('/student/js/jquery-3.4.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('/student/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/student/js/custom.js') }}"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
    <!-- End Google Map -->

</body>

</html>
