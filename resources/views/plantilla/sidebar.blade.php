<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">


            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-bag"></i>Imagenes</a>
                <ul class="nav-dropdown-items">
                    <li  @click="menu=1" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-bag"></i>Imagen</a>
                    </li>

                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-bag"></i>Servicios</a>
                <ul class="nav-dropdown-items">
                    <li  @click="menu=100" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-bag"></i>Servicios</a>
                    </li>
                    <li  @click="menu=101" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-bag"></i>Actualizar Servicios</a>
                    </li>
                    <li  @click="menu=102" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-bag"></i>Asignar Imagen</a>
                    </li>
                     <li  @click="menu=103" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-bag"></i>Asignar Archivo</a>
                    </li>

                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-bag"></i>Actividades</a>
                <ul class="nav-dropdown-items">
                    <li  @click="menu=200" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-bag"></i>Actividades</a>
                    </li>
                    <li  @click="menu=201" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-bag"></i>Actualizar Actividades</a>
                    </li>
                    <li  @click="menu=202" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-bag"></i>Asignar Imagen</a>
                    </li>
                     <li  @click="menu=203" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-bag"></i>Asignar Archivo</a>
                    </li>

                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-wallet"></i>Usuarios</a>
                <ul class="nav-dropdown-items">
                    <li  @click="menu=2" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-wallet"></i> Usuarios</a>
                    </li>
                    <li  @click="menu=10" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-wallet"></i>Archivos</a>
                    </li>

                </ul>
            </li>



            <li @click="menu=11" class="nav-item">
                <a class="nav-link" href="#"><i class="icon-book-open"></i> Mensajes <span class="badge badge-danger">
                        {{session('mensajes')}}</span></a>
            </li>
            <li @click="menu=30" class="nav-item">
                    <a class="nav-link" href="#"><i class="icon-book-open"></i> Mensajes Respondidos</a>
                </li>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
