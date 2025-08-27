<?php

require_once 'Alumno.php';

class Becado extends Alumno
{
    private float $beca;

    public function __construct(string $apellido, int $grupo, float $cuotaBase, Fecha $nacimiento, float $beca)
    {
        parent::__construct($apellido, $grupo, $cuotaBase, $nacimiento);
        $this->beca = $beca;
    }

    public function getBeca(): float
    {
        return $this->beca;
    }
    public function setBeca(float $beca)
    {
        $this->beca = $beca;
    }

    public function __toString(): string
    {
        return parent::__toString() . ", Beca: {$this->beca}";
    }

    public function cuotaNeta(): float
    {
        $grupo = $this->getGrupo();
        $base = $this->getCuotaBase();

        if ($grupo == 1 || $grupo == 2) {
            $cuota = $base * 0.75;
        } elseif ($grupo == 3 || $grupo == 4) {
            $cuota = $base * 0.9;
        } else {
            $cuota = $base;
        }

        return $cuota - $this->beca;
    }
}
