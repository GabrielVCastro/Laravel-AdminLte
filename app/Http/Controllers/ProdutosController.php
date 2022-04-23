<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Produtos;
use App\Models\CompraProdutos;

class ProdutosController extends Controller
{

    public function listar()
    {
        $produtos = Produtos::all()->toArray();
       
        if(count($produtos)>0){
            return view('produtos/lista')
            ->with("titulo",'Produto')
            ->with("produtos",$produtos);
        }  
        return view('produtos/lista')
        ->with("titulo",'Produto')
        ->with("produtos", 0);
    }


   public function abrirFormulario($id = false){
       
        if($id!==false && $id!=='cadastrar'){
            $produto= Produtos::find($id);
            $rota    = "/produtos/editar";
            $botao   = 'Editar';
            $titulo  = 'Editar Produto';

        }else{
            $rota    = "/produtos/cadastrar";
            $produto = false;
            $botao   = 'Cadastrar';
            $titulo  = 'Cadastrar Produto';

        }
  
        return view('produtos/formulario')
        ->with("produto", $produto)
        ->with("rota", $rota)
        ->with('botao', $botao  )
        ->with("titulo",$titulo);
    }

    
    public function cadastrar(Request $request)
    {
        $validacao = $this->validarFormulario($request);
        if($validacao!== null){
            return $validacao;
        }
        
        $request['preco'] = $this->converteParaDecimal($request['preco']);
        
        $criarProduto = Produtos::create($request->all());
        if($criarProduto !== null){
            
            return redirect()->back()->with('success',  'Produto Cadastrado Com Sucesso.');
        }

        
    }

    public function editar(Request $request){
        $validacao = $this->validarFormulario($request);
        if($validacao!== null){
            return $validacao;
        }
        if(!isset($request['id']) ||  empty($request['id'])){
            return redirect()->back()->with('error', 'Selecione Um Produto   ');   
         
        }
        $request['preco'] = $this->converteParaDecimal($request['preco']);
        $editarProduto = Produtos::where('id', $request['id'])->update([
            'nome'       => $request['nome'],
            'unidade'    => $request['unidade'],
            'preco'      => $request['preco'],
            'quantidade' => $request['quantidade'],
            'descricao'  => $request['descricao']
        ]);

        if($editarProduto == 1){
            return redirect()->back()->with('success', 'Produto Editado Com Sucesso.');   
        }else{
            return redirect()->back()->with('error', 'Error ao Cadastrar o Produto.');   
        }
        
    }

    public function deletar(Request $request){

        $compraAberta = CompraProdutos::where("produto_id", $request['id'])->first();
        if($compraAberta){
            $msg = ['tipo' =>  'error', 'msg' => 'Produto Vinculado na compra ID:'.$compraAberta->id];
            return redirect()->back()->with($msg['tipo'], $msg['msg']);
        }
        $produtoDeletado = Produtos::destroy($request['id']);

        if($produtoDeletado === 1){
            $msg = ['tipo' => 'success', 'msg' => 'Produto Deletedo Com Sucesso.'];
        }else{
            $msg = ['tipo' =>  'error', 'msg' => 'Error ao Deletar o Produto'];
        }

        return redirect()->back()->with($msg['tipo'], $msg['msg']);

    }

    
    public function validarFormulario($request){
        if(!isset($request['nome']) && empty($request['nome'])){
          $error = ['tipo' => 'error', 'msg'=>'Insira o Nome do Produto'];
        }

        if(!isset($request['unidade']) && empty($request['unidade'])){
            $error =  ['tipo' => 'error', 'msg' => 'Insira a Unidade de Medida.'];
        }

        if(!isset($request['preco']) && empty($request['preco'])){
            $error =  ['tipo' => 'error','msg' => 'Insira o Preço do Produto.'];
        }
        if(!isset($request['quantidade']) && empty($request['quantidade'])){
            $error =  ['tipo' => 'error', 'msg' => 'Insira a Quantidade do Produto.'];
        }

        if(is_numeric($this->converteParaDecimal($request['preco'])) == false){
            $error = ['tipo' => 'error', 'msg' => 'Insira um Preço Corretamente.'];

        }
        if($request['preco'] <= 0.00){
            $error =  ['tipo' => 'error', 'msg' => 'Insira um Preço maior que Zero.'];
        }

        if(isset($error)){
    
            return redirect()->back()->with($error['tipo'], $error['msg']);
               
        }   

    }

  
}
