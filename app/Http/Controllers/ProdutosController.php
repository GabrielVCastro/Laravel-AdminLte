<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Redirect;

use App\Repositories\Eloquent\ProdutosRepository;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{

    public function index(ProdutosRepository $model)
    {
        $produtos = $model->all();

        return view('produtos/lista', [
            'produtoJs' => true,
            'produtos' => $produtos
        ]);
    }

    public function abrirFormulario()
    {
        $this->checkAdm();
        return view("produtos/formulario", [
            'titulo'    => 'Produtos',
            'produtoJs' => true
        ]);
    }

    public function cadastrar(ProdutosRepository $model, Request $request)
    {
        $this->checkAdm();
        $formularioProduto = $request->all();
        $produto = $model->save([
            'nome'        =>  $formularioProduto['nome'],
            'descricao'   =>  $formularioProduto['descricao'],
            'preco_menor' =>  $this->converteParaDecimal($formularioProduto['preco_maior']),
            'preco_maior' =>  $this->converteParaDecimal($formularioProduto['preco_menor']),
            'imagem'      =>  $formularioProduto['imagem']

        ]);

        $request->session('success')->now('success', 'Cadastrado com Sucesso!');
        $produtos = $model->all();
        return view('produtos/index', [
            'produtoJs' => true,
            'produtos' => $produtos
        ]);
    }
}
