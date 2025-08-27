<?php

function arrayVacio()
{
    $vacio = array_fill(0, 101, false);
    return $vacio;
}

function arrayUniverso()
{
    $universo = array_fill(0, 101, true);
    return $universo;
}

function arrayPares()
{
    $pares = [];
    for ($i = 0; $i <= 100; $i++) {
        $pares[$i] = ($i % 2 === 0);
    }
    return $pares;
}

function arrayImpares()
{
    $impares = [];
    for ($i = 0; $i <= 100; $i++) {
        $impares[$i] = ($i % 2 !== 0);
    }
    return $impares;
}

function arrayAzar()
{
    $azar = [];
    for ($i = 0; $i <= 100; $i++) {
        $azar[$i] = (bool)rand(0, 1);
    }
    return $azar;
}

function imprimirIndices($array)
{
    foreach ($array as $i => $valor) {
        if ($valor === true) {
            echo $i . "\n";
        }
    }
    echo "\n";
}

$vacio = arrayVacio();
$universo = arrayUniverso();
$pares = arrayPares();
$impares = arrayImpares();
$azar = arrayAzar();

echo "VACIO: \n";
imprimirIndices($vacio);

echo "UNIVERSO: \n";
imprimirIndices($universo);

echo "PARES: \n";
imprimirIndices($pares);

echo "IMPARES: \n";
imprimirIndices($impares);

echo "AZAR: \n";
imprimirIndices($azar);
