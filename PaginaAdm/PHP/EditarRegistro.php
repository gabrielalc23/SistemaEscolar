<?php
include('../../Connection/connection.php');

$sql_editor = ("SELECT id, nome, email, telefone FROM usuarios WHERE id= $id LIMIT 1");
$result_editor = $conn->prepare($sql_editor);

?>