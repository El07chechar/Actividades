<?php
require_once 'Fecha.php';
require_once 'Alumno.php';
require_once 'Becado.php';

$apellido = $_POST['apellido'];
$grupo = (int)$_POST['grupo'];
$cuotaBase = (float)$_POST['cuotaBase'];
$dia = (int)$_POST['dia'];
$mes = (int)$_POST['mes'];
$anio = (int)$_POST['anio'];
$tipo = $_POST['tipo'];
$beca = isset($_POST['beca']) ? (float)$_POST['beca'] : 0;

$nacimiento = new Fecha($dia, $mes, $anio);

if ($tipo === "becado") {
    $alumno = new Becado($apellido, $grupo, $cuotaBase, $nacimiento, $beca);
} else {
    // Creamos una clase temporal para Alumno no becado
    class AlumnoNormal extends Alumno
    {
        public function cuotaNeta(): float
        {
            $grupo = $this->getGrupo();
            $base = $this->getCuotaBase();
            if ($grupo == 1 || $grupo == 2) return $base * 0.75;
            if ($grupo == 3 || $grupo == 4) return $base * 0.9;
            return $base;
        }
    }
    $alumno = new AlumnoNormal($apellido, $grupo, $cuotaBase, $nacimiento);
}

// Mostrar resultados
echo "<h2>Resultados:</h2>";
echo "Edad: " . $alumno->getNacimiento()->calcularEdad() . " años<br>";
echo "Cuota Neta: $" . $alumno->cuotaNeta() . "<br>";
