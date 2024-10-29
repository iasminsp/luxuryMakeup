<?php
require 'src/MaquiagemRepositorio.php'; 
require 'src/db_connection.php';
$maquiagemRep = new MaquiagemRepositorio($connection);
$maquiagemBuscada = $maquiagemRep->buscaMaquiagem($_POST['id_maquiagem']);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Maquiagem</title>
    <link rel="stylesheet" href="css/cadastro.css">
</head>
<body>
    <h1>Editar Maquiagem</h1>

    <form action="src/editar_maquiagem.php" method="POST">
        <input type="hidden" name="id_maquiagem" value="<?php echo $maquiagemBuscada->getIdMaquiagem(); ?>">
    
        <label for="marca">Marca:</label>
        <input type="text" name="marca" id="marca" value="<?php echo $maquiagemBuscada->getMarca(); ?>" required>

        <label for="produto">Produto:</label>
        <input type="text" name="produto" id="produto" value="<?php echo $maquiagemBuscada->getProduto(); ?>" required>

        <label for="preco">Preço:</label>
        <input type="number" name="preco" id="preco" value="<?php echo $maquiagemBuscada->getPreco(); ?>" required>

        <button type="submit" name="atualizar">Atualizar Maquiagem</button>
    </form>

    <a href="admin.php">Voltar ao Painel</a>
</body>
</html>
