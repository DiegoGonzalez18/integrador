@extends('auth.contenido')

@section('login')
<style>
    .card.bg-primary {
        border-color:rgba(197, 0, 131,1);
        border-top-color:rgba(197, 0, 131,1);
        border-right-color: rgba(197, 0, 131,1);
        border-bottom-color: rgba(197, 0, 131,1);
        border-left-color: rgba(197, 0, 131,1);
    }
    .bg-primary {
        background-color:rgba(197, 0, 131,1) !important;
    }
    .btn-primary {
        color: #fff;
        background-color: rgba(197, 0, 131,1);
        border-color:rgba(197, 0, 131,1);
    }
    a {
        color: #fff;
        background-color:rgba(197, 0, 131,1) !important;
        border-color:#fff;
    }
</style>
<div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card-group mb-0">
          <div class="card p-4">
          <form class="form-horizontal was-validated" method="POST" action="{{ route('login')}}">
          {{ csrf_field() }}
              <div class="card-body">
              <h1>Acceder</h1>
              <p class="text-muted">Control de acceso al sistema</p>
              <div class="form-group mb-3{{$errors->has('usuario' ? 'is-invalid' : '')}}">
                <span class="input-group-addon"><i class="icon-user"></i></span>
                <input type="text" value="{{old('usuario')}}" name="usuario" id="usuario" class="form-control" placeholder="Usuario">
                {!!$errors->first('usuario','<span class="invalid-feedback">:message</span>')!!}
              </div>
              <div class="form-group mb-4{{$errors->has('password' ? 'is-invalid' : '')}}">
                <span class="input-group-addon"><i class="icon-lock"></i></span>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                {!!$errors->first('password','<span class="invalid-feedback">:message</span>')!!}
              </div>
              <div class="row">
                <div class="col-6">
                  <button type="submit" class="btn btn-primary px-4">Acceder</button>
                </div>
              </div>
            </div>
          </form>
          </div>
          <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
            <div class="card-body text-center">
              <div>
                <h2>Mujeres CTIAM</h2>
                <a href="/" target="_blank" class="btn btn-primary  mt-3">Ve a la Página</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
