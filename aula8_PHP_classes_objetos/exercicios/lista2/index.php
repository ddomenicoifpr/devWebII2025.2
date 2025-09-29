<?php

include_once("Estado.php");
include_once("Cidade.php");

//Script principal
$pr = new Estado();
$pr->setSigla("PR");
$pr->setNome("Paraná");

$sc = new Estado();
$sc->setSigla("SC");
$sc->setNome("Santa Catarina");

$cid1 = new Cidade("Foz do Iguaçu", 250000, 500, 145, $pr);
$cid2 = new Cidade("Cascavel", 300000, 420, 320, $pr);
$cid3 = new Cidade("Chapecó", 240000, 120, 620, $sc);
$cid4 = new Cidade("Blumenau", 330000, 200, 85, $sc);
$cid5 = new Cidade("Curitiba", 1500000, 300, 850, $pr);

$cidades = array($cid1, $cid2, $cid3, $cid4, $cid5);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela estados</title>
</head>
<body>
    <table border=1>
        <tr>
            <th>Nome</th>
            <th>Habitantes</th>
            <th>Área</th>
            <th>Altitude</th>
            <th>Estado</th>
        </tr>
        <?php foreach($cidades as $cid): ?>
            <tr>
                <td><?= $cid->getNome() ?></td>
                <td><?= $cid->getQtdHabitantes() ?></td>
                <td><?= $cid->getAreaTerritorial() ?></td>
                <td><?= $cid->getAltitude() ?></td>
                <td><?= $cid->getEstado() ?></td> <!-- Funciona se implementer o toString na classe Estado -->
                <!--td><?= $cid->getEstado()->getNome() . "-" . $cid->getEstado()->getSigla() ?></td-->
            </tr>
        <?php endforeach; ?>    
    </table>
</body>
</html>