<x-dashboard.includes.header-painel></x-dashboard.includes.header-painel>


    <x-clientes.lista></x-clientes.lista>

   <div class="table-responsive">
       <table class="table" id="myTable">
           <thead>
               <tr>
                   <th>Ação</th>
                   <th>Código</th>
                   <th>Nome</th>
                   <th>E-mail</th>

               </tr>
           </thead>
           <tbody>
            @foreach ($usuarios as $user )
                <tr>
                    <td>#</td>
                    <td>{{ $user['id'] }}</td>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['email'] }}</td>
                </tr>

            @endforeach
           </tbody>
       </table>
   </div>







<x-dashboard.includes.footer-painel></x-dashboard.includes.footer-painel>

@isset($clienteJs)
<script>

    $(document).ready( function () {
        $('#myTable').DataTable({
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.12.0/i18n/pt-BR.json"
        }
        });



    } );

</script>
@endisset
