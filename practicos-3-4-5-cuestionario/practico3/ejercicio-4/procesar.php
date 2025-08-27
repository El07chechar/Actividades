<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    echo "Formulario recibido con éxito.<br><br>";

    // Genera un conjunto con números únicos según tipo
    function obtenerConjunto($cardinal, $tipo)
    {
        $numerosDisponibles = [];

        // Determinar rango según tipo
        if ($tipo === "pares") {
            $numerosDisponibles = range(2, 100, 2); // pares entre 2 y 100
        } elseif ($tipo === "impares") {
            $numerosDisponibles = range(1, 99, 2); // impares entre 1 y 99
        } elseif ($tipo === "azar") {
            $numerosDisponibles = range(1, 100); // todos los números
        } else {
            return []; // tipo inválido
        }

        // Si cardinal es "azar", asignar un número aleatorio entre 1 y el máximo disponible
        if ($cardinal === "azar") {
            $cardinal = rand(1, count($numerosDisponibles));
        } else {
            $cardinal = min((int)$cardinal, count($numerosDisponibles)); // evitar pedir más elementos que los disponibles
        }

        shuffle($numerosDisponibles); // mezcla el array
        return array_slice($numerosDisponibles, 0, $cardinal); // toma los primeros $cardinal elementos
    }

    // Realiza la operación de conjuntos
    function realizarOperacion($conjuntoA, $conjuntoB, $operacion)
    {
        switch ($operacion) {
            case "union":
                return array_values(array_unique(array_merge($conjuntoA, $conjuntoB)));
            case "interseccion":
                return array_values(array_intersect($conjuntoA, $conjuntoB));
            case "diferencia":
                return array_values(array_diff($conjuntoA, $conjuntoB));
            default:
                return []; // operación inválida
        }
    }

    // Tomar valores del formulario
    $conjuntoA = obtenerConjunto($_POST["cardinalA"], $_POST["tipo1"]);
    $conjuntoB = obtenerConjunto($_POST["cardinalB"], $_POST["tipo2"]);

    // Imprimir resultados
    echo "Conjunto A: " . implode(", ", $conjuntoA) . "<br>";
    echo "Conjunto B: " . implode(", ", $conjuntoB) . "<br>";

    $resultado = realizarOperacion($conjuntoA, $conjuntoB, $_POST["operacion"]);
    echo "Resultado (" . htmlspecialchars($_POST["operacion"]) . "): " . implode(", ", $resultado);
}
