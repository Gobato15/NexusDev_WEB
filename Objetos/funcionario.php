<?php

Class funcionario{

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
        $sql = "SELECT * FROM funcionario";
        $resultado = $this->bd->query($sql);
        $resultado->execute();

        return $resultado->fetchall(PDO::FETCH_OBJ);

    }
    public function pesquisaFuncionario($CPF){
        $sql = "SELECT * FROM funcionario WHERE CPF =:CPF";
        $resultado = $this->bd->prepare($sql);
        $resultado->bindParam(":CPF", $CPF);
        $resultado->execute();

        return $resultado->fetchall(PDO::FETCH_OBJ);

    }

    public function cadastrar()

    {
        $sql = "INSERT INTO alunos(nome,email,senha,cargo,CPF) VALUES(:nome,:email,:senha,:cargo,:CPF)";
        $senha_hash = password_hash($this->senha, PASSWORD_DEFAULT);
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":senha", $senha_hash, PDO::PARAM_STR);
        $stmt->bindParam(":cargo", $this->cargo, PDO::PARAM_STR);
        $stmt->bindParam(":CPF", $CPF, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }

}

    public function atualizar(){
        $senha_hash = password_hash($this->senha, PASSWORD_DEFAULT);
        $sql = "UPDATE alunos SET nome = :nome, email = :email, senha = :senha,
                  cargo = :cargo, WHERE CPF = :CPF";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":senha", $senha_hash, PDO::PARAM_STR);
        $stmt->bindParam(":cargo", $this->cargo, PDO::PARAM_STR);
        $stmt->bindParam(":CPF", $this->CPF, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function buscaAluno($ra)
    {
        $sql = "SELECT * FROM funcionario WHERE CPF = :CPF";
        $resultado = $this->bd->prepare($sql);
        $resultado->bindParam(':ra', $ra);
        $resultado->execute();

        return $resultado->fetch(PDO::FETCH_OBJ);
    }

}