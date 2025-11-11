<?php

include_once(__DIR__ . "/../../controller/UsuarioController.php");
include_once(__DIR__ . "/../../util/config.php");

$usuarioCont = new UsuarioController();
$usuarioCont->deslogar();

header("location: " . URL_BASE . "/view/login/login.php");
