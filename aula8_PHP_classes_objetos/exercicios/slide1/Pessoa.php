<?php

class Pessoa {

    //Atributos
    private string $nome;
    private string $sobrenome;

    //Método nome completo
    public function getNomeCompleto() {
        return $this->nome . " " . $this->sobrenome;
    }
    


    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getSobrenome(): string
    {
        return $this->sobrenome;
    }

    public function setSobrenome(string $sobrenome): self
    {
        $this->sobrenome = $sobrenome;

        return $this;
    }
}