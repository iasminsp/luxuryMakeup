<?php
require 'src/MaquiagemRepositorio.php'; 
require 'src/db_connection.php';
require 'src/Modelo/Maquiagem.php';

if (isset($_POST['cadastrar'])) {
    // Verificar os valores que estão sendo passados
    var_dump($_POST['marca'], $_POST['produto'], $_POST['preco']);
    
    $maquiagem = new Maquiagem(
        null,
        $_POST['marca'],
        $_POST['produto'],
        $_POST['preco']
    );
    // Confirmar que o objeto foi criado corretamente
    var_dump($maquiagem);
    
    // Prosseguir com o salvamento
    $maquiagemRep = new MaquiagemRepositorio($connection);
    $maquiagemRep->salvaMaquiagem($maquiagem);

    // Redirecionar para a página de administração após o cadastro
    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Nova Maquiagem</title>
    <link rel="stylesheet" href="css/cadastro.css">
</head>

<body>
    <h1>Cadastro de Nova Maquiagem</h1>

    <form action="cadastro_maquiagem.php" method="POST">
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" required><br><br>

        <label for="produto">Produto:</label>
        <input type="text" id="produto" name="produto" required><br><br>

        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" step="0.01" required><br><br>

        <button type="submit" name="cadastrar">Cadastrar Maquiagem</button>
    </form>

    <a href="admin.php">Voltar para o Painel Administrativo</a>
</body>

</html>
