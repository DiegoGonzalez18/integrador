<section >
    <div class="container ">
      <div class="row no-gutters">
            @for($i = 0; $i <$nu; $i++)
        <div class="col-lg-4 col-sm-4">
          <a class="portfolio-box" href="acti/{{$actividades[$i]['id']}}">
            <img class="img-fluid" src=" {{$actividades[$i]['destacada']}}" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-50">
                    {{$actividades[$i]['titulos']}}
              </div>
              <div class="project-name" >
                {{$actividades[$i]['descripcion']}}
              </div>
            </div>
          </a>
        </div>
        @endfor

      </div>
    </div>
  </section>
