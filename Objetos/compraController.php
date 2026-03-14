<?php

include_once __DIR__ . "/../configs/database.php";
include_once __DIR__ . "/compra.php";

class compraController
{
    private $bd;
    private $compra;

    public function __construct()
    {
        $banco = new Database();
        $this->bd = $banco->conectar();
        $this->compra = new Compra($this->bd);
    }

    public function index()
    {
        return $this->compra->lerTodos();
    }

    public function pesquisaCompra($NotaFiscal_Entrada){
        return $this->compra->pesquisarCompra($NotaFiscal_Entrada);
    }

    public function cadastrarCompra($dados){

        $this->compra->Valor_Total = $dados["Valor_Total"];
        $this->compra->Data_Compra = $dados["Data_Compra"];
        $this->compra->CPF = $dados["CPF"];
        $this->compra->CNPJ_Lab = $dados["CNPJ_Lab"];

        $resultado = $this->compra->cadastrar();
        var_dump("resultado cadastrar:", $resultado);

        if ($resultado) {
            header("location: index.php");
            exit();
        }
    }

    public function excluirCompra($NotaFiscal_Saida)
    {
        $this->venda->NotaFiscal_Saida = $NotaFiscal_Saida;

        if ($this->venda->excluir()) {
            header("location: index.php");
        }
    }

    public function atualizarCompra($dados){
        $this->compra->NotaFiscal_Entrada = $dados["NotaFiscal_Entrada"];
        $this->compra->Valor_Total = $dados["Valor_Total"];
        $this->compra->Data_Compra = $dados["Data_Compra"];
        $this->compra->CPF = $dados["CPF"];
        $this->compra->CNPJ_Lab = $dados["CNPJ_Lab"];

        if ($this->compra->atualizar()) {
            header("location: index.php");
            exit();
        }
    }
    public function localizarCompra($NotaFiscal_Entrada)
    {
        return $this->compra->buscarCompra($NotaFiscal_Entrada);
    }
}
