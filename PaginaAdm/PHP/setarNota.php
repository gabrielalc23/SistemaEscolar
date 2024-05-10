<?php
include('../../Connection/connection.php');

$id_aluno = $_POST["idAluno"];

var_dump($id_aluno);

$sql_usuario = "SELECT * FROM usuarios WHERE id = :id_aluno";
$stmt_usuario = $conn->prepare($sql_usuario);
$stmt_usuario->bindParam(':id_aluno', $id_aluno);
$stmt_usuario->execute();
$usuario = $stmt_usuario->fetch();

$sql_notas = "SELECT * FROM notas WHERE id_aluno = :id_aluno";
$stmt_notas = $conn->prepare($sql_notas);
$stmt_notas->bindParam(':id_aluno', $id_aluno);
$stmt_notas->execute();
$notas = $stmt_notas->fetch();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Notas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Formulário de Notas</h1>
        <form action="processar_notas.php" method="post" class="row">
        <input type="hidden" name="id_aluno" value="<?php echo $id_aluno; ?>">

            <div class="col-md-6 mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $usuario['nome']; ?>" readonly required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="nascimento" class="form-label">Nascimento</label>
                <input type="date" class="form-control" id="nascimento" name="nascimento" value="<?php echo $usuario['data_nascimento']; ?>" readonly required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $usuario['email']; ?>" readonly required>
            </div>

            <?php if ($notas) : ?>
                <div class="col-md-3 mb-3">
                    <label for="primeira_nota" class="form-label">1º Bimestre</label>
                    <input type="number" class="form-control" id="primeira_nota" name="primeira_nota" value="<?php echo $notas['primeira_nota']; ?>" min="0" max="10" step="0.01" readonly>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="segunda_nota" class="form-label">2º Bimestre</label>
                    <input type="number" class="form-control" id="segunda_nota" name="segunda_nota" value="<?php echo $notas['segunda_nota']; ?>" min="0" max="10" step="0.01" readonly>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="terceira_nota" class="form-label">3º Bimestre</label>
                    <input type="number" class="form-control" id="terceira_nota" name="terceira_nota" value="<?php echo $notas['terceira_nota']; ?>" min="0" max="10" step="0.01" readonly>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="quarta_nota" class="form-label">4º Bimestre</label>
                    <input type="number" class="form-control" id="quarta_nota" name="quarta_nota" value="<?php echo $notas['quarta_nota']; ?>" min="0" max="10" step="0.01" readonly>
                </div>
            <?php else : ?>
                <div class="col-md-3 mb-3">
                    <label for="primeira_nota" class="form-label">1º Bimestre</label>
                    <input type="number" class="form-control" id="primeira_nota" name="primeira_nota" placeholder="Primeira nota..." min="0" max="10" step="0.01" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="segunda_nota" class="form-label">2º Bimestre</label>
                    <input type="number" class="form-control" id="segunda_nota" name="segunda_nota" placeholder="Segunda nota..." min="0" max="10" step="0.01">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="terceira_nota" class="form-label">3º Bimestre</label>
                    <input type="number" class="form-control" id="terceira_nota" name="terceira_nota" placeholder="Terceira nota..." min="0" max="10" step="0.01">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="quarta_nota" class="form-label">4º Bimestre</label>
                    <input type="number" class="form-control" id="quarta_nota" name="quarta_nota" placeholder="Quarta nota..." min="0" max="10" step="0.01">
                </div>
            <?php endif; ?>

            <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
</body>

</html>
