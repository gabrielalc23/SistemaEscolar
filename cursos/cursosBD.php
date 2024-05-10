<?php
include("../connection/connection.php");
include("../sessoes/sessao.php");
$search = false;

$sql = $conn->prepare("SELECT id, nome, descricao_curta, descricao, duracao, tipo, preco, data_inicio, idade_min, pre_requisito, foto FROM cursos");
$sql->execute();
$info = $sql->fetchAll(PDO::FETCH_ASSOC);

$contagemCursos = 0;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <?php
    exibirNavbar(false);
    exibirCarousel();
    ?>

    <h1 class="text-center mt-5">VEJA nossos cursos</h1>

    <div class="container d-flex flex-column align-items-stretch mt-5">
        <?php
        if ($info) {
            foreach ($info as $linha) {
                $id = $linha['id'];
                $nome = $linha['nome'];
                $descricaoCurta = $linha['descricao_curta'];
                $descricao = $linha['descricao'];
                $duracao = $linha['duracao'] ?? 'Aulas Gravadas';
                $tipo = $linha['tipo'];
                $preco = $linha['preco'] ?? 0;
                $dataIni = $linha['data_inicio'] ?? 'Não tem';
                $idadeMin = $linha['idade_min'] ?? '';
                $preReq = $linha['pre_requisito'] ?? '';
                $foto = $linha['foto'];

                if (($contagemCursos % 4) == 0 || $contagemCursos == 0) {
                    if ($contagemCursos == 0) {
                        echo '<div class="row flex-grow-0 mb-3 d-flex justify-content-center">';
                    } else {
                        echo '</div><div class="row flex-grow-0 mb-3 d-flex justify-content-center">';
                    }
                }

                echo '
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="' . $foto . '" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">' . $nome . '</h5>
                        <p class="card-text">' . $descricaoCurta . '</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Tipo de Curso: ' . $tipo . '</li>
                        <li class="list-group-item">Duração: ' . $duracao . ' horas</li>
                        <li class="list-group-item">Preço: R$' . $preco . '.00</li>
                    </ul>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Ver mais</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">' . $nome . '</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col">
                                                <h4>Descrição:</h4>
                                                <p>' . $descricao . '</p>
                                                <h4>Data de Início:</h4>
                                                <p>' . $dataIni . '</p>
                                            </div>
                                            <div class="col">
                                                <h4>Idade Mínima:</h4>
                                                <p>' . $idadeMin . '</p>
                                                <h4>Pré-Requisitos:</h4>
                                                <p>' . $preReq . '</p>
                                                <h4>Preço:</h4>
                                                <p>R$' . $preco . '.00</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        <button type="button" class="btn btn-success" name="inscrever" value="' . $id . '">Inscrever-se</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                $contagemCursos = $contagemCursos + 1;
            }
            echo '</div>';
        }
        ?>
    </div>

    <?php
    exibirFooter();
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
