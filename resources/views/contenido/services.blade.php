

<section class="page-section services" id="services">

    <div class="container">
      <h2 class="text-center mt-0">Servicios</h2>
      <hr class="divider my-4">
      <div class="row">
            @for($i = 0; $i <$c; $i++)
            <div class="col-lg-4 col-md-6 text-center">
                    <div class="mt-5">

                      <a href="servicioes/{{$s[$i]['id']}}"><img src="{{$s[$i]['destacada']}}" </a>
                      <h3 class="h4 mb-2">{{$s[$i]['titulos']}}</h3>
                      <p class="text-muted mb-0">{{$s[$i]['descripcion']}}</p>
                    </div>
                  </div>

                  @endfor


      </div>
    </div>
  </section>
