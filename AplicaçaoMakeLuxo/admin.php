<?php
require 'src/MaquiagemRepositorio.php'; 
require 'src/db_connection.php';
$maquiagemRep = new MaquiagemRepositorio($connection);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - Maquiagens</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <h1>Painel Administrativo </h1>
    <h2>Maquiagens</h2>
    <table>
        <thead style="background-color: #371e2d;">
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Produto</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($maquiagemRep->getMaquiagem() as $maquiagem): ?>
                <tr id="row-<?php echo $maquiagem->getIdMaquiagem(); ?>">
                    <td><?php echo $maquiagem->getIdMaquiagem(); ?></td>
                    <td><?php echo $maquiagem->getMarca() ?></td>
                    <td><?php echo $maquiagem->getProduto() ?></td>
                    <td>R$ <?php echo number_format($maquiagem->getPreco(), 2, ',', '.'); ?></td>
                    <td>
                        
                        <form action="src/exclui_maquiagens.php", method="POST">
                            <input type="hidden" name="id" value="<?php echo $maquiagem->getIdMaquiagem()?>">
                            <button type="submit" class="excluir">Excluir</button>
                        </form>
                        <form action="edita_maquiagens.php" method="POST">
                            <input type="hidden" name="id_maquiagem" value="<?php echo $maquiagem->getIdMaquiagem(); ?>">
                            <button type="submit" class="editar">Editar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="6" style="text-align: center;">
                    <!-- Botão de cadastro de novo carro -->
                    <a href="cadastro_maquiagem.php" class="btn-novo-make">Cadastrar Nova make</a>
                </td>
            </tr>
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('.excluir').click(function(e) {
                e.preventDefault();
                
                let id_maquiagem = $(this).data('id');

                if (confirm("Tem certeza de que deseja excluir este item?")) {
                    $.ajax({
                        url: 'src/exclui_maquiagens.php',
                        type: 'POST',
                        data: { id_maquiagem: id_maquiagem },
                        success: function(response) {
                            // Remover a linha da tabela
                            $('#row-' + id_maquiagem).remove();
                        },
                        error: function() {
                            alert("Erro ao excluir a maquiagem.");
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
