<?php

include_once("Calculadora.php");

//Criar um objeto da classe calculadora
$calc = new Calculadora();
$calc->setNum1(5);
$calc->setNum2(8);

echo $calc->somar();