<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema escolar</title>
  <!-- Enlace a Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <style>
                .logged-in {
              display: inline;
            }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#"> Kinder "La choza de los pequeñines"</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      </ul>
     
        @if(Auth::check())
          <form class="form-inline my-2 my-lg-0 logged-in"  method="POST" action="{{ route('login') }}">
                  @csrf
                  <input class="form-control mr-sm-2 " type="email" name="email" placeholder="Correo electrónico" aria-label="Correo electrónico" style="background-color: #adb5bd; color: #007BFF;">
                  <input class="form-control mr-sm-2 " type="password" name="password" placeholder="Contraseña" aria-label="Contraseña" style="background-color: #adb5bd; color: #007BFF;">
                  <button class="btn btn-outline-primary my-2 my-sm-0 " type="submit">Iniciar sesión</button>
                </form>
        @endif

        @if(!Auth::check()) 

        <form method="POST" action="{{ route('logout') }}">
          <button class="btn btn-outline-primary my-2 my-sm-0 logged-out" method="POST" action="{{ route('logout') }}" type="submit">Cerrar sesion</button>
        </form>
        @endif

     <a href="{{ route('welcome') }}" class="btn btn-outline-primary my-2 my-sm-0">Volver al inicio</a>
      
    </div>
  </div>
</nav>

<!-- Enlaces a Bootstrap JS y jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
