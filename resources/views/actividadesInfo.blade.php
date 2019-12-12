<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Mujeres CTIAM</title>

  <!-- Font Awesome Icons -->
  <link href="../fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../css/custum.css" rel="stylesheet" type="text/css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="../magnific-popup/magnific-popup.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <!-- Theme CSS - Includes Bootstrap -->
  <link href="../css/creative.css" rel="stylesheet">
     <meta name="csrf-token" content="{{ csrf_token() }}" />


</head>

<body id="page-top">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav"style="background-color:#C50083!important;" >
                <div class="container"style="color: #FEFEFE;">
                    <a class="navbar-brand js-scroll-trigger" href=""><img class="logo" src="../img/logo.jpg"></a>
                  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarResponsive" >
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">

                      <li class="nav-item">
                        <a style="color: #FEFEFE;" class="nav-link js-scroll-trigger" href="services">Servicios</a>
                      </li>
                      <li class="nav-item">
                        <a style="color: #FEFEFE;" class="nav-link js-scroll-trigger" href="actividades">Actividades</a>
                      </li>
                      <li class="nav-item"style="color: #FEFEFE;">
                        <a style="color: #FEFEFE;"class="nav-link js-scroll-trigger " href="#contact">Contacto</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>


    <div class="bd-example ">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
                @for($a = 0; $a <$c; $a++)
            <li data-target="#carouselExampleCaptions" data-slide-to="{{$a}}" ></li>
            @endfor

          </ol>
          <div class="carousel-inner tama">
                @for($a = 0; $a <$c; $a++)
            <div class="carousel-item active">
              <img src="../{{$i[$a]['url']}}"  alt="...">
              <div class="carousel-caption d-none d-md-block">

              </div>
            </div>
          @endfor

          </div>

          </a>
        </div>
      </div>

<hr>
<div class="row">
<div class="col-2">

</div>
<div class="col-8">

     <h2 class="text-center mt-0">{{$s['titulos']}}</h2>
     <p class="text-muted mb-0">{{$s['descripcion']}}</p>

</div>
<div class="col-2">

</div>
</div><br>
<br><br>
<br>
<div class="row">
        <div class="col-1">

            </div>
    <div class="col-3">
     <h3 class=" mt-0">Archivos</h3>
     <ol id="lista2">
            @for($a = 0; $a <$x; $a++)
            <li><a href="../{{$ar[$a]['url']}}">{{$ar[$a]['nombre']}}</a></li>
            @endfor
        </ol>


    </div>
<style>
    #lista2 {
        counter-reset: li;
        list-style: none;
        *list-style: decimal;
        font: 15px 'trebuchet MS', 'lucida sans';
        padding: 0;
        margin-bottom: 4em;
        text-shadow: 0 1px 0 rgba(255,255,255,.5);
    }

    #lista2 ol {
        margin: 0 0 0 2em;
    }

    #lista2 li{
        position: relative;
        display: block;
        padding: .4em .4em .4em 2em;
        *padding: .4em;
        margin: .5em 0;
        background: #ddd;
        color: #444;
        text-decoration: none;
        border-radius: .3em;
        transition: all .3s ease-out;
    }

    #lista2 li:hover{
        background: #eee;
    }

    #lista2 li:hover:before{
        transform: rotate(360deg);
    }

    #lista2 li:before{
        content: counter(li);
        counter-increment: li;
        position: absolute;
        left: -1.3em;
        top: 50%;
        margin-top: -1.3em;
        background: #87ceeb;
        height: 2em;
        width: 2em;
        line-height: 2em;
        border: .3em solid #fff;
        text-align: center;
        font-weight: bold;
        border-radius: 2em;
        transition: all .3s ease-out;
    }
</style>
    <div class="col-8">

                    {!!$s['contenido']!!}

        </div>

</div>
<div class="row">
<div class="col-2">

</div>
<div class="col-8">
        <div class="container content profile">
                <div id="respuesta"></div>
                <center>
                <form class="form-horizontal" method="post">
                       // @csrf
                    <fieldset>
                        <legend class="text-center header">Aclaramos tus dudas</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="nombre" name="name" type="text" placeholder="Nombre" class="form-control">
                            </div>
                        </div>


                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="correo" name="email" type="text" placeholder="Correo" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="telefono" name="phone" type="text" placeholder="Teléfono" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="mensaje" name="message"
                                 placeholder="Ingresa tu mensaje." rows="7"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" id="formulario" class="btn btn-primary btn-lg">Enviar</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </center>
            </div>
</div>
<div class="col-2">

</div>
</div>
@include('contenido.contact')

  <!-- Footer -->
  <footer class="bg-light py-5">
        <div class="container">
          <div class="small text-center text-muted">Copyright &copy; 2019 - Start Bootstrap</div>
        </div>
      </footer>

      <!-- Bootstrap core JavaScript -->
      <script src="../jquery/jquery.min.js"></script>
      <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- Plugin JavaScript -->
      <script src="../jquery-easing/jquery.easing.min.js"></script>
      <script src="../magnific-popup/jquery.magnific-popup.min.js"></script>

      <!-- Custom scripts for this template -->
      <script src="../js/creative.min.js"></script>
      <script type="text/javascript">



        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });



        $("#formulario").click(function(e){

            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });

            e.preventDefault();



            var nombre= $("#nombre").val();

            var correo = $("#correo").val();

            var telefono = $("#telefono").val();
            var mensaje = $("#mensaje").val();



            $.ajax({

               type:'POST',

               url:'../mensaje',

               data:{'nombre':nombre, 'correo':correo, 'telefono':telefono,'mensaje':mensaje},

               success:function(data){
                   if(data==1){

    Swal.fire('Mensaje enviado. Te enviamos respuesta al correo')

                   }else{
    Swal.fire('Error')

                   }

               }

            });



        });

    </script>

    </body>

    </html>
