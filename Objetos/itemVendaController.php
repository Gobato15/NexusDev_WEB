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

    public function localizarItemVenda($NotaFiscal_Saida)
    {
        return $this->itemVenda->buscaItemVenda($NotaFiscal_Saida);
    }
}