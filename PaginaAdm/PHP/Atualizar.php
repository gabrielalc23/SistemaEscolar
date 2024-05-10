<?php
include('../../Connection/connection.php');

$id         = $_POST['id'];
$nome       = $_POST['nome'];
$nascimento = $_POST['nascimento'];
$email      = $_POST['email'];
$telefone   = $_POST['telefone'];

$sql = "UPDATE usuarios SET nome =?, data_nascimento =?, email =?, telefone =? WHERE id =?";
$stmt = $conn->prepare($sql);

$stmt->bindValue(1, $nome);
$stmt->bindValue(2, $nascimento);
$stmt->bindValue(3, $email);
$stmt->bindValue(4, $telefone);
$stmt->bindValue(5, $id);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    header('location: ConsultaTabela.php'); 
} else {
    echo "<h1 class='bg-danger text-center text-white size-10'>VOCÊ NÃO MUDOU NADA ANIMAL.</h1>";  
    include('Editar.php');
}
$conn = null;

?>