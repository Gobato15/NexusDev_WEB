<?php
include_once "configs/database.php";
include_once "medicamento.php";

class medicamenoControll{
    private $bd;
    private $medicamento;

    public function __construct(){
        $banco = new Database();
        $this->bd = $banco->conectar();
        $this->medicamento = new medicamento($this->bd);
    }

    public function index(){
        return $this->medicamento->lerTodos();
    }

    public function pesquisarMedicamento($cod_Med){
        return $this->medicamento->pesquisarMedicamento($cod_Med);
    }

    public function cadastrarMedicamento($dados){
        $this->medicamento->Nome = $dados['Nome_Med'] ?? '';
        $this->medicamento->Codigo = $dados['Cod_Med'] ?? '';
        $this->medicamento->Descricao = $dados['Desc_Med'] ?? '';
        $this->medicamento->DataValidade = $dados['DataVal_Med'] ?? '';
        $this->medicamento->Quantidade = $dados['Qtd_Med'] ?? 0;
        $this->medicamento->Valor = $dados['Valor_Med'] ?? '';
        $this->medicamento->Codigo = $dados['Cod_CatMed'] ?? '';


        if($this->medicamento->cnpjExiste($this->medicamento->cnpj)){
            if($this->medicamento->reativar()){
                header("location: index.php");
                exit();
            }
        } else {
            if($this->medicamento->cadastrar()){
                header("location: index.php");
                exit();
            }
        }
    }

    public function atualizarLaboratorio($dados){
        $this->medicamento->Nome = $dados['Nome_Med'] ?? '';
        $this->medicamento->Codigo = $dados['Cod_Med'] ?? '';
        $this->medicamento->Descricao = $dados['Desc_Med'] ?? '';
        $this->medicamento->DataValidade = $dados['DataVal_Med'] ?? '';
        $this->medicamento->Quantidade = $dados['Qtd_Med'] ?? 0;
        $this->medicamento->Valor = $dados['Valor_Med'] ?? '';
        $this->medicamento->Codigo = $dados['Cod_CatMed'] ?? '';

        if($this->laboratorio->atualizar()){
            header("location: index.php");
            exit();
        }
    }

    public function localizarLaboratorio($cod_Med){
        return $this->medicamento->bucar($cod_Med);
    }

    public function excluirMedicamento($cod_Med){
        if($this->medicamento->excluir($cod_Med)){
            header("location: index.php");
            exit();
        }
    }
}