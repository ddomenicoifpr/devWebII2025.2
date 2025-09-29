<?php

class Calculadora {

    //Atributos
    private int $num1;
    private int $num2;
    //string

    //Construtor
    public function __construct($num1=0, $num2=0) {
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    //Métodos
    public function somar() {
        $soma = $this->num1 + $this->num2;
        return $soma;
    }

    //GETs e SETs
    public function getNum1(): int
    {
        return $this->num1;
    }

    public function setNum1(int $num1): self
    {
        $this->num1 = $num1;

        return $this;
    }

    public function getNum2(): int
    {
        return $this->num2;
    }

    public function setNum2(int $num2): self
    {
        $this->num2 = $num2;

        return $this;
    }
}