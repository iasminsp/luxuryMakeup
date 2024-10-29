<?php
require 'MaquiagemRepositorio.php';
require 'db_connection.php';

$maquiagemRep = new MaquiagemRepositorio($connection);
$maquiagemRep->deletaMaquiagem($_POST['id']);

header("Location: ../admin.php");

/*if (isset($_POST['id_maquiagem'])) {
    $maquiagemRep = new MaquiagemRepositorio($connection);
    $id = $_POST['id_maquiagem'];
    
    try {
        $maquiagemRep->deletaMaquiagem($id);
        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'ID não especificado.']);
}*/
?>

