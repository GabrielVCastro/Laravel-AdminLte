<x-dashboard.includes.header-painel></x-dashboard.includes.header-painel>
    <h1>{{ $titulo }}</h1>

    <div class="table-responsive">
        <table class="table" id="produtos">
            <thead>
                <tr>
                    <th>Ação</th>
                    <th>Valor</th>
                    <th>Nome</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $item)
                    <tr>
                        <td>
                            <a onclick="$('#qrcodeModal').modal('show')" class="btn btn-success" > <i class="fas fa-ticket-alt"></i> Comprar</a>
                        </td>
                        <td> R$ 1,99 </td>
                        <td>{{ $item['nome'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@include('rifas.modalQrcode')

<x-dashboard.includes.footer-painel></x-dashboard.includes.footer-painel>


@include('rifas.javascript')
