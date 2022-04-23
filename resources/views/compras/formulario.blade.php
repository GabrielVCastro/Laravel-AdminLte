@include('layouts/header')
    <section class="content">
        <div class="container-fluid">
     
            <form action="{{url("$rota")}}" method="POST">
                @csrf
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            @if(isset($compras['id']))
                                <input type="hidden" name='id' value="{{$compra['id']}}">
                            @endif
                            <label for="nome" class='col-form-label'>Nome:</label> 
                            <select name="forma_pagamento" class="form-control" id="forma_pagamento">
                                <option value="Dinheiro">Dinheiro</option>
                                <option value="Débito" selected>Débito</option>
                                <option value='Crédito' selected>Crédito</option>
                                <option value='Vale Refeição' selected>Vale Refeição</option>
                                <option value='Pix' selected>Pix</option>
                                @if(isset($compras['forma_pagamento']))
                                <option  value="{{$compras['forma_pagamento']}}" selected>{{$compras['forma_pagamento']}}</option>
                                @endif
                                @if(!isset($compras['forma_pagamento']))
                                <option selected>Selecione...</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group mt-1 col-12 col-md-6">
                            <label for="">Valor Recebido</label>
                            <input type="text" class="form-control" id='nome' name="nome"  placeholder="Digite o Valor">
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <th>#</th>
                                    <th>Forma de Pagamento</th>
                                    <th>Valor</th>
                                </thead>
                                <tbody>
                                    <script>
                                        for (let i = 0; I < PAGAMENTOS.length; i++) {
                                            <tr>
                                                <td scope="row"><script> PAGAMENTOS </script></td>
                                                <td><script>  </script></td>
                                                <td><script> PAGAMENTOS </script></td>
                                                
                                            </tr>                                            
                                        }
                                     
                                    </script>
                                </tbody>
                            </table>
                        </div>
                        <div class="ml-1 d-grid gap-2">
                            <button type="submit" class="btn btn-primary mr-2">{{$botao}}</button>
                            <a class="btn btn-default" href="{{url('/comprass/listar')}}">Voltar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    
@include('layouts/footer')
