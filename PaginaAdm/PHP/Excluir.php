<?php

class Excluir{
    public function Excluir(){
        include('../../Connection/connection.php');

        $id = $_POST['id'];

        $sql = "DELETE FROM usuarios WHERE id =?";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            header('Location: consultaTabela.php');
            exit;
        }
        $conn = null;
    }
}

$excluir = new Excluir();
$excluir->Excluir();

?>