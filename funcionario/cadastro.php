<?php
include_once("../Objetos/funcionarioController.php");

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $controller = new funcionarioController();

    if (isset($_POST["cadastrar"])) {
        $a = $controller->cadastrarfuncionario($_POST["funcionario"], $_FILES["foto"]);
    }
}
//var_dump($cadastro);
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Funcionário</title>
</head>
<body>
<h1>Cadastro de Funcionário</h1>
<a href="index.php">Voltar</a><br><br>

<form action="cadastro.php" method="post" enctype="multipart/form-data">

    <label>Nome:</label><br>
    <input type="text" name="funcionario[nome]" required><br><br>

    <label>CPF:</label><br>
    <input type="text" name="funcionario[CPF]" required><br><br>

    <label>Telefone:</label><br>
    <input type="tel" name="funcionario[telefone]"><br><br>

    <label>CEP:</label><br>
    <input type="text" name="funcionario[CEP]"><br><br>

    <label>Número:</label><br>
    <input type="text" name="funcionario[numero]"><br><br>

    <label>E-mail:</label><br>
    <input type="email" name="funcionario[email]"><br><br>

    <label>Senha:</label><br>
    <input type="password" name="funcionario[senha]"><br><br>

    <label for="foto">Foto de Perfil:</label><br>
    <input type="file" name="foto" id="foto"><br><br>

    <button type="submit" name="cadastrar">Cadastrar</button>
</form>
</body>
</html>
