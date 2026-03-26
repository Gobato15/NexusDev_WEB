<?php
include_once "../Objetos/itemVendaController.php";

$controller = new ItemVendaController();

$itens = [];

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET["notaFiscal_Saida"])) {
    $nota = $_GET["notaFiscal_Saida"];

    $itens = $controller->localizarItemVenda($_GET["notaFiscal_Saida"]);
}
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Itens de Venda</title>

    <style>
        table, tr, td {
            border:1px solid black;
            border-collapse:collapse;
            padding:5px;
        }
    </style>
</head>

<body>

<a href="../Venda/index.php">Voltar</a>

<h1>Nota Fiscal<?=$nota?></h1>

<table>

    <tr>
        <td>Código</td>
        <td>Data Validade</td>
        <td>Quantidade</td>
        <td>Valor</td>
        <td>Cód. Medicamento</td>
        <td>Nota Fiscal</td>
    </tr>

    <?php if($itens) : ?>
        <?php foreach($itens as $item) : ?>

            <tr>

                <td><?= $item->Cod_ItemVenda ?></td>
                <td><?= $item->DataVal_ItemVenda ?></td>
                <td><?= $item->Qtd_ItemVenda ?></td>
                <td><?= $item->Valor_ItemVenda ?></td>
                <td><?= $item->Cod_Med ?></td>
                <td><?= $item->NotaFiscal_Saida ?></td>


            </tr>

        <?php endforeach; ?>
    <?php endif; ?>

</table>

</body>
</html>