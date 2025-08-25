<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once("persistencia.php");

//Buscar os livros já salvos no arquivo
$livros = buscarDados("livros.json");
//echo "<pre>" . print_r($livros, true) . "</pre>";

if(isset($_POST['titulo'])) {
    //Já clicou no Enviar
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $genero = $_POST['genero'];
    $numPaginas = $_POST['numPaginas'];

    //echo $titulo . " - " . $genero . "- " . $numPaginas;

    $livro = array(
        "id" => uniqid(),
        "autor" => $autor,
        "titulo" => $titulo,
        "genero" => $genero,
        "paginas" => $numPaginas
    );

    array_push($livros, $livro);
    salvarDados($livros, "livros.json");

    //Forçar o recarremento para evitar o reenvio do form
    header("location: livros.php");
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de livros</title>
</head>
<body>

<h1>Cadastro de livros</h1>

<h3>Cadastre seu livro aqui</h3>
<form method="POST">
    <input type="text" name="titulo"
        placeholder="Informe o título" />
    <br><br>
    
    <input type="text" name="autor"
        placeholder="Informe o autor" />
    <br><br>

    <select name="genero">
        <option value="">--Selecione o gênero--</option>
        <option value="D">Drama</option>
        <option value="F">Ficção</option>
        <option value="R">Romance</option>
        <option value="O">Outro</option>
    </select>
    <br><br>

    <input type="number" name="numPaginas"
        placeholder="Informe o número de páginas">
    <br><br>

    <input type="submit" value="Enviar" />
</form>

<h3>Livros cadastrados</h3>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Autor</th>
        <th>Gênero</th>
        <th>Quant. Páginas</th>
        <th>Excluir</th>
    </tr>

    <?php foreach($livros as $l): ?>
        <tr>
            <td><?php echo $l['id'] ?></td>
            <td><?= $l['titulo'] ?></td>
            <td><?= $l['autor'] ?></td>
            <td>
                <?php if($l['genero'] == 'D') 
                        echo 'Drama';
                      elseif($l['genero'] == 'F')
                        echo 'Ficção';
                      elseif($l['genero'] == 'R')
                        echo 'Romance';
                      elseif($l['genero'] == 'O')
                        echo 'Outro';
                ?>
            </td>
            <td><?= $l['paginas'] ?></td>
            <td>
                <a href="excluir.php?id=<?= $l['id'] ?>"
                   onclick="return confirm('Confirma a exclusão?')" >
                    Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>