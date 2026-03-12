<?php

class Funcionario
{
    public $nome;
    public $email;
    public $senha;
    public $cargo;
    public $CPF;
    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    public function lerTodos()
    {
        $sql = "SELECT * FROM funcionario";
        $resultado = $this->bd->query($sql);

        return $resultado->fetchAll(PDO::FETCH_OBJ);
    }

    public function pesquisaFuncionario($CPF)
    {
        $sql = "SELECT * FROM funcionario WHERE CPF = :CPF";
        $resultado = $this->bd->prepare($sql);
        $resultado->bindParam(":CPF", $CPF);
        $resultado->execute();

        return $resultado->fetchAll(PDO::FETCH_OBJ);
    }

    public function cadastrar()
    {
        $sql = "INSERT INTO funcionario(nome, email, senha, cargo, CPF) 
                VALUES(:nome, :email, :senha, :cargo, :CPF)";
        $senha_hash = password_hash($this->senha, PASSWORD_DEFAULT);
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":senha", $senha_hash, PDO::PARAM_STR);
        $stmt->bindParam(":cargo", $this->cargo, PDO::PARAM_STR);
        $stmt->bindParam(":CPF", $this->CPF, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function atualizar()
    {
        $senha_hash = password_hash($this->senha, PASSWORD_DEFAULT);
        $sql = "UPDATE funcionario SET nome = :nome, email = :email, senha = :senha,
                cargo = :cargo WHERE CPF = :CPF";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":senha", $senha_hash, PDO::PARAM_STR);
        $stmt->bindParam(":cargo", $this->cargo, PDO::PARAM_STR);
        $stmt->bindParam(":CPF", $this->CPF, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function buscafuncionario($CPF)
    {
        $sql = "SELECT * FROM funcionario WHERE CPF = :CPF";
        $resultado = $this->bd->prepare($sql);
        $resultado->bindParam(':CPF', $CPF);
        $resultado->execute();

        return $resultado->fetch(PDO::FETCH_OBJ);
    }
}