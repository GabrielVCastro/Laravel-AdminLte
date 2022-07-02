<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Redirect;
use Illuminate\Support\Facades\Storage;

use App\Repositories\Eloquent\ProdutosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\QRCodeController;



class ProdutosController extends Controller
{
    private $model;
    public function __construct(ProdutosRepository $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $produtos = $this->model->all();
        $this->checkAdm();
        foreach ($produtos as $key => $value) {
            $produtos[$key]['preco_menor'] =  $this->converteParaReal($value['preco_menor']);
            $produtos[$key]['preco_maior'] =  $this->converteParaReal($value['preco_maior']);
        }

        return view('produtos/lista', [
            'produtoJs'=> true,
            'produtos' => $produtos,
            'titulo'   => 'Lista de Produtos'

        ]);
    }

    public function abrirFormulario()
    {
        $this->checkAdm();
        return view("produtos/formulario",[
            'titulo'    => 'Cadastro de Produtos'

        ]);
    }

    public function cadastrar(Request $request){
        $this->checkAdm();
        $formularioProduto = $request->all();
        foreach ($formularioProduto as $key => $value) {
            if($formularioProduto[$key]==null || $formularioProduto[$key] == ''){
                return redirect('/produtos/formulario')->with('error', 'Insira: '.$key);
            }
        }

        $produto = $this->model->save([
            'nome'        =>  $formularioProduto['nome'],
            'descricao'   =>  $formularioProduto['descricao'],
            'preco_menor' =>  $this->converteParaDecimal($formularioProduto['preco_maior']),
            'preco_maior' =>  $this->converteParaDecimal($formularioProduto['preco_menor'])

        ]);

        return redirect('/produtos')->with('success', 'Cadastrado com sucesso');
    }


    public function delete($id){
        $this->checkAdm();
        $retorno = $this->model->delete($id);
        return redirect('/produtos')->with('success', 'Excluido com sucesso');

    }


    public function comprarRifa($id){


    }

    public function gerarPixPagamento(){

    }

}
