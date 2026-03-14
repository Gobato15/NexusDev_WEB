<?php
include_once "../objetos/vendaController.php";

$controller = new VendaController();
$vendas = $controller->index();

$a = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["pesquisar"])) {
        $a = $controller->pesquisaVenda($_POST["pesquisar"]);
    }
}

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["excluir"])) {
        $controller->excluirVenda($_GET["excluir"]);
    }
}
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Vendas Cadastradas</title>

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

<a href="cadastro.php">Cadastrar Venda</a>

<h3>Pesquisar Venda</h3>

<form method="POST">
    <label>Nota Fiscal</label>
    <input type="number" name="pesquisar">
    <button>Pesquisar</button>
</form>

<table>

    <tr>
        <td>Nota Fiscal</td>
        <td>Data</td>
        <td>Valor</td>
        <td>CNPJ Drogaria</td>
        <td>CPF</td>
    </tr>

    <?php if($a) : ?>

        <tr>
            <td><?= $a->NotaFiscal_Saida ?></td>
            <td><?= $a->Data_Venda ?></td>
            <td><?= $a->Valor_Venda ?></td>
            <td><?= $a->CNPJ_Drog ?></td>
            <td><?= $a->CPF ?></td>
        </tr>

    <?php endif; ?>

</table>

<h2>Vendas cadastradas</h2>

<table>

    <tr>
        <td>Nota Fiscal</td>
        <td>Data</td>
        <td>Valor</td>
        <td>CNPJ Drogaria</td>
        <td>CPF</td>
        <td>Ações</td>
    </tr>

    <?php if($vendas) : ?>
        <?php foreach($vendas as $venda) : ?>

            <tr>

                <td><?= $venda->NotaFiscal_Saida ?></td>
                <td><?= $venda->Data_Venda ?></td>
                <td><?= $venda->Valor_Venda ?></td>
                <td><?= $venda->CNPJ_Drog ?></td>
                <td><?= $venda->CPF ?></td>

                <td>
                    <a href="atualizarVenda.php?alterar=<?= $venda->NotaFiscal_Saida ?>">Alterar</a>
                </td>

            </tr>

        <?php endforeach; ?>
    <?php endif; ?>

</table>

</body>
</html>