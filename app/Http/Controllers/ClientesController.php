<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Clientes;


class ClientesController extends Controller
{   
    public function listar()
    {
        $todosClientes = Clientes::all()->toArray();
        foreach($todosClientes as $key => $cliente){
            $todosClientes[$key]['cpf'] = $this->montarCpf($cliente['cpf']);
            $todosClientes[$key]['data_nascimento'] =$this->formatarDataBRL($cliente['data_nascimento']);
        }
        if(count($todosClientes)>0){
            return view('clientes/lista')
            ->with("titulo",'Cliente')
            ->with("clientes",$todosClientes);
        }   
    }
    public function abrirFormulario($id = false){
        
        if($id!==false && $id!=='cadastrar'){
            $cliente = Clientes::find($id)->toArray();
            $rota    = "/clientes/editar";
            $botao   = 'Editar';
            $titulo  = 'Editar Cliente';
        }else{
            $rota    = "/clientes/cadastrar";
            $cliente = false;
            $botao   = 'Cadastrar';
            $titulo  = 'Cadastra Cliente';

        }
  
        $cliente['data_nascimento'] = substr($cliente['data_nascimento'], 0,10);
        return view('clientes/formulario')
        ->with("cliente", $cliente)
        ->with("rota", $rota)
        ->with('botao', $botao)
        ->with("titulo",$titulo);
    }

    public function cadastrar(Request $request)
    {
        $validacao = $this->validarFormulario($request);
        if($validacao!==null){
            return redirect()->back()->with('error', $validacao['msg']);   
        }

        $dataNascimento = $this->calcularIdade($request['data_nascimento']);
        if($dataNascimento === true){
            return redirect()->back()->with('error', 'Cliente Menor de Idade.');   

        }
        $request['data_nascimento'] = $dataNascimento;
        $clienteCadastrado =  $this->verificarClienteCadastrado($request->all());
      
        if($clienteCadastrado!==null){
            return redirect()->back()->with('error', 'E-mail ou Cpf já registrado');   
        }

        $request['cpf']  =  $this->limparCpf($request['cpf']);
        $cadastraCliente = Clientes::create($request->all());

        if($cadastraCliente !== null){
            return redirect()->back()->with('success', 'Cliente Cadastrado com Sucesso.');   
        }

    }

    public function editar(Request $request)
    {
        $validacao = $this->validarFormulario($request);
        if($validacao!==null){
            return $validacao;
        }

        $dataNascimento = $this->calcularIdade($request['data_nascimento']);
        if($dataNascimento === true){
            return json_encode(['error' => true, 'msg' => 'Cliente Menor de Idade.']);
        }
        $request['data_nascimento'] = $dataNascimento;
        $request['cpf']  =  $this->limparCpf($request['cpf']);

        $clienteCadastrado =  $this->verificarClienteParaEditar($request->all());
        if($clienteCadastrado!==null){
            return json_encode(['error' => true, 'msg' => 'E-mail ou Cpf já registrado']);
        }

        $clienteEditado = Clientes::where('id', $request['id'])->update([
            "nome" => $request['nome'],
            "sobrenome" => $request['sobrenome'],
            "cpf" => $request['cpf'],
            "email" => $request['email'],
            "data_nascimento" => $request['data_nascimento']
        ]);
        if($clienteEditado !== 0){
            return redirect()->back()->with('success', 'Cliente Alterado com Sucesso.');   
        }else{
            return redirect()->back()->with('error', 'Error ao Cadastrar o Cliente.');   
        }

    }

    public function deletar(Request $request)
    {
        $clienteDeletado = Clientes::destroy($request['id']);
        if($clienteDeletado === 1){
            $msg = ['tipo' => 'success', 'msg' => 'Cliente Deletedo Com Sucesso.'];
        }else{
            $msg = ['tipo' =>  'error', 'msg' => 'Error ao Deletar o Cliente'];
        }
        return redirect()->back()->with( $msg['tipo'], $msg['msg']);   

    }


    public function verificarClienteCadastrado($request)
    {
        $cpf =  $this->limparCpf($request['cpf']);
        $procurarCliente = Clientes::where('cpf', $cpf)
                            ->orWhere('email', $request['email'])
                            ->first();
        return $procurarCliente;
     
    }

    public function verificarClienteParaEditar($request)
    {
        $cpf =  $this->limparCpf($request['cpf']);
        $procurarCliente = Clientes::where('id','<>', $request['id'])
                            ->where('cpf', $cpf)
                            ->first();
        if($procurarCliente == null){
            $procurarCliente = Clientes::where('id','<>', $request['id'])
            ->where('email', $request['email'])
            ->first();
        }

        return $procurarCliente;
     
    }

    public function validarFormulario(Request $request){
        if(strlen($request['nome']) < 3 || is_numeric($request['nome'])){
            
            return  ['error'=> true , 'msg' => 'Digite Seu Nome Correto. (Minímo 3 letras)'];
        }
       
        if(strlen($request['sobrenome']) < 3 || is_numeric($request['sobrenome'])){
            return ['error'=> true , 'msg' => 'Digite Seu Sobre Nome Correto. (Minímo 3 letras)'];
        }

        if(!$this->validaCPF($request['cpf'])){
            return ['error' => 'Insira Um CPF Válido'];
        }

        if(!isset($request['email']) || empty($request['email']) || !filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
            return ['error'=> true , 'msg' => 'Digite um E-mail Correto.'];
        }
     
        if(!isset($request['data_nascimento']) || empty($request['data_nascimento']) ) {
            return ['error'=> true , 'msg' => 'Digite uma Data de Nascimento.'];

        }
    }

    
    function calcularIdade($data)
    {
        $data = str_replace("/", "-", $data);
        $data = date('Y-m-d', strtotime($data));
        list($ano, $mes, $dia) = explode('-', $data);
        $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
        $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
        if($idade < 18){
            return true;
        }
        return $data;
    }
    
}
