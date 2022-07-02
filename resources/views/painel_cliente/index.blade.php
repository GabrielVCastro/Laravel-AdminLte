<x-dashboard.includes.header-painel></x-dashboard.includes.header-painel>
    <h1>{{ $titulo }}</h1>
        <div class="row">

            <div class="col-4">
                <p>Usuário: {{ $usuario['name'] }}</p>
                <p>E-mail: {{ $usuario['email'] }}</p>
                @isset($usuario['endereco_ban'])
                <img src="https://monkey.banano.cc/api/v1/monkey/{{ $usuario['endereco_ban'] }}" width="170" class="brand-image img-circle" alt="Monkey" >
                @endisset
            </div>

        </div>

        <form action="/clientes/update">
            <div class="row">
                <div class="col-4">
                    <label for="">Endereço Ban</label>
                    <input type="text" class="form-control" value="{{ $usuario['endereco_ban'] }}" name='endereco_ban'>
                </div>
                <div class="col-4">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control phone" value="{!! $usuario['telefone'] !!}" name='telefone' id='telefone'>
                </div>
                <div class="col-4">
                    <label for="celular">Celular</label>
                    <input type="text" class="form-control phone_with_ddd" value="{!! $usuario['celular'] !!}"  name='celular' id='celular'>
                </div>
                <div class="col-4">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" name='cidade' value="{!! $usuario['cidade'] !!}" id='cidade'>
                </div>
                <div class="col-4">
                    <label for="logradouro">Logradouro</label>
                    <input type="text" class="form-control" name='logradouro' value="{!! $usuario['logradouro'] !!}" maxlength="100" id='logradouro'>
                </div>
                <div class="col-2">
                    <label for="numero">Número</label>
                    <input type="number" class="form-control" maxlength="10" value="{!! $usuario['numero'] !!}" name='numero' id='numero'>
                </div>
                <div class="col-2">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" value="{!! $usuario['complemento'] !!}" name='complemento' id='complemento'>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-2" >
                    <button type="submit" class="btn btn-success btn-block ">Salvar</button>
                </div>
            </div>
        </form>




<x-dashboard.includes.footer-painel></x-dashboard.includes.footer-painel>


@include('painel_cliente.javascript')
