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


    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{asset('/student/css/bootstrap.css')}}" />


    <!-- font awesome style -->
    <link href="{{asset('/student/css/font-awesome.min.css')}}" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{asset('/student/css/style.css')}}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{asset('/student/css/responsive.css')}}" rel="stylesheet" />

  </head>

<body>
<div >
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section border border-black p-2 mb-2 border-opacity-75">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="/">
            <span style="color: black;">
            EDTS <i class="fa-solid fa-bolt" ></i>
            </span>
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
            @if(session()->get('etudiant'))
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
            <a href="{{route('update.account.etudiant')}}"><img src="{{asset('/student/images/settings.png')}}" alt=""></a>
          </div>
          <!---fin parametres-->
        </nav>
      </div>
    </header>
    <!-- end header section -->
     <!--formulaire inscription-->
     <div class="container d-flex border border-black p-5 border mt-5 " id="formulaireinscription">
        <div class="w-75 pt-5">
            <form enctype="multipart/form-data" action="{{route('update_etudiant.account')}}" method="POST">
                @csrf
                @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li style="color: red;">{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
                <label for="Nom" class="form-label" >Nom</label>
                <input type="text" class="form-control" value="{{$user[0]->nom}}" id="Nom" name="nom">
                <label for="Prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" name="prenom" value="{{$user[0]->prenom}}">
                <label for="Email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{$user[0]->email}}">
                <label for="" class="form-label">Téléphone</label>
                <input type="tel" class="form-control" name="tel" value="{{$user[0]->tel}}">
                <label for="" class="form-label">Adresse</label>
                <input type="text" class="form-control" name="adresse" value="{{$user[0]->adresse}}">
                <button type="submit" class="btn btn-primary m-1 p-3 border border-black" style= "color: black; font-weight: bold;" >Valider</button>
                <input type="hidden" name="id" value="{{$user[0]->id}}">
            </form>
        </div>
        <div>
            <h3 class="text-center" style="font-weight: bold;">Mise à jour</h3>
            <img src="./images/Sign up-cuate (1).png" class="" alt="">
        </div>
     </div>

    <!-- footer section -->
    <footer class="footer_section border border-black p-2 mb-0 border-opacity-75 mt-5">
      <div class="container">
        <p>
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
          &copy; <span id="displayYear"></span> edts Tous droits réservés

        </div>
      </div>
    </footer>
    <!-- footer section -->
  </div>


  <!-- jQery -->
  <script src="{{asset('/student/js/jquery-3.4.1.min.js')}}"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="{{asset('/student/js/bootstrap.js')}}"></script>
  <script src="{{asset('/student/js/custom.js')}}"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->
</div>

</body>

</html>
