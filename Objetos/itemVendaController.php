<?php

include_once __DIR__ . "/../configs/database.php";
include_once __DIR__ . "/itemVenda.php";
class ItemVendaController
{
    private $bd;
    private $itemVenda;

    public function __construct()
    {
        $banco = new Database();
        $this->bd = $banco->conectar();
        $this->itemVenda = new ItemVenda($this->bd);
    }

    public function index()
    {
        return $this->itemVenda->lerTodos();
    }

    public function pesquisaItemVenda($Cod_ItemVenda){
        return $this->itemVenda->pesquisarItemVenda($Cod_ItemVenda);
    }

    public function cadastrarItemVenda($dados) {

        $this->itemVenda->DataVal_ItemVenda = $dados["DataVal_ItemVenda"];
        $this->itemVenda->Qtd_ItemVenda     = $dados["Qtd_ItemVenda"];
        $this->itemVenda->Valor_ItemVenda   = $dados["Valor_ItemVenda"];
        $this->itemVenda->Cod_Med           = $dados["Cod_Med"];
        $this->itemVenda->NotaFiscal_Saida  = $dados["NotaFiscal_Saida"];

        $resultado = $this->itemVenda->cadastrarItemVenda();

        if ($resultado) {
            header("location: index.php");
            exit();
        }
    }

    public function excluirVenda($Cod_ItemVenda)
    {
        $this->itemVenda->Cod_ItemVenda = $Cod_ItemVenda;

        if ($this->itemVenda->excluir()) {
            header("location: index.php");
        }
    }

    public function atualizarItemVenda($dados) {

        $this->itemVenda->Cod_ItemVenda = $dados["Cod_ItemVenda"];
        $this->itemVenda->DataVal_ItemVenda = $dados["DataVal_ItemVenda"];
        $this->itemVenda->Qtd_ItemVenda = $dados["Qtd_ItemVenda"];
        $this->itemVenda->Valor_ItemVenda = $dados["Valor_ItemVenda"];
        $this->itemVenda->Cod_Med = $dados["Cod_Med"];
        $this->itemVenda->NotaFiscal_Saida = $dados["NotaFiscal_Saida"];

        if ($this->itemVenda->atualizarItemVenda()) {
            header("location: index.php");
            exit();
        }
    }
    public function localizarVenda($Cod_ItemVenda)
    {
        return $this->itemVenda->buscaItemVenda($Cod_ItemVenda);
    }
}