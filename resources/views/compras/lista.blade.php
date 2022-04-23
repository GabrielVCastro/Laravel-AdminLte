@include('layouts/header')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col mb-2">
                    <a class="btn btn-success" href='{{url('compras/formulario/cadastrar')}}'>NOVO</a>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Ações</th>
                        <th scope="col">#</th>
                        <th scope="col">Valor Total</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Nome do Produto</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Un. Médida</th>
              
                      </tr>
                </thead>
                <tbody>
                    @foreach($compras as  $item)
                    <tr>
                        <td scope="row">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Ações
                                </button>
                                <ul class="dropdown-menu p-0">
                                    <li><a class="btn btn-warning btn-block mb-1" href="{{url('/compras/formulario/'.$item->id)}}">Editar</a></li>
                                    <li><a class="btn btn-danger btn-block mb-1" href="{{url('/compras/deletar/'.$item->id)}}">Excluir</a></li>
                            
                                </ul>
                            </div>
                        </td>
                        <td >{{$item->id}}</td>
                        <td>{{$item->valor_total}}</td>
                        <td>{{$item->nome}}</td>
                        <td>{{$item->nome_produto}}</td>
                        <td>{{$item->preco}}</td>
                        <td>{{$item->unidade}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
          

        </div>
    </section>
@include('layouts/footer')