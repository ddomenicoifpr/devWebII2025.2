<?php

class Retangulo {
    
    //Atributos
    private int $base;
    private int $altura;

    //Métodos
    public function getArea() {
        return $this->base * $this->altura;
    }    

    public function getPerimetro() {
        return ($this->base * 2) + ($this->altura * 2); 
    }

    //GETs e SETs
    public function getBase(): int
    {
        return $this->base;
    }

    public function setBase(int $base): self
    {
        $this->base = $base;

        return $this;
    }

    public function getAltura(): int
    {
        return $this->altura;
    }

    public function setAltura(int $altura): self
    {
        $this->altura = $altura;

        return $this;
    }
}