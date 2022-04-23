@include('layouts/header')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col mb-2">
                    <a class="btn btn-success" href='{{url('clientes/formulario/cadastrar')}}'>NOVO</a>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Ações</th>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Sobrenome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Data de Nascimento</th>
                      </tr>
                </thead>
                <tbody>
                    @foreach($clientes as  $item)
                    <tr>
                        <td scope="row">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Ações
                                </button>
                                <ul class="dropdown-menu p-0">
                                    <li><a class="btn btn-warning btn-block mb-1" href="{{url('/clientes/formulario/'.$item["id"])}}">Editar</a></li>
                                    <li><a class="btn btn-danger btn-block mb-1" href="{{url('/clientes/deletar/'.$item["id"])}}">Excluir</a></li>
                            
                                </ul>
                            </div>
                        </td>
                        <td >{{$item['id']}}</td>
                        <td>{{$item['nome']}}</td>
                        <td>{{$item['sobrenome']}}</td>
                        <td>{{$item['cpf']}}</td>
                        <td>{{substr($item['data_nascimento'],0,10)}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
          

        </div>
    </section>
@include('layouts/footer')