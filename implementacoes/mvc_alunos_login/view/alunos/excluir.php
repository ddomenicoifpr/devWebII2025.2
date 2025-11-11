<?php

include_once(__DIR__ . "/../login/verifica.php");

include_once(__DIR__ . "/../../controller/AlunoController.php");

//1- Capturar o ID pela superglobal $_GET
$id = 0;
if(isset($_GET['id']))
    $id = $_GET['id'];


//2- Chamar o controller para excluir
$alunoCont = new AlunoController();
$alunoCont->excluir($id);

header("location: listar.php");

