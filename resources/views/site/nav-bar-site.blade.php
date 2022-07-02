<div>

  <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="#" class="navbar-brand p-0">
                <h1 class="m-0"><img width="190" src="{{url('assets/img/logo/logoPrincipal.png')}}" alt=""></h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="#header-carousel" class="nav-item nav-link nav-texto active">Inicio</a>
                    <a href="#rifas"  class="nav-item nav-link nav-texto">Sorteios</a>
                    @if(!Auth::check())
                        <a href="{{url('/login')}}" class="nav-item nav-link nav-texto">Login</a>
                        <a href="{{url('/register')}}" target="_blank" class="nav-item nav-link nav-texto">Cadastrar</a>
                    @elseif (Auth::check())
                        <a href="{{url('/dashboard')}}" class="nav-item nav-link nav-texto">Painel</a>
                    @endif
                </div>
            </div>
        </nav>

        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{url('assets/img/carousel-1.jpg')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h1 class="display-1 text-white mt-md-4 animated zoomIn">Aceitamos BAN</h1>

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{url('assets/img/-2.jpg')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Aceitamos PIX</h1>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
