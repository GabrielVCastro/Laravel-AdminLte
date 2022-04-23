@include('layouts/header')
    <section class="content">
        <div class="container-fluid">
        
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <form action="{{url("$rota")}}" method="POST">
                        @csrf
                        @if(isset($cliente['id']))
                            <input type="hidden" name='id' value="{{$cliente['id']}}">
                        @endif
                        <div class="form-group">
                            <label for="nome" class='col-form-label'>Nome:</label>  
                            <input type="text" class="form-control" id='nome' name="nome" value="{{isset($cliente['nome'])?$cliente['nome']:''}}" placeholder="Digite o Nome">
                        </div>
                        <div class="form-group">
                            <label for="nome" class='col-form-label'>Sobrenome:</label>  
                            <input type="text" class="form-control" id='sobrenome'  name="sobrenome" value="{{isset($cliente['sobrenome'])?$cliente['sobrenome']:''}}" placeholder="Digite o Sobrenome">
                        </div>
                        <div class="form-group">
                            <label for="nome" class='col-form-label'>CPF:</label>  
                            <input type="text" class="form-control" id='cpf'  name="cpf" value="{{isset($cliente['cpf'])?$cliente['cpf']:''}}" placeholder="Digite um Cpf Válido">
                        </div>
                        <div class="form-group">
                            <label for="email" class='col-form-label'>E-mail:</label>  
                            <input type="text" class="form-control" id='email'  name="email" value="{{isset($cliente['email'])?$cliente['email']:''}}" placeholder="Digite um E-mail Válido">
                        </div>
                        <div class="form-group">
                            <label for="preco">Data de Nascimento:</label>
                            <input type="date" name='data_nascimento' id='data_nascimento'  value="{{isset($cliente['data_nascimento'])?$cliente['data_nascimento']:''}}" class="form-control date"  placeholder="Digite a Data do Nascimento">
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary mr-2">{{$botao}}</button>
                            <a class="btn btn-default" href="{{url('/clientes/listar')}}">Voltar</a>

                        </div>   
                      
                          
                    </form>
                </div>
            </div>
            </div>
        </div>
    </section>
@include('layouts/footer')
