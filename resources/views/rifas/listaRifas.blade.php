<x-dashboard.includes.header-painel></x-dashboard.includes.header-painel>
    <h1>{{ $titulo }}</h1>

    <div class="table-responsive">
        <table class="table" id="produtos">
            <thead>
                <tr>
                    <th>Cancelar</th>
                    <th>Documento</th>
                    <th>Status</th>
                    <th>Nome</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rifas as $item)
                    <tr>
                        <td>
                            <a onclick='perguntaCancelarRifa("/rifas/excluir/{{ $item["id"] }}")' class="btn btn-danger"> <i class="fa fa-trash"></i></a>
                        </td>
                        <td> {{ $item['documento'] }} </td>
                        <td>
                            @if($item['status'] == 'Pentente')
                                <span class="badge rounded-pill bg-warning text-dark"> {{ $item['status'] }}</span>
                            @endif
                        </td>
                        <td>{{ $item->produtos->nome }}</td>
                        <td>R$ 1,99 </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

<x-dashboard.includes.footer-painel></x-dashboard.includes.footer-painel>


@include('produtos.javascript')
