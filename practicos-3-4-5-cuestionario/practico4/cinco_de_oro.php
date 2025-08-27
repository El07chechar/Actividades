<?php
function iniciar()
{
    // Tomar los números del jugador
    $jugador = [];
    for ($i = 1; $i <= 5; $i++) {
        $jugador[] = intval($_POST["num$i"]);
    }
    $extraJugador = intval($_POST['extra']);
    $lapsos = intval($_POST['lapsos']);

    $totalDinero = 0;

    echo "<h1>Resultados del Cinco de Oro</h1>";

    for ($j = 1; $j <= $lapsos; $j++) {
        $sorteo = bolillero();
        $aciertos = aciertos($jugador, $sorteo);
        $aciertoExtra = hayExtra($extraJugador, $sorteo);

        $dinero = dinero($aciertos, $aciertoExtra);
        $totalDinero += $dinero;

        echo "<p>Jugada $j: Bolillas: " . implode(', ', $sorteo) . "<br>";
        echo "Aciertos: $aciertos, Extra: " . ($aciertoExtra ? 'Sí' : 'No') . "<br>";
        echo "Dinero ganado: $$dinero</p>";

        if ($aciertos == 5) {
            echo "<strong>¡Pozo de Oro acertado en la jugada $j!</strong><br>";
        } elseif ($aciertos == 4 && $aciertoExtra) {
            echo "<strong>¡Pozo de Plata acertado en la jugada $j!</strong><br>";
        }
    }

    echo "<h3>Total ganado: $$totalDinero</h3>";
}

// Función que genera una jugada aleatoria
function bolillero()
{
    $bolillas = range(1, 48);
    shuffle($bolillas);
    $sorteo = array_slice($bolillas, 0, 5);
    $sorteo[] = $bolillas[5]; // bolilla extra
    return $sorteo;
}

// Función que calcula aciertos (sin contar extra)
function aciertos($jugador, $sorteo)
{
    $bolillasSorteo = array_slice($sorteo, 0, 5);
    return count(array_intersect($jugador, $bolillasSorteo));
}

// Función que verifica si acierta la bolilla extra
function hayExtra($extraJugador, $sorteo)
{
    $extraSorteo = $sorteo[5];
    return $extraJugador === $extraSorteo;
}

// Función que calcula dinero ganado
function dinero($aciertos, $aciertoExtra)
{
    if ($aciertos == 5) return 7000;
    if ($aciertos == 4 && $aciertoExtra) return 1400;
    if ($aciertos == 4) return 350;
    if ($aciertos == 3 && $aciertoExtra) return 140;
    if ($aciertos == 3) return 50;
    if ($aciertos == 2 && $aciertoExtra) return 0; // sin premio
    if ($aciertos == 2) return 0;
    return 0;
}

// Ejecutar
iniciar();
