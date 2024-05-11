<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processar notas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

</html>
<?php
include('../../Connection/connection.php');


$primeira_nota = $_POST['primeira_nota'];
$segunda_nota  = $_POST['segunda_nota'];
$terceira_nota = $_POST['terceira_nota'];
$quarta_nota   = $_POST['quarta_nota'];

$media = ($primeira_nota + $segunda_nota + $terceira_nota + $quarta_nota) / 4;

$sql = "INSERT INTO notas (id_aluno, primeira_nota, segunda_nota, terceira_nota, quarta_nota, media)
        VALUES (:id_aluno, :primeira_nota, :segunda_nota, :terceira_nota, :quarta_nota, :media)";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':id_aluno',      $_POST["id_aluno"]);
$stmt->bindParam(':primeira_nota', $primeira_nota);
$stmt->bindParam(':segunda_nota',  $segunda_nota);
$stmt->bindParam(':terceira_nota', $terceira_nota);
$stmt->bindParam(':quarta_nota',   $quarta_nota);
$stmt->bindParam(':media',         $media);
$stmt->execute();

echo '<div class="container">
<div class="card mt-5">
<div class="card-header bg-dark text-center text-white display-5">Notas do aluno: ' . $_POST['nome'] . '</div>
<div class="card-body">
<table class="table">

<tr>
    <th>Primeira nota</th>
    <th>Segunda nota</th>
    <th>Terceira nota</th>
    <th>Quarta nota</th>
    <th>Média das notas</th>
</tr> 
<tr>
    <td>' . $primeira_nota.  '</td>
    <td>' . $segunda_nota .  '</td>
    <td>' . $terceira_nota . '</td>
    <td>' . $quarta_nota .   '</td>
    <td>' . $media .         '</td>
</tr>
</table> 
</div>
</div>
</div>';
?>