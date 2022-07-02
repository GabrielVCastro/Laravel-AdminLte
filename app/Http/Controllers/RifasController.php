<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\RifasRepository;
use App\Repositories\Eloquent\ProdutosRepository;
use Illuminate\Support\Facades\Auth;

class RifasController extends Controller
{

    private $model;
    private $modelProduto;
    public function __construct(RifasRepository $model, ProdutosRepository $modelProduto)
    {
        $this->model = $model;
        $this->modelProduto = $modelProduto;
    }

    public function comprar(Request $request)
    {
        $dados = [
            'documento' => ($request->id+ Auth::user()->id),
            'status'    =>  'pendente',
            'data_confirmacao' => date('Y-m-d H:i:s'),
            'produto_id' => $request->id,
            'usuario_id' => Auth::user()->id
        ];

        $retorno = $this->model->save($dados);

       if($retorno){
        return redirect('/rifas')->with('success', 'Rifa Efetuada con sucesso! Aguarde a confirmação do depósito.');

       }
    }
    public function listarRifas(){
        $produtos = $this->modelProduto->all();
            return view('rifas.listaCompra',[
                'titulo' => 'Boa Sorte!',
                'produtos' => $produtos,
                'qrcode' => 13117893679
            ]);
    }

    public function listarRifaCompradas(){
        $rifas = $this->model->get_all_id(Auth::user()->id);
        foreach ($rifas as $key => $value) {
            $rifas[$key]['documento'] = $value->produtos['id'] + Auth::user()->id;
        }
        return view('rifas.listaRifas',[
            'titulo' => 'Minhas RIfas',
            'rifas' => $rifas
        ]);
    }

    public function excluirRifa($id)
    {
        $resposta = $this->model->delete($id);
        if($resposta){
            return redirect('/rifas/listar')->with('success', 'Rifa excluida!');
        }


    }

}
