<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema Ventas Laravel Vue Js- IncanatoIT">
    <meta name="keyword" content="Sistema ventas Laravel Vue Js, Sistema compras Laravel Vue Js">
    <link rel="shortcut icon" href="../img/logo.jpg">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="css/simple-line-icons.min.css" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="css/style.css" rel="stylesheet">
    <title>Mujeres CTIAM</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>


    <!-- Icons -->

    <!-- Main styles for this application -->
    <link href="css/plantilla.css" rel="stylesheet">
</head>
<style>
        .modal-primary .modal-header {
            background-color: rgb(128, 0, 23);;
        }
        .app-header.navbar .navbar-brand {
            display: inline-block;
            width: 155px;
            height: 55px;
            padding: 0.5rem 1rem;
            margin-right: 0;
            background-color: #fff;
            background-image: url("img/logo.jpg");
            background-repeat: no-repeat;
            background-position: center center;
            background-size: 170px auto;
            border-bottom: 1px solid #c2cfd6;
            margin-left: 10px !important;
        }
</style>
<style>
    .btn-primary{
        background-color: rgba(197, 0,131,1);
        border-color: rgba(197, 0,131,1);
    }
    .btn-danger{
       background-color: rgba(197, 0,131,1);
       border-color: rgba(197, 0,131,1);

   }
   .btn-warning{
       background-color: rgba(197, 0,131,1);
       border-color: rgba(197, 0,131,1);

   }
   a{
      color:  rgba(197, 0,131,1);
   }
   .sidebar .nav-link:hover, .sidebar .navbar .dropdown-toggle:hover, .navbar .sidebar .dropdown-toggle:hover {
       color: #fff;
       background: rgba(197, 0,131,1);
   }
   </style>
<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
   <div id="app">
    <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item d-md-down-none">
                <a class="nav-link" href="#" data-toggle="dropdown">
                    <i class="icon-bell"></i>
                    <span class="badge badge-pill badge-danger">{{session('mensajes')}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Notificaciones</strong>
                    </div>
                    <a @click="menu=11" class="dropdown-item">
                        <i class="fa fa-envelope-o"></i> Mensajes
                        <span class="badge badge-success">{{session('mensajes')}}</span>
                    </a>

                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="img/avatars/6.jpg" class="img-avatar" alt="">
                    <span class="d-md-down-none">{{Auth::user()->nombre}} </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Cuenta</strong>
                    </div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-lock"></i> Cerrar sesión</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
        </ul>
    </header>

    <div class="app-body">

            @include('plantilla.sidebar')
        <!-- Contenido Principal -->
     @yield('contenido')
        <!-- /Fin del contenido principal -->
    </div>
</div>


    <footer class="app-footer">
        <span><a href="/">Mujeres CTIAM</a> &copy; 2019</span>
    </footer>

    <!-- Bootstrap and necessary plugins -->
    <!-- Bootstrap and necessary plugins -->

    <script src="js/app.js"></script>
    <script  src="plantilla/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script  src="plantilla/js/pace.min.js"></script>
    <script  src="plantilla/js/template.js"></script>






</body>

</html>
