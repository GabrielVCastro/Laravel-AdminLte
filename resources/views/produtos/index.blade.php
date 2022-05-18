<x-dashboard.includes.header-painel></x-dashboard.includes.header-painel>


    <x-produtos.lista></x-produtos.lista>
    <a href="{{ url('/produtos/formulario') }}" class="btn btn-primary mb-4">Cadastrar</a>


   <div class="table-responsive">
       <table class="table" id="produtos">
           <thead>
               <tr>
                   <th>Ação</th>
                   <th>Código</th>
                   <th>Nome</th>
                   <th>E-mail</th>

               </tr>
           </thead>
           <tbody>

           </tbody>
       </table>
   </div>







<x-dashboard.includes.footer-painel></x-dashboard.includes.footer-painel>

@isset($clienteJs)
<script>

    $(document).ready( function () {
        $('#produtos').DataTable({
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.12.0/i18n/pt-BR.json"
        }
        });

    } );

</script>
@endisset
