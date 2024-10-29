<?php
require 'src/db_connection.php';
require 'src/MaquiagemRepositorio.php';

$maquiagemRep = new MaquiagemRepositorio($connection);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maquiagens de Luxo</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Maquiagens de Luxo</h1>
    <div style="position: absolute; top: 20px; right: 20px;">
    <button onclick="window.location.href='admin.php'">Painel Admin</button>
    </div>
    <div class="makeup-list">
        <?php $maquiagemRep->listaMaquiagens(); ?>
    </div>
    
</body>
</html>
