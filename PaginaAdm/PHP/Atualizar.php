<?php
include('../../Connection/connection.php');

$id         = $_POST['id'];
$nome       = $_POST['nome'];
$nascimento = $_POST['nascimento'];
$email      = $_POST['email'];
$telefone   = $_POST['telefone'];
$permission  = $_POST['permission_level'];

$sql = "UPDATE usuarios SET nome =?, data_nascimento =?, email =?, telefone =?, permission_level=? WHERE id =?";
$stmt = $conn->prepare($sql);

$stmt->bindValue(1, $nome);
$stmt->bindValue(2, $nascimento);
$stmt->bindValue(3, $email);
$stmt->bindValue(4, $telefone);
$stmt->bindValue(5, $permission);
$stmt->bindValue(6, $id);
$stmt->execute();

header('location: ConsultaTabela.php?id=' . $id);

$conn = null;
?>