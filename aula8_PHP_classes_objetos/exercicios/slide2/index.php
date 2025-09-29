<?php

include_once("Livro.php");

$l1 = new Livro("Harry Potter", "JK Rowling",
                "Fantasia", 234);
$l2 = new Livro("O Alquimista", "Paulo Coelho",
                "Ficção", 154);
$l3 = new Livro("Macunaíma", "Mario de Andrade",
                "Romance", 878);

$livros = array($l1, $l2, $l3);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de livros</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Gênero</th>
            <th>Páginas</th>
        </tr>

        <?php foreach($livros as $l): ?>
            <tr>
                <td><?= $l->getTitulo() ?></td>
                <td><?= $l->getAutor() ?></td>
                <td><?= $l->getGenero() ?></td>
                <td><?= $l->getQtdPaginas() ?></td>
            </tr>        

        <?php endforeach; ?>

    </table>
    
</body>
</html>




