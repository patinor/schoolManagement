<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('/login/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('/login/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/login/css/bootstrap.min.css')}}">

    <!-- Style -->
    <link rel="stylesheet" href="{{asset('/login/css/style.css')}}">

    <title>Authentification</title>
  </head>
  <body>


  <div class="half">
    <div class="bg order-1 order-md-2" style="background-image: url('/login/images/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6">
            <div class="form-block">
              <div class="text-center mb-5">
              <h3>Connexion <strong>Authentification</strong></h3>
              <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
              @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color: red;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
              </div>
              <form action="{{route('admin.auth.account')}}" method="POST">
                @csrf
                <div class="form-group first">
                  <label for="username">Identifiant</label>
                  <input type="text" class="form-control" name="email" >
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Mot-de-Passe</label>
                  <input type="password" class="form-control" name="password" placeholder="Mot de Passe" id="password">
                </div>


                <input type="submit" value="Connexion" class="btn btn-block btn-primary">

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>



    <script src="{{asset('/login/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('/login/js/popper.min.js')}}"></script>
    <script src="{{asset('/login/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/login/js/main.js')}}"></script>
  </body>
</html>
