<?php
/* Faça uma solução em PHP que leia a idade de
uma pessoa expressa em anos, meses e dias e
mostre-a expressa apenas em dias */

// Idade da pessoa em anos, meses e dias
$anos = 25;
$meses = 6;
$dias = 15;

$diasPorMes = 30.44;

$idadeEmDias = ($anos * 365) + ($meses * $diasPorMes) + $dias;

echo "A idade da pessoa em dias é: $idadeEmDias dias";
?>
