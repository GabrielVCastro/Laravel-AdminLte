<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Clientes;


class ApiClientesController extends Controller
{   
    public function listar()
    {
        $todosClientes = Clientes::all();

        if(count($todosClientes)>0){
            return json_encode($todosClientes);
        }
    }

    public function cadastrar(Request $request)
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
        $clienteCadastrado =  $this->verificarClienteCadastrado($request->all());
      
        if($clienteCadastrado!==null){
            return json_encode(['error' => true, 'msg' => 'E-mail ou Cpf já registrado']);
        }

        $request['cpf']  =  $this->limparCpf($request['cpf']);
        $cadastraCliente = Clientes::create($request->all());

        if($cadastraCliente !== null){
            return json_encode(['sucesso'=> true, 'msg' => 'Cliente Cadastrado com Sucesso.']);
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

        $clienteEditado = Clientes::where('id', $request['id'])->update($request->all());
        if($clienteEditado !== 0){
            return json_encode(['sucesso' => 'Cliente Editado Com Sucesso.']);
        }else{
            return  json_encode(['error' => true, 'msg' => 'Cliente Não encontrado.']);
        }
    }

    public function deletar(Request $request)
    {
        $clienteDeletado = Clientes::destroy($request['id']);
        if($clienteDeletado === 1){
            return ['sucesso' => true, 'msg' => 'Cliente Deletedo Com Sucesso.'];
        }else{
            return ['error' => true, 'msg' => 'Error ao Deletar o Cliente'];
        }
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
            return json_encode(['error'=> true , 'msg' => 'Digite Seu Nome Correto. (Minímo 3 letras)']);
        }
       
        if(strlen($request['sobrenome']) < 3 || is_numeric($request['sobrenome'])){
            return json_encode(['error'=> true , 'msg' => 'Digite Seu Sobre Nome Correto. (Minímo 3 letras)']);
        }

        if(!$this->validaCPF($request['cpf'])){
            return json_encode(['error' => 'Insira Um CPF Válido']);
        }

        if(!isset($request['email']) || empty($request['email']) || !filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
            return json_encode(['error'=> true , 'msg' => 'Digite um E-mail Correto.']);
        }
     
        if(!isset($request['data_nascimento']) || empty($request['data_nascimento']) ) {
            return json_encode(['error'=> true , 'msg' => 'Digite uma Data de Nascimento.']);

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
