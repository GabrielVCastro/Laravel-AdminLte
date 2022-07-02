<div>
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Sorteios</h5>
                <h1 class="mb-0">Tente Sua Sorte!</h1>
            </div>
            <div class="row g-5">s
s
                @foreach ($produtos as $item)
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                        <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                            <div class="service-icon">
                                <i class="fab fa-apple fa-4x"></i>
                            </div>
                            <h4 class="mb-3">{{ $item['nome'] }}</h4>
                            <p class="m-0">{{ $item['descricao'] }}</p>
                            <a class="btn btn-lg btn-primary rounded" href="/register">
                                <i class="fas fa-ticket-alt"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
