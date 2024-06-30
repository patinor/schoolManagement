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

    <title>Login #3</title>
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
              <h3>Cration-compte <strong>Etudiant</strong></h3>
              <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
              </div>
              <form enctype="multipart/form-data" action="{{route('create.enseignant')}}" method="POST">
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
                <div class="form-group first">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" name="nom"  id="username">
                </div>

                <div class="form-group first">
                  <label for="username">Prenom</label>
                  <input type="text" class="form-control" name="prenom"  id="username">
                </div>

                <div class="form-group first">
                  <label for="username">Email</label>
                  <input type="email" class="form-control" name="email"  id="username">
                </div>
                <div class="form-group first">
                  <label for="username">Tel</label>
                  <input type="text" class="form-control" name="tel"  id="username">
                </div>
                <div class="form-group first">
                  <label for="username">Adresse</label>
                  <input type="text" class="form-control" name="adresse"  id="username">
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Spécialité</label>
                 <select name="specialite_id" id="" class="form-control">
                 @foreach($specialite as $spec)
                    <option value="{{$spec->id}}">{{$spec->specialite}}</option>
                    @endforeach
                 </select>
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password-confirmation</label>
                  <input type="password" class="form-control" name="password_confirm" >
                </div>

                <input type="submit" value="Log In" class="btn btn-block btn-primary">

              </form>
              <a href="{{route('login.prof_app')}}">Connection</a>
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
