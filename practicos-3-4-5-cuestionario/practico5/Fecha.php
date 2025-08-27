<?php

class Fecha
{
    private int $dia;
    private int $mes;
    private int $anio;

    public function __construct(int $dia, int $mes, int $anio)
    {
        $this->dia = $dia;
        $this->mes = $mes;
        $this->anio = $anio;
    }

    // Getters y Setters
    public function getDia(): int
    {
        return $this->dia;
    }
    public function setDia(int $dia)
    {
        $this->dia = $dia;
    }

    public function getMes(): int
    {
        return $this->mes;
    }
    public function setMes(int $mes)
    {
        $this->mes = $mes;
    }

    public function getAnio(): int
    {
        return $this->anio;
    }
    public function setAnio(int $anio)
    {
        $this->anio = $anio;
    }

    public function __toString(): string
    {
        return "{$this->dia}/{$this->mes}/{$this->anio}";
    }

    // Método para calcular edad
    public function calcularEdad(): int
    {
        $hoy = new DateTime();
        $fechaNacimiento = new DateTime("{$this->anio}-{$this->mes}-{$this->dia}");
        $edad = $hoy->diff($fechaNacimiento)->y;
        return $edad;
    }
}
