<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Clientes;
use App\Models\Produtos;
use App\Models\Compras;
use App\Models\CompraProdutos;
use App\Models\Pagamentos;
use Illuminate\Support\Facades\DB;


class ComprasController extends Controller
{

    public function salvar(Request $request)
    {
        
        date_default_timezone_set('America/Sao_Paulo');
        $produtos_id     = $request[2]['produto_id'];
        $formaPagamentos = $request[1]['pagamentos'];
        $cliente_id      = $request[0]['cliente_id'];
        $troco           = $request[0]['troco'];
        $valor_total     = $request[0]['valor_total'];
        $valor_pago      = $request[0]['valor_pago'];

        $validacao = $this->validarJsonCompra($request);
        if($validacao !== null){
            return $validacao;
        }

        $compra = Compras::create([
            'valor_total' => $valor_total,
            'cliente_id'  => $cliente_id,
            'data'        => date("Y-m-d H:i:s")
        ]);
        
        for($i = 0; $i < count($produtos_id); $i++){
            CompraProdutos::create([
                'produto_id'=> $produtos_id[$i],
                'compra_id' => $compra['id']
            ]);
        }

        for($i = 0; $i < count($formaPagamentos); $i++){
            Pagamentos::create([
                'valor' => $formaPagamentos[$i]['valor'],
                'troco' => $formaPagamentos[$i]['troco'],
                'forma_pagamento' => $formaPagamentos[$i]['forma_pagamento'],
                'compra_id'       => $compra['id']
            ]);
        }

        return json_encode(['sucesso' =>  true, 'msg'=>'Compra Realizada com Sucesso.']);

    }

    public function abrirFormulario($id = false){
        
        if($id!==false && $id!=='cadastrar'){
            $compra = Compras::find($id);
            $rota    = "/compras/editar";
            $botao   = 'Editar';
            $titulo  = 'Editar Compra';
        }else{
            $rota    = "/compras/cadastrar";
            $compra = false;
            $botao   = 'Cadastrar';
            $titulo  = 'Cadastra Compras';

        }

     
        return view('compras/formulario')
        ->with("compras", $compra)
        ->with("rota", $rota)
        ->with('botao', $botao)
        ->with("titulo",$titulo);
    }
    
    

    public function listarTodasCompras(){
        
        $todasCompras = DB::table('compras')
                        ->join('compra_produtos', 'compra_produtos.compra_id','=', 'compras.id') 
                        ->join('produtos', 'produtos.id','=', 'compra_produtos.produto_id')
                        ->join('pagamentos', 'pagamentos.compra_id','=', 'compras.id')
                        ->join('clientes', 'compras.cliente_id','=', 'cliente_id')
                        ->select(
                            'compras.id',
                            'compras.valor_total',
                            'clientes.nome',
                            'produtos.nome as nome_produto',
                            'produtos.preco',
                            'produtos.unidade'
                            )
                        ->groupBy(
                            'compras.id',
                            'compras.valor_total',
                            'clientes.nome',
                            'nome_produto',
                            'produtos.preco',
                            'produtos.unidade'
                            )
                        ->get();

        if(count($todasCompras)>0){
            return view('compras/lista')
            ->with("titulo",'Compras')
            ->with("compras",$todasCompras);
        }   
                  
    }

    public function listarCompra($cliente_id){
        $todasCompras = DB::table('compras')
                        ->join('compra_produtos', 'compra_produtos.compra_id','=', 'compras.id') 
                        ->join('produtos', 'produtos.id','=', 'compra_produtos.produto_id')
                        ->join('pagamentos', 'pagamentos.compra_id','=', 'compras.id')
                        ->join('clientes', 'compras.cliente_id','=', 'cliente_id')
                        ->where('clientes.id', $cliente_id)
                        ->select(
                            'compras.id',
                            'compras.valor_total',
                            'clientes.nome',
                            'produtos.nome as nome_produto',
                            'produtos.preco',
                            'produtos.unidade'
                            )
                        ->groupBy(
                            'compras.id',
                            'compras.valor_total',
                            'clientes.nome',
                            'nome_produto',
                            'produtos.preco',
                            'produtos.unidade'
                            )
                        ->get();
         return view('compras/lista')->with('compras', $todasCompras);
         
    }



    public function validarJsonCompra($request)
    {
        if(!isset($request[0]['cliente_id'])){
            return json_encode(['error'=> true, 'msg'=>'Insira um Cliente.']);
        }
        $cliente = Clientes::find($request[0]['cliente_id']);
        if($cliente === null){
            return json_encode(['error'=> true, 'msg'=>'Insira um Cliente Válido.']);
        }
        if(!isset($request[0]['valor_pago'])){
            return json_encode(['error' => true, 'msg' => 'Valor Pago Não Existe.']);

        }
        if(!isset($request[0]['valor_total'])){
            return json_encode(['error' => true, 'msg' => 'Valor Total Não Exite.']);

        }
        if($this->converteParaDecimal($request[0]['valor_pago']) <  $this->converteParaDecimal($request[0]['valor_total'])){
            return json_encode(['error' => true, 'msg' => 'Valor Pago inferior ao valor Total']);
        }

        if(count($request[1]['pagamentos']) == 0 || !isset($request[1]['pagamentos'])){
            return json_encode(['error' => true, 'msg' => 'Insira Um Pagamento']);
        }

        if(count($request[2]['produto_id']) == 0 || !isset($request[2]['produto_id'])){
            return json_encode(['error' => true, 'msg' => 'Insira os Produtos']);
        }

        for($i=0; $i< count($request[2]['produto_id']); $i++){
            $produto = Produtos::find($request[2]['produto_id'][$i]);
            if($produto === null){
                return json_encode(['error' => true, 'msg' => 'Produto ID incorreto: '.$request[2]['produto_id'][$i]]);
            }
        }
    }

}
