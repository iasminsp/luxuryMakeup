<?php
require 'maquiagemRepositorio.php';
require 'db_connection.php';
require 'Modelo/maquiagem.php';

$maquiagemRep = new MaquiagemRepositorio($connection);
$maquiagemDelete = new maquiagem($_POST['id_maquiagem'], $_POST['marca'], $_POST['produto'], $_POST['preco']);
$maquiagemRep->atualizaMaquiagem($maquiagemDelete);

header("Location: ../admin.php");
?>