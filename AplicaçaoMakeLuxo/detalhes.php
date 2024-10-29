<?php
require 'src/db_connection.php';
require 'src/MaquiagemRepositorio.php';

$maquiagemRep = new MaquiagemRepositorio($connection);
$maquiagem = $maquiagemRep->buscaMaquiagem($_GET['id']);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Produto</title>
</head>
<body style="font-family: 'Helvetica Neue', Arial, sans-serif; background-color: #ffffff; margin: 0; padding: 20px; color: #333;">
    <h1 style="text-align: center; font-size: 2.5rem; color: #1a1901; margin-bottom: 40px; text-transform: uppercase; letter-spacing: 2px;">
        Detalhes do Produto
    </h1>
    <div style="display: flex; justify-content: center; align-items: center; flex-wrap: wrap;">
        <div class="makeup-item" style="background-color: #f0f0f0cc; border: 1px solid #371e2d; border-radius: 8px; padding: 20px; width: 300px; text-align: center; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: transform 0.3s;">
            <h2 style="font-size: 1.5rem; margin-bottom: 10px; color: #333;"><?php echo $maquiagem->getProduto(); ?></h2>
            <p style="font-size: 1rem; color: #666;">Marca: <?php echo $maquiagem->getMarca(); ?></p>
            <p class="price" style="font-weight: bold; font-size: 1.2rem; color: #e74c3c; margin-top: 10px;">
                Preço: R$ <?php echo number_format($maquiagem->getPreco(), 2, ',', '.'); ?>
            </p>
            <div>
                <button onclick="window.location.href='https://www.sephora.com.br/?utm_source=google&utm_medium=cpc&utm_campaign=institucional&gad_source=1&gclid=CjwKCAjwyfe4BhAWEiwAkIL8sAJFATWAUv8XF07kvw9vMr22wY79epQplUZvDkui7TbwFh0m_DRoZhoC2rcQAvD_BwE&id=<?php echo $maquiagem->getIdMaquiagem(); ?>'" 
                    style="background-color: #0a30b9b7; border: 1px solid #000000; border-radius: 4px; padding: 10px; color: #fff; cursor: pointer; transition: background-color 0.3s; margin-top: 10px; font-size: 16px;"
                    onmouseover="this.style.backgroundColor='#08207a';" 
                    onmouseout="this.style.backgroundColor='#0a30b9b7';">
                    Comprar
                </button>
            </div>
        </div>
    </div>
</body>
</html>
