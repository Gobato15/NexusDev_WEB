<?php

include_once __DIR__ . "/../configs/database.php";
include_once __DIR__ . "/venda.php";
class VendaController
{
    private $bd;
    private $venda;

    public function __construct()
    {
        $banco = new Database();
        $this->bd = $banco->conectar();
        $this->venda = new Venda($this->bd);
    }

    public function index()
    {
        return $this->venda->lerTodos();
    }

    public function pesquisaVenda($NotaFiscal_Saida)
    {
        return $this->venda->pesquisarVenda($NotaFiscal_Saida);
    }

    public function cadastrarVenda($dados){

        $this->venda->Data_Venda = $dados["Data_Venda"];
        $this->venda->Valor_Venda = $dados["Valor_Venda"];
        $this->venda->CNPJ_Drog = $dados["CNPJ_Drog"];
        $this->venda->CPF = $dados["CPF"];

        $resultado = $this->venda->cadastrar();
        var_dump("resultado cadastrar:", $resultado);

        if ($resultado) {
            header("location: index.php");
            exit();
        }
    }

    public function excluirVenda($NotaFiscal_Saida)
    {
        $this->venda->NotaFiscal_Saida = $NotaFiscal_Saida;

        if ($this->venda->excluir()) {
            header("location: index.php");
        }
    }

    public function atualizarVenda($dados){
        $this->venda->NotaFiscal_Saida = $dados["NotaFiscal_Saida"];
        $this->venda->Data_Venda = $dados["Data_Venda"];
        $this->venda->Valor_Venda = $dados["Valor_Venda"];
        $this->venda->CNPJ_Drog = $dados["CNPJ_Drog"];
        $this->venda->CPF = $dados["CPF"];

        if ($this->venda->atualizar()) {
            header("location: index.php");
            exit();
        }
    }
    public function localizarVenda($NotaFiscal_Saida)
    {
        return $this->venda->buscaVenda($NotaFiscal_Saida);
    }
}