<?php
// Indicar luego de cada línea como queda estructurado el array. 
$a = array(5 => 1, 12 => 2);
// Estructura del array $a
// [5] => 1
// [12] => 2
var_dump($a);
$a[] = 56;
// Estructura del array $a
// [5] => 1
// [12] => 2
// [13] => 56
var_dump($a);
$a['x'] = 42;
// Estructura del array $a
// [5] => 1
// [12] => 2
// [13] => 56
// [x] => 42
var_dump($a);
unset($a[5]);
// Estructura del array $a
// [12] => 2
// [13] => 56
// [x] => 42
var_dump($a);
unset($a);
// vacio
