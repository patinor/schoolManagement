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
          </div>
          <!---fin parametres-->
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!--section presentation site web-->
  <section>
    <div class="container mt-5 d-flex justify-content-between">
      <div class="row">
      <!----image a redimensionner-->
      <div class="col w-50 mt-1"><img src="{{asset('/student/images/Studying-rafiki (4) (1).png')}}" alt="photopresentation"></div>
      </div>
      <div class="col  text-end mt-5 ">
        <!--augmenter la police -->
        <h1 style="
        font-weight: bold;
        background: linear-gradient(to right, #407BFF, #00C9FF);
        background-clip: text;
        color: transparent;
    ">
        EDTS
    </h1>
    <p style="
        color: black;
        text-align: justify;
        font-family: Arial, sans-serif;
        font-size: 16px;
        line-height: 1.5;
    ">
        EDTS est une plateforme d'apprentissage dédiée à offrir des cours en ligne de haute qualité centrée autour du programme scolaire sénégalais dans divers domaines. Notre objectif est de rendre l'apprentissage accessible à tous, partout et à tout moment.
    </p>


    </div>
  </section>
  <section class="service_section layout_padding mt-5">
    <div class="container">
      <div class="heading_container">
        <h2>
          Comment ça marche..?
        </h2>
      </div>
     <div>
      <!--section professeur -->
      <div class="container border border-black pt-3 ">
        <div class="row align-items-center ">
            <div class="col-md-6 ">
                <ol>
                    <div class="mb-4">
                      <h5 class="font-weight-bold">Vous êtes professeur?</h5>
                      <p>Vous souhaitez mettre des cours sur la plateforme EDTS? Suivez les étapes suivantes:</p>
                      <ul class="list-unstyled">
                          <li class="mb-2">
                              <strong>1. Cliquez sur le bouton s'inscrire :</strong> La vidéo sera mise en ligne et visualisée par les élèves.
                          </li>
                          <li class="mb-2">
                              <strong>2. Une fois le formulaire rempli, connectez-vous :</strong> Accédez à votre compte.
                          </li>
                          <li class="mb-2">
                              <strong>3. Dans la page "cours mis en ligne" :</strong> Un formulaire d'ajout vous sera soumis. Une fois le formulaire rempli, vos cours seront disponibles en ligne.
                          </li>
                      </ul>
                  </div>
                    <div class="button mt-2">
                        <a class="btn btn-primary" href="{{route('register.prof')}}" role="button" >S'inscrire</a>
                    </div>
                </ol>
              </div>
            </div>
              <div class="col-md-6 text-center">
                  <img src="{{asset('/student/images/Teacher student-rafiki (3).png')}}" alt="photo professeur" class="img-fluid">
              </div>
          </div>
                 <!--</div>
                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                  </div> -->
       </div>
       <!--section eleve-->
       <div class="container border border-primary-subtle mt-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <ol>
                    <h5 style="font-weight: bold;">Vous êtes élève?
                    </h5>
                    <p>et Vous souhaitez mettre des cours sur la plateforme EDTS? Suivez les étapes suivantes:</p>
                    <li>Inscrivez-vous en remplissant le formulaire d'inscription en cliquant sur le lien en dessous en remplissant les différentes informations.</li>
                    <li>Après inscription, connectez-vous. Ensuite, un onglet "cours mis en ligne" sera mis à votre disposition et vous pourrez mettre vos différents cours à travers le formulaire d'ajout.</li>
                    <div class="button mt-2">
                        <a class="btn btn-primary" href="{{route('etudiant.form')}}" role="button">S'inscrire</a>
                    </div>
                </ol>
            </div>
            <div class="col-md-6 text-center">
                <img src="{{asset('/student/images/Happy student-cuate (1).png')}}" alt="photo professeur" class="img-fluid">
            </div>
          </div>
                  <!--</div>
                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                  </div> -->
       </div>



  </section>
  <!--  section a propos -->

  <section class="about_section layout_padding">
    <div class="container  ">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2 style="font-weight: bold;">
                A propos de nous
              </h2>
            </div>
            <p>
              Chez EDTS, nous ne nous contentons pas de transmettre des connaissances. Nous cultivons des environnements d'apprentissage enrichissants où la curiosité est encouragée, et où chaque étudiant peut atteindre son plein potentiel. Nous sommes fiers de notre approche innovante et de notre engagement envers l'excellence académique.

            </p>
          </div>
        </div>
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="{{asset('/student/images/About us page-bro (1).png')}}" alt="">
          </div>
        </div>

      </div>
    </div>
  </section>
  <!--fin section a propos-->
  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5 col-lg-4 offset-md-1">
          <div class="form_container">
            <div class="heading_container">
              <h2>
                Nous contacter
              </h2>
            </div>
            <form action="">
              <div>
                <input type="text" placeholder="Votre nom " />
              </div>
              <div>
                <input type="email" placeholder="Email" />
              </div>
              <div>
                <input type="text" placeholder="numero de téléphone" />
              </div>
              <div>
                <input type="text" class="message-box" placeholder="Message" />
              </div>
              <div class="d-flex ">
                <button class="btn btn-primary border border-black ">
                  Envoyer
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6 col-lg-7 px-0">
          <div >
            <div class="img-fluid">
              <div >
                <img src="{{asset('/student/images/Contact us-amico (1).png')}}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->

  <div class="footer_container border border-black p-2 mt-5 border-opacity-75">

    <!-- footer section -->
    <footer class="footer_section">
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
    </div> <!---faire un flexbox-->
        </p>
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
