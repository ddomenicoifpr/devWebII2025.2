<?php

include_once("Estado.php");

class Cidade {
    private string $nome;
    private int $qtdHabitantes;
    private int $areaTerritorial;
    private int $altitude;
    private Estado $estado; //Objeto estado

    //Construtor
    public function __construct($nome, $habit, $area, $alt, $estado) {
        $this->nome = $nome;
        $this->qtdHabitantes = $habit;
        $this->areaTerritorial = $area;
        $this->altitude = $alt;
        $this->estado = $estado;
    }

    //GETs e SETs
    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getQtdHabitantes(): int
    {
        return $this->qtdHabitantes;
    }

    public function setQtdHabitantes(int $qtdHabitantes): self
    {
        $this->qtdHabitantes = $qtdHabitantes;

        return $this;
    }

    public function getAreaTerritorial(): int
    {
        return $this->areaTerritorial;
    }

    public function setAreaTerritorial(int $areaTerritorial): self
    {
        $this->areaTerritorial = $areaTerritorial;

        return $this;
    }

    public function getAltitude(): int
    {
        return $this->altitude;
    }

    public function setAltitude(int $altitude): self
    {
        $this->altitude = $altitude;

        return $this;
    }

    public function getEstado(): Estado
    {
        return $this->estado;
    }

    public function setEstado(Estado $estado): self
    {
        $this->estado = $estado;

        return $this;
    }
}