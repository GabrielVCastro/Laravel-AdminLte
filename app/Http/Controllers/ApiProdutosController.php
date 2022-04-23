<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Produtos;

class ApiProdutosController extends Controller
{

    public function listar()
    {
        $produtos = Produtos::all();
        return json_encode($produtos);
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
            return  json_encode(['sucesso' => true, 'msg' => 'Produto Cadastrado Com Sucesso.']);
        }
        
    }

    public function editar(Request $request){

        $validacao = $this->validarFormulario($request);
        if($validacao!== null){
            return $validacao;
        }
        if(!isset($request['id']) &&  empty($request['id'])){
            return ['error' => true, 'msg' => 'Inisira um ID Para poder Editar o Produto'];
        }
        $request['preco'] = $this->converteParaDecimal($request['preco']);
        $editarProduto = Produtos::where('id', $request['id'])->update($request->all());
   
        if($editarProduto!==null){
            return json_encode(['sucesso' => 'Produto Editado com Sucesso.']);
        }
        
    }

    public function deletar(Request $request){

        $produtoDeletado = Produtos::destroy($request['id']);
        if($produtoDeletado === 1){
            return ['sucesso' => true, 'msg' => 'Produto Deletedo Com Sucesso.'];
        }else{
            return ['error' => true, 'msg' => 'Error ao Deletar o Produto'];
        }
    }

    
    public function validarFormulario($request){
        if(!isset($request['nome']) && empty($request['nome'])){
            return json_encode(['error' => true, 'msg'=>'Insira o Nome do Produto']);
        }

        if(!isset($request['unidade']) && empty($request['unidade'])){
            return json_encode(['error' => true, 'msg' => 'Insira a Unidade de Medida.']);
        }

        if(!isset($request['preco']) && empty($request['preco'])){
            return json_encode(['error' => true, 'error' => true,'msg' => 'Insira o Preço do Produto.']);
        }
        if(!isset($request['quantidade']) && empty($request['quantidade'])){
            return json_encode(['error' => true, 'msg' => 'Insira a Quantidade do Produto.']);
        }

        if(is_numeric($this->converteParaDecimal($request['preco'])) == false){
            return json_encode(['error' => true, 'msg' => 'Insira um Preço Corretamente.']);

        }
        if($request['preco'] <= 0.00){
            return json_encode(['error' => true, 'msg' => 'Insira um Preço maior que Zero.']);
        }
    }
  
}
