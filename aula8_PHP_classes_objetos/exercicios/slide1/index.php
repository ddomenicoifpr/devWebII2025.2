<?php

include_once("Pessoa.php");

$p1 = new Pessoa();
$p1->setNome("Carlos");
$p1->setSobrenome("de Andrade");
echo $p1->getNomeCompleto() . "<br>";

$p2 = new Pessoa();
$p2->setNome("Ayrton");
$p2->setSobrenome("Senna");
echo $p2->getNomeCompleto() . "<br>";

