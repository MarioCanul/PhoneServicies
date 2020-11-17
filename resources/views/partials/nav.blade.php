<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    @guest
    <li class="nav-item active">
        <a class="nav-link" href="/login">Login <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('phone.Servicios')}}">Servicio</a>
      </li>
      @else
      <li class="nav-item">
        <a class="nav-link" href="#"  onclick="event.preventDefault();
         document.getElementById('logout-form').submit();"
         >Cerrar Sesion</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('phone.index')}}">Crear Pedido</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('phone.ServiciosPagados')}}">Ver Servicios</a>
      </li>
      @endguest

    </ul>
  </div>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
 </form>
