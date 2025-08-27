<?php
// Ejecuta la función principal solo si llega un POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    iniciar();
}

function iniciar()
{
    // --- Recibir y validar números del jugador ---
    $jugador = [];
    for ($i = 1; $i <= 5; $i++) {
        $num = intval($_POST["num$i"]);
        if ($num < 1 || $num > 48) {
            die("Error: Números deben estar entre 1 y 48.");
        }
        if (in_array($num, $jugador)) {
            die("Error: No se permiten números duplicados.");
        }
        $jugador[] = $num;
    }

    $extraJugador = intval($_POST['extra']);
    if ($extraJugador < 1 || $extraJugador > 48) {
        die("Error: Bolilla extra debe estar entre 1 y 48.");
    }

    // --- Lapsos y costo de jugada ---
    $lapsos = intval($_POST['lapsos']);
    $costoPorJugada = 35;

    // Factor para calcular año aproximado de la jugada (para Pozo)
    $factor = match ($lapsos) {
        2 => 1 / 52,
        8 => 1 / 12,
        96 => 1,
        960 => 10 / 960,
        9600 => 100 / 9600,
        default => 1,
    };

    echo "<h1>Resultados del Cinco de Oro</h1>";
    echo "<table border='1' cellpadding='5'>";
    echo "<tr>
            <th>Jugada</th>
            <th>Bolillas</th>
            <th>Aciertos</th>
            <th>Extra</th>
            <th>Dinero ganado</th>
            <th>Pozo</th>
          </tr>";

    $pozoOro = false;
    $pozoPlata = false;
    $totalDinero = 0;

    // --- Simulación de cada jugada ---
    for ($j = 1; $j <= $lapsos; $j++) {
        $sorteo = bolillero();
        $aciertos = aciertos($jugador, $sorteo);
        $aciertoExtra = hayExtra($extraJugador, $sorteo);
        $dinero = dinero($aciertos, $aciertoExtra);
        $totalDinero += $dinero;

        $pozo = "";
        $clase = "";
        if ($aciertos == 5 && !$pozoOro) {
            $pozo = "Pozo de Oro";
            $pozoOro = true;
            $clase = "pozoOro";
        } elseif ($aciertos == 4 && $aciertoExtra && !$pozoPlata) {
            $pozo = "Pozo de Plata";
            $pozoPlata = true;
            $clase = "pozoPlata";
        }

        $anio = round($j * $factor, 2);

        echo "<tr class='$clase'>
                <td>$j</td>
                <td>" . implode(', ', $sorteo) . "</td>
                <td>$aciertos</td>
                <td>" . ($aciertoExtra ? 'Sí' : 'No') . "</td>
                <td>$$dinero</td>
                <td>" . ($pozo ? "$pozo (año $anio)" : "") . "</td>
              </tr>";
    }

    // --- Estadísticas finales ---
    $totalApostado = $lapsos * $costoPorJugada;
    $saldo = $totalDinero - $totalApostado;

    echo "<h3>Total apostado: $$totalApostado</h3>";
    echo "<h3>Total ganado: $$totalDinero</h3>";
    echo "<h2>Saldo neto: $$saldo</h2>";
}

// =======================
// --- Funciones auxiliares
// =======================

function bolillero()
{
    $bolillas = range(1, 48);
    shuffle($bolillas);
    $sorteo = array_slice($bolillas, 0, 5);
    $sorteo[] = $bolillas[5]; // bolilla extra
    return $sorteo;
}

function aciertos($jugador, $sorteo)
{
    // Compara solo las 5 primeras bolillas
    return count(array_intersect($jugador, array_slice($sorteo, 0, 5)));
}

function hayExtra($extraJugador, $sorteo)
{
    return $extraJugador === $sorteo[5];
}

function dinero($aciertos, $aciertoExtra)
{
    // Premios según la consigna, incluyendo 2 aciertos
    if ($aciertos == 5) return 7000;
    if ($aciertos == 4 && $aciertoExtra) return 1400;
    if ($aciertos == 4) return 350;
    if ($aciertos == 3 && $aciertoExtra) return 140;
    if ($aciertos == 3) return 50;
    if ($aciertos == 2 && $aciertoExtra) return 15;  // Ajusta según consigna
    if ($aciertos == 2) return 5;                    // Ajusta según consigna
    return 0;
}
