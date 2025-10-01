<?php
include_once("Connection.php");

//Obtendo a conexão com o banco
$conn = Connection::getConnection();
//print_r($conn);

$sql = "SELECT * FROM times";
$stm = $conn->prepare($sql);
$stm->execute();

$dados = $stm->fetchAll();
//echo "<pre>" . print_r($dados, true) . "</pre>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Times</title>
</head>
<body>
    <h1>Aula banco de dados - Times</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cidade</th>
            <th></th>
        </tr>

        <?php foreach($dados as $t): ?>
            <tr>
                <td><?= $t['id'] ?></td>
                <td><?= $t['nome'] ?></td>
                <td><?= $t['cidade'] ?></td>
                <td>
                    <a href="time_excluir.php?id=<?= $t['id'] ?>"
                        onclick="return confirm('Confirma a exclusão?');">
                        Excluir
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>