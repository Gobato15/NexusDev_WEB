<?php

class medicamento{

    private $medicamento;
    private $codMed;
    private $descMed;
    private $dataVal;
    private $qtdMed;
    private $valorMed;

    public function __construct($bd){
        $this->bd = $bd;
    }

    public function lerTodos(){
        $sql = "SELECT * FROM medicamento WHERE Ativo_Lab = 1";
        $resultado = $this->bd->query($sql);
        $resultado = execute();
        return $resultado->fetchAll(PDO::FETCH_OBJ);
    }

    public function pesquisarMedicamento($cod_Med){
        $sql = "SELECT * FROM medicamento WHERE $cod_Med = ?";
        $resultado = $this->bd->prepare($sql);
        $resutlado->bindParam(":cod_Med", $cod_Med);
        $resultado->execute($cod_Med);
    }

    public function cadastrarMedicamento(){
        $sql = "INSERT INTO medicamento(Cod_Med,Nome_Med,Desc_Med,DataVal_Med,Qtd_Med,Valor_Med) 
        VALUES (:codMed,:nomeMed,:descMed,:dataVal,:qtdMed,:valorMed)";

        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(":codMed", $this->codMed, PDO::PARAM_STR);
        $stmt->bindParam(":nomeMed", $this->nomeMed, PDO::PARAM_STR);
        $stmt->bindParam(":descMed", $this->descMed, PDO::PARAM_STR);
        $stmt->bindParam(":dataVal", $this->dataVal, PDO::PARAM_STR);
        $stmt->bindParam(":qtdMed", $this->qtdMed, PDO::PARAM_INT);
        $stmt->bindParam(":valorMed", $this->valorMed, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function excluir($codMed){
        $sql = "UPDATE medicamento SET Ativo_Lab = 0 WHERE Cod_Med = :codMed";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(":codMed", $codMed, PDO::PARAM_STR);

        if($stmt->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function atualizar(){
        $sql = "UPDATE medicamento 
            SET Nome_Med=:nomeMed, Desc_Med=:descMed, 
                DataVal_Med=:dataVal, Qtd_Med=:qtdMed, Valor_Med=:valorMed
            WHERE $codMed=:codMed";

        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(":codMed", $this->codMed, PDO::PARAM_STR);
        $stmt->bindParam(":nomeMed", $this->nomeMed, PDO::PARAM_STR);
        $stmt->bindParam(":descMed", $this->descMed, PDO::PARAM_STR);
        $stmt->bindParam(":dataVal", $this->dataVal, PDO::PARAM_STR);
        $stmt->bindParam(":qtdMed", $this->qtdMed, PDO::PARAM_INT);
        $stmt->bindParam(":valorMed", $this->valorMed, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function codMedExiste($codMed){
        $sql = "SELECT COUNT(*) FROM medicamento WHERE Cod_Med = :codMed";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(":codMed", $codMed, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function reativarMedicamento(){
        $sql = "UPDATE medicamento 
            SET Nome_Med=:nomeMed, Desc_Med=:descMed, 
                DataVal_Med=:dataVal, Qtd_Med=:qtdMed, Valor_Med=:valorMed
            WHERE $codMed=:codMed";

        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(":codMed", $this->codMed, PDO::PARAM_STR);
        $stmt->bindParam(":nomeMed", $this->nomeMed, PDO::PARAM_STR);
        $stmt->bindParam(":descMed", $this->descMed, PDO::PARAM_STR);
        $stmt->bindParam(":dataVal", $this->dataVal, PDO::PARAM_STR);
        $stmt->bindParam(":qtdMed", $this->qtdMed, PDO::PARAM_INT);
        $stmt->bindParam(":valorMed", $this->valorMed, PDO::PARAM_STR);
    }
}