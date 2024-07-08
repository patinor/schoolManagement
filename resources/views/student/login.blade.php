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
          <a class="navbar-brand" href="index.html">
            <span style="color: black;">
            EDTS <i class="fa-solid fa-bolt" ></i>
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item active">
                <a class="nav-link" href="/">Acceuil <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('home.etudiant.form')}}"> Cours</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="mesenregistrements.html">Mes enregistrements</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="coursmisenligne.html">Cours mis en ligne</a>
              </li>
            </ul>
            <div class="quote_btn-container ">
                <a href="{{route('login.student')}}" class="quote_btn" style="font-weight: bold;">
                    Connexion
              </a>
            </div>
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
     <div class="container d-flex shadow-lg p-3 mb-5 bg-body-tertiary rounded py-5 mt-5">
        <div class="col-md-6 py-5 mb-3 " >
            <form action="{{route('create.doLogin')}}" method="POST" class=" border border-dark border-3 p-5  " >
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
                <label for="Email" class="form-label">Email</label>
                <input type="email" class="form-control " name="emailOrTel" placeholder="Entrez votre adresse mail"> <br>
                <label for="Motdepasse"  class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="password" id="motdepasse" > <br>
                <button type="submit" class="p-1 mb-1 bg-primary text-white" style="font-weight: bold;">Se connecter</button>
                <br></br>
                <a href="{{route('etudiant.form')}}">Pas de compte? Inscrivez vous</a>
            </form>
        </div>
        <div class="col-md-6">
            <img src="{{asset('/student/images/Sign in-rafiki (1).png')}}" alt="photoconnexion">
        </div>
     </div>
   

  <div class="footer_container">
   
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