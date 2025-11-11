<?php

include_once(__DIR__ . "/../login/verifica.php");

include_once(__DIR__ . "/../../controller/AlunoController.php");

$alunoCont = new AlunoController();
$alunos = $alunoCont->listar();
//print_r($alunos);


include_once(__DIR__ . "/../include/header.php");

include_once(__DIR__ . "/../include/menu.php");
?>


<h3>Listagem de Alunos</h3> 

<div>
    <a href="inserir.php" class="btn btn-primary">Inserir</a>
</div>

<table class="table table-striped table-bordered">
    <!-- Cabeçalho -->
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Idade</th>
        <th>Estrangeiro</th>
        <th>Curso</th>
        <th></th>
        <th></th>
    </tr>

    <!-- Dados -->
    <?php foreach($alunos as $a): ?>
        <tr>
            <td><?= $a->getId() ?></td>
            <td><?= $a->getNome() ?></td>
            <td><?= $a->getIdade() ?></td>
            <td><?= $a->getEstrangeiroDesc() ?></td>
            <td><?= $a->getCurso()->getNomeTurno() ?></td>
            <td>
                <a href="editar.php?id=<?= $a->getId() ?>">
                    <img src="../../img/btn_editar.png">
                </a>
            </td>
            <td>
                <a href="excluir.php?id=<?= $a->getId() ?>"
                    onclick="return confirm('Confirma a exclusão?')">
                    <img src="../../img/btn_excluir.png">
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
   
</table>

<?php
include_once(__DIR__ . "/../include/footer.php");
?>

