@include('layouts/header')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col mb-2">
                    <a class="btn btn-success" href='{{url('produtos/formulario/cadastrar')}}'>NOVO</a>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Ações</th>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Unidade </th>
                        <th scope="col">Preço</th>
                        <th scope="col">Quantidade</th>
                      </tr>
                </thead>
                <tbody>
                    @foreach($produtos as  $item)
                    <tr>
                        <td scope="row">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Ações
                                </button>
                                <ul class="dropdown-menu p-0">
                                    <li><a class="btn btn-warning btn-block mb-1" href="{{url('/produtos/formulario/'.$item["id"])}}">Editar</a></li>
                                    <li><a class="btn btn-danger btn-block mb-1" href="{{url('/produtos/deletar/'.$item["id"])}}">Excluir</a></li>
                                </ul>
                            </div>
                        </td>
                        <td >{{$item['id']}}</td>
                        <td>{{$item['nome']}}</td>
                        <td>{{$item['descricao']}}</td>
                        <td>{{$item['unidade']}}</td>
                        <td>{{substr($item['quantidade'],0,10)}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
          

        </div>
    </section>
@include('layouts/footer')