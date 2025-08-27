<?php
require_once 'Fecha.php';

abstract class Alumno
{
    private string $apellido;
    private int $grupo;
    private float $cuotaBase;
    private Fecha $nacimiento;

    public function __construct(string $apellido, int $grupo, float $cuotaBase, Fecha $nacimiento)
    {
        $this->apellido = $apellido;
        $this->grupo = $grupo;
        $this->cuotaBase = $cuotaBase;
        $this->nacimiento = $nacimiento;
    }

    // Getters y Setters
    public function getApellido(): string
    {
        return $this->apellido;
    }
    public function setApellido(string $apellido)
    {
        $this->apellido = $apellido;
    }

    public function getGrupo(): int
    {
        return $this->grupo;
    }
    public function setGrupo(int $grupo)
    {
        $this->grupo = $grupo;
    }

    public function getCuotaBase(): float
    {
        return $this->cuotaBase;
    }
    public function setCuotaBase(float $cuotaBase)
    {
        $this->cuotaBase = $cuotaBase;
    }

    public function getNacimiento(): Fecha
    {
        return $this->nacimiento;
    }
    public function setNacimiento(Fecha $nacimiento)
    {
        $this->nacimiento = $nacimiento;
    }

    public function __toString(): string
    {
        return "Alumno: {$this->apellido}, Grupo: {$this->grupo}, Cuota Base: {$this->cuotaBase}, Nacimiento: {$this->nacimiento}";
    }

    // Método abstracto
    abstract public function cuotaNeta(): float;
}
