<x-dashboard.includes.header-painel></x-dashboard.includes.header-painel>
    <h1>{{ $titulo }}</h1>
   <div class="table-responsive">
       <table class="table" id="usuarios">
           <thead>
               <tr>
                   <th>Ação</th>
                   <th>Código</th>
                   <th>Nome</th>
                   <th>E-mail</th>
                   <th>N° de Rifas</th>
               </tr>
           </thead>
           <tbody>
            @foreach ($usuarios as $user )
                <tr>
                    <td>#</td>
                    <td>{{ $user['id'] }}</td>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ count($user->rifas) }}</td>
                </tr>
            @endforeach
           </tbody>
       </table>
   </div>

<x-dashboard.includes.footer-painel></x-dashboard.includes.footer-painel>

@include('clientes.js')
