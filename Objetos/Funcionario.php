<?php

Class Funcionario{

    public $nome;
    public $email;
    public $senha;
    public $cargo;
    public $CPF;
    private $bd;


    public function __construct($bd){
        $this->bd = $bd;
    }
    public function lerTodos(){
        $sql = "SELECT * FROM Funcionario";
        $resultado = $this->bd->query($sql);
        $resultado->execute();

        return $resultado->fetchall(PDO::FETCH_OBJ);

    }
    public function pesquisaFuncionario($nome){
        $sql = "SELECT * FROM Funcionario WHERE nome = :nome";
        $resultado = $this->bd->prepare($sql);
        $resultado->bindParam(":nome", $nome);
        $resultado->execute();

        return $resultado->fetchall(PDO::FETCH_OBJ);

    }


}

