<?php
// Indicar la estructura (clave => valor) de cada uno de los siguientes arrays.
$a1 = array(7, 8, 0);
echo "Array 1: " . print_r($a1, true);
// Estructura del array $a1
// Clave => Valor
// 0 => 7
// 1 => 8
// 2 => 0
$a2 = array('a' => "b", 4);
echo "Array 2: " . print_r($a2, true);
// Estructura del array $a2
// Clave => Valor
// a => b
// 0 => 4
$a3 = array("a", "b", 6 => "c", "d");
echo "Array 3: " . print_r($a3, true);
// Estructura del array $a3
// Clave => Valor
// 0 => a
// 1 => b
// 6 => c
// 7 => d
$a4 = array('a' => "b", 'b' => "a", 1 => -1, -1 => 1);
echo "Array 4: " . print_r($a4, true);
// Estructura del array $a4
// Clave => Valor
// a => b
// b => a
// 1 => -1
// -1 => 1
$a5 = array(1 => "a", '1' => "b", 1.5 => "c", true => "d");
echo "Array 5: " . print_r($a5, true);
// Estructura del array $a5
// Clave => Valor
// 1 => a
// 1 => b
// 1 => c
// 1 => d

// Resultado [1] => d

$a6 = array(10, 5 => 6, 3 => 7, 'a' => 4, 11, '8' => 2, '02' => 77, 0 => 12);
echo "Array 6: " . print_r($a6, true);
// Estructura del array $a6
// Clave => Valor
/** Estructura del array $a6
 *     [0] => 12
 *     [5] => 6
 *     [3] => 7
 *     [a] => 4
 *     [6] => 11
 *     [8] => 2
 *     STRING[02] => 77  
 */