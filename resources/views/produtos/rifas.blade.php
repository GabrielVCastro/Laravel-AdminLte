<x-dashboard.includes.header-painel></x-dashboard.includes.header-painel>
    <h1>{{ $titulo }}</h1>

    <div class="table-responsive">
        <table class="table" id="produtos">
            <thead>
                <tr>
                    <th>Ação</th>
                    <th>Valor</th>
                    <th>Nome</th>

                    {{-- <th>Imagem</th> --}}

                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $item)
                    <tr>
                        <td>
                            <a href="/rifas/comprar/{{ $item['id'] }}" class="btn btn-success" da> <i class="fas fa-ticket-alt"></i> Comprar</a>
                        </td>
                        <td> R$ 1,99 </td>
                        <td>{{ $item['nome'] }}</td>

                        {{-- <td><img src="{{ url('imagens/rifas/rifa01.jpg') }}" width="100" height="100" alt="iPhone"></td> --}}
                        {{-- <td>{{ $item[''] }}</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

<x-dashboard.includes.footer-painel></x-dashboard.includes.footer-painel>


@include('produtos.javascript')
