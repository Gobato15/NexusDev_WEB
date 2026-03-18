<?php
include_once "../Objetos/compraController.php";

$controller = new CompraController();
$compras = $controller->index();

$a = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["pesquisar"])) {
        $a = $controller->pesquisaCompra($_POST["pesquisar"]);
    }
}

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["excluir"])) {
        $controller->excluirCompra($_GET["excluir"]);
    }
}
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Compras Cadastradas</title>

    <style>
        table,tr,td{
            border:1px solid black;
            border-collapse:collapse;
            padding:5px;
        }
    </style>

</head>

<body>

<h1>SENAC Rio Claro</h1>

<a href="cadastrarCompra.php">Cadastrar Compra</a>

<h3>Pesquisar Compra</h3>

<form method="POST">
    <label>Nota Fiscal</label>
    <input type="number" name="pesquisar">
    <button>Pesquisar</button>
</form>

<table>
    <tr>
        <td>Nota Fiscal</td>
        <td>Valor Total</td>
        <td>Data Compra</td>
        <td>CPF</td>
        <td>CNPJ Laboratório</td>
    </tr>

    <?php if($a) : ?>
        <tr>
            <td><?= $a->NotaFiscal_Entrada ?></td>
            <td><?= $a->Valor_Total ?></td>
            <td><?= $a->Data_Compra ?></td>
            <td><?= $a->CPF ?></td>
            <td><?= $a->CNPJ_Lab ?></td>
        </tr>
    <?php endif; ?>
</table>

<h2>Compras Cadastradas</h2>

<table>
    <tr>
        <td>Nota Fiscal</td>
        <td>Valor Total</td>
        <td>Data Compra</td>
        <td>CPF</td>
        <td>CNPJ Laboratório</td>
        <td>Ações</td>
    </tr>

    <?php if($compras) : ?>
        <?php foreach($compras as $compra) : ?>
            <tr>
                <td><?= $compra->NotaFiscal_Entrada ?></td>
                <td><?= $compra->Valor_Total ?></td>
                <td><?= $compra->Data_Compra ?></td>
                <td><?= $compra->CPF ?></td>
                <td><?= $compra->CNPJ_Lab ?></td>
                <td>
                    <a href="atualizaCompra.php?alterar=<?= $compra->NotaFiscal_Entrada ?>">Alterar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>

</body>
</html>