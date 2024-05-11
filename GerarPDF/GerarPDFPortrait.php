<?php
include '../Connection/connection.php';
include 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Stylesheet;

$bootstrapCss = file_get_contents('bootstrap.css');

$sql = "SELECT * FROM usuarios WHERE usuarios.nome <> 'admin'";
$query = $conn->prepare($sql);
$query->execute();

$result = $query->fetchAll(PDO::FETCH_ASSOC);


$pdf = new Dompdf();


$html = '<html><head><style>'. $bootstrapCss. '</style></head><body>';
$html.= '<h2 class="text-center lead">Usuários no sistema</h2>
            <table class="table table-striped table-bordered"">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>NASCIMENTO</th>
                        <th>EMAIL</th>
                        <th>TELEFONE</th>
                    </tr>
                </thead>';

foreach ($result as $row) {
    $html.= '<tr>';
    $html.= '<td>'. $row['id']. '</td>';   
    $html.= '<td>'. $row['nome']. '</td>'; 
    $html.= '<td>'. $row['data_nascimento']. '</td>'; 
    $html.= '<td>'. $row['email']. '</td>';
    $html.= '<td>'. $row['telefone'] .'</td>';

    $html.= '</tr>';
}

$html.= '</table></body></html>';

$pdf->loadHtml($html);

$pdf->setPaper('A4', 'portrait');

$options = $pdf->getOptions();
$options->setDefaultFont('Open Sans');

$pdf->render();

$pdf->stream();