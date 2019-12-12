@include('contenido.head')
@include('contenido.menu')

@include('contenido.about')

  <!-- Services Section -->
  @include('contenido.services',compact('s','c'));
@include('contenido.contact')

  <!-- Footer -->
@include('contenido.footer')



