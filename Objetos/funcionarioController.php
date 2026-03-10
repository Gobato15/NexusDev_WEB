<?php

include_once "../configs/database.php";
include_once "funcionario.php";

class funcionarioController{
    private $bd;
    private$Funcionario;

    public function __construct(){
        $banco =new Database();
        $this->bd=$banco->conectar();
        $this->Funcionario=new funcionario($this->bd);
    }
    public function index(){
        return $this->Funcionario->lerTodos();

    }
    public function pesquisaFuncionario($CPF){
        return $this->Funcionario>pesquisaFuncionario($CPF);
    }

}

