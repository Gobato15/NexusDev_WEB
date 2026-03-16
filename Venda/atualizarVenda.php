<?php
include_once("../Objetos/vendaController.php"); // O maiúsculo
$controller = new VendaController();

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET["alterar"])) {
    $a = $controller->localizarVenda($_GET["alterar"]);

} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["venda"])) {
    $controller->atualizarVenda($_POST["venda"]);

} else {
    header("Location: index.php");
}
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atualização de Venda</title>
</head>

<body>

<h1>Atualização de Venda</h1>

<a href="index.php">Voltar</a>

<form action="atualizarVenda.php" method="post"> <!-- nome correto do arquivo -->

    <input type="hidden" name="venda[NotaFiscal_Saida]" value="<?= $a->NotaFiscal_Saida ?>">

    <label>Data da Venda</label>
    <input type="date" name="venda[Data_Venda]" value="<?= $a->Data_Venda ?>"><br><br>

    <label>Valor da Venda</label>
    <input type="number" step="0.01" name="venda[Valor_Venda]" value="<?= $a->Valor_Venda ?>"><br><br>

    <label>CNPJ Drogaria</label>
    <input type="text" name="venda[CNPJ_Drog]" value="<?= $a->CNPJ_Drog ?>"><br><br>

    <label>CPF</label>
    <input type="text" name="venda[CPF]" value="<?= $a->CPF ?>"><br><br>

    <button type="submit" name="atualizar">Atualizar</button>

</form>

</body>
</html>