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
        <div class="col-4">
            <label for="">Endereço Ban</label>
            <input type="text" class="form-control" value="{{ $usuario['endereco_ban'] }}" name='endereco_ban'>
        </div>


        <div class="col-2" >
            <button type="submit" class="btn btn-success btn-block mt-2">Salvar</button>
        </div>
    </form>


<x-dashboard.includes.footer-painel></x-dashboard.includes.footer-painel>


{{-- @include('painel.js') --}}
