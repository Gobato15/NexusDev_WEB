<?php

include_once "configs/database.php";
include_once "Funcionario.php";

class FuncionarioController{
    private $bd;
    private$Funcionario;

    public function __construct(){
        $banco =new Database();
        $this->bd=$banco->conectar();
        $this->Funcionario=new Funcionario($this->bd);
    }
    public function index(){
        return $this->Funcionario->lerTodos();

    }
    public function pesquisaFuncionario($nome){
        return $this->Funcionario>pesquisaFuncionario($nome);
    }

}

