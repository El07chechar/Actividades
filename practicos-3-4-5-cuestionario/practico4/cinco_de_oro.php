<?php
function iniciar() {
    // Tomar los números del jugador
    $jugador = [];
    for ($i = 1; $i <= 5; $i++) {
        $jugador[] = intval($_POST["num$i"]);
    }
    $extraJugador = intval($_POST['extra']);
    $lapsos = intval($_POST['lapsos']);
    
    $costoPorJugada = 35;
    $totalDinero = 0;

    echo "<h1>Resultados del Cinco de Oro</h1>";

    // Determinar el factor de conversión jugadas → años
    if ($lapsos <= 2) $factor = 0.5; // 1 semana = 2 jugadas → 0.5 semana por jugada
    elseif ($lapsos == 8) $factor = 0.125; // 1 mes = 8 jugadas → 0.125 mes por jugada
    elseif ($lapsos == 96) $factor = 1/12; // 1 año = 96 jugadas → 1/12 año por jugada
    elseif ($lapsos == 960) $factor = 10/960; // 10 años / 960 jugadas
    else $factor = 100/9600; // 100 años / 9600 jugadas

    echo "<table border='1' cellpadding='5' cellspacing='0'>";
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

    for ($j = 1; $j <= $lapsos; $j++) {
        $sorteo = bolillero();
        $aciertos = aciertos($jugador, $sorteo);
        $aciertoExtra = hayExtra($extraJugador, $sorteo);
        $dinero = dinero($aciertos, $aciertoExtra);
        $totalDinero += $dinero;

        $pozo = "";
        if ($aciertos == 5 && !$pozoOro) {
            $pozo = "Pozo de Oro";
            $pozoOro = true;
        } elseif ($aciertos == 4 && $aciertoExtra && !$pozoPlata) {
            $pozo = "Pozo de Plata";
            $pozoPlata = true;
        }

        // Calcular el año aproximado
        $anio = round($j * $factor, 2);

        echo "<tr>
                <td>$j</td>
                <td>" . implode(', ', $sorteo) . "</td>
                <td>$aciertos</td>
                <td>" . ($aciertoExtra ? 'Sí' : 'No') . "</td>
                <td>$$dinero</td>
                <td>" . ($pozo ? "$pozo (año $anio)" : "") . "</td>
              </tr>";
    }

    echo "</table>";

    $totalApostado = $lapsos * $costoPorJugada;
    $saldo = $totalDinero - $totalApostado;

    echo "<h3>Total apostado: $$totalApostado</h3>";
    echo "<h3>Total ganado: $$totalDinero</h3>";
    echo "<h2>Saldo neto: $$saldo</h2>";
}

// Función que genera una jugada aleatoria
function bolillero() {
    $bolillas = range(1, 48);
    shuffle($bolillas);
    $sorteo = array_slice($bolillas, 0, 5);
    $sorteo[] = $bolillas[5]; // bolilla extra
    return $sorteo;
}

// Función que calcula aciertos (sin contar extra)
function aciertos($jugador, $sorteo) {
    $bolillasSorteo = array_slice($sorteo, 0, 5);
    return count(array_intersect($jugador, $bolillasSorteo));
}

// Función que verifica si acierta la bolilla extra
function hayExtra($extraJugador, $sorteo) {
    $extraSorteo = $sorteo[5];
    return $extraJugador === $extraSorteo;
}

// Función que calcula dinero ganado
function dinero($aciertos, $aciertoExtra) {
    if ($aciertos == 5) return 7000;
    if ($aciertos == 4 && $aciertoExtra) return 1400;
    if ($aciertos == 4) return 350;
    if ($aciertos == 3 && $aciertoExtra) return 140;
    if ($aciertos == 3) return 50;
    return 0; // los demás casos no tienen premio
}

// Ejecutar
iniciar();
?>
