<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presença</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
          rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">
</head>

<body class="bg-dark">
    <?php
    include('../../SistemaEscolar/connection/connection.php');
    
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        foreach ($_POST['presenca'] as $userId => $presenca) {
            $stmt = $conn->prepare("INSERT INTO presenca (usuario_id, data, presente) VALUES (:usuario_id, NOW(), :presente)");
            $stmt->bindParam(':usuario_id', $userId);
            $stmt->bindParam(':presente', $presenca);
            $stmt->execute();
        }
        echo "<div class='alert alert-success' role='alert'>Presença registrada com sucesso!</div>";
    }
    ?>
    <div class="container">
        <a class="mt-5 btn btn-outline-info" href="../../SistemaEscolar/PaginaAdm/PHP/consultaTabela.php">Voltar para o Menu de Administração</a>
    </div>
    <?php
    $sql = "SELECT * FROM usuarios WHERE nome <> 'administrador'";
    $stm = $conn->prepare($sql);
    $date = date('d/m/Y');
    ?>
    <div class='d-flex flex-row-reverse'>
        <h4 class='text-white p-5'>Data: <?= $date ?></h4>
    </div>
    <div class="container">
        <form method="post">
            <fieldset class="form-group">
                <legend class="pt-5 text-center text-white">
                    <h1>Sistema de Presença</h1>
                </legend>
                <table class="table table-hover table-dark">
                    <tr>
                        <th>
                            <h4>NOME</h4>
                        </th>
                        <th>
                            <h4>TURMA</h4>
                        </th>
                        <th>
                            <h4 class="text-center">PRESENÇA</h4>
                        </th>
                    </tr>
                    <?php
                    $stm->execute();
                    $alunos = $stm->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($alunos as $aluno) { ?>
                        <tr>
                            <td>
                                <h5><?= $aluno['nome'] ?></h5>
                            </td>
                            <td>
                                <h5><?= $aluno['turma'] ?></h5>
                            </td>
                            <td>
                                <div class="form-check form-switch d-flex justify-content-center">
                                    <input type="hidden" name="presenca[<?= $aluno['id'] ?>]" value="0">
                                    <input type="checkbox" class="form-check-input" id="presenca_<?= $aluno['id'] ?>" name="presenca[<?= $aluno['id'] ?>]" value="1">
                                    <label class="form-check-label" for="presenca_<?= $aluno['id'] ?>">Presença</label>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Registrar Presença</button>
                </div>
            </fieldset>
        </form>
    </div>
</body>

</html>
