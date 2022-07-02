<x-dashboard.includes.header-painel></x-dashboard.includes.header-painel>
    <h1>{{ $titulo }}</h1>

    <div class="table-responsive">
        <table class="table" id="produtos">
            <thead>
                <tr>
                    <th>Ação</th>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Preço Menor</th>
                    <th>Preço Maior</th>
                    {{-- <th>Imagem</th> --}}

                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $item)
                    <tr>
                        <td>
                            <a href="/produtos/excluir/{{ $item['id'] }}" class="btn btn-danger" da> <i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item['nome'] }}</td>
                        <td>{{ $item['preco_menor'] }}</td>
                        <td>{{ $item['preco_maior'] }}</td>
                        {{-- <td><img src="{{ url('imagens/rifas/rifa01.jpg') }}" width="100" height="100" alt="iPhone"></td> --}}
                        {{-- <td>{{ $item[''] }}</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<x-dashboard.includes.footer-painel></x-dashboard.includes.footer-painel>


@include('produtos.javascript')
