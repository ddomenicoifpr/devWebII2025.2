<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once("persistencia.php");

//1- Carregar os dados do arquivo JSON
$livros = buscarDados("livros.json");

//2- Receber o ID do livro
$id = $_GET['id'];

//3- Encontrar a posição do livro no array para excluir
$idxExcluir = -1;
foreach($livros as $idx => $l) {
    if($id == $l['id']) {
        $idxExcluir = $idx;
        break;
    }
}

//echo $idxExcluir;

//4- Remover o índice encontrado do array
array_splice($livros, $idxExcluir, 1);

//5- Salvar os dados no arquivo
salvarDados($livros, "livros.json");

//6- Redirecinar para a listagem
header("location: livros.php");
