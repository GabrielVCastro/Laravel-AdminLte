@include('layouts/header')
    <section class="content">
        <div class="container-fluid">
        
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <form action="{{url("$rota")}}" method="POST">
                        @csrf
                        @if(isset($produto['id']))
                            <input type="hidden" name='id' value="{{$produto['id']}}">
                        @endif
                        <div class="form-group">
                            <label for="nome" class='col-form-label'>Nome:</label>  
                            <input type="text" class="form-control" id='nome' name="nome" value="{{isset($produto['nome'])?$produto['nome']:''}}" placeholder="Digite o Nome">
                        </div>
                        <div class="form-group">
                            <label for="nome" class='col-form-label'>Descricao:</label>  
                            <input type="text" class="form-control" id='descricao'  name="descricao" value="{{isset($produto['descricao'])?$produto['descricao']:''}}" placeholder="Digite o descricao">
                        </div>
                        <div class="form-group">
                            <label for="nome" class='col-form-label'>unidade:</label>  
                            <input type="text" class="form-control" id='unidade'  name="unidade" value="{{isset($produto['unidade'])?$produto['unidade']:''}}" placeholder="Digite um unidade Válida">
                        </div>
                        <div class="form-group">
                            <label for="quantidade" class='col-form-label'>Quantidade:</label>  
                            <input type="text" class="form-control" id='quantidade'  name="quantidade" value="{{isset($produto['quantidade'])?$produto['quantidade']:''}}" placeholder="Digite um E-mail Válido">
                        </div>
                        <div class="form-group">
                            <label for="preco">Preço:</label>
                            <input type="text" name='preco' id='preco'  value="{{isset($produto['preco'])?$produto['preco']:''}}" class="form-control date"  placeholder="Digite o Preço do Produto">
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary mr-2">{{$botao}}</button>
                            <a class="btn btn-default" href="{{url('/produto/listar')}}">Voltar</a>

                        </div>   
                      
                          
                    </form>
                </div>
            </div>
            </div>
        </div>
    </section>
@include('layouts/footer')
