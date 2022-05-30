    <x-dashboard.includes.header-painel></x-dashboard.includes.header-painel>
    <div class="row">
        @if (Auth::user()->adm)
        <div class="col-lg-3 col-6 mt-3">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $qtdUsuarios }}</h3>

                <p>Usuários</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="/clientes" class="small-box-footer">Informações:<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endif
        <div class="col-lg-3 col-6 mt-3">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $rifasUsuario }}</h3>

                <p>Muinhas Rifas</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-ticket-alt"></i>
              </div>
              <a href="/rifas/listar" class="small-box-footer">Informações: <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <x-dashboard.includes.footer-painel></x-dashboard.includes.footer-painel>


