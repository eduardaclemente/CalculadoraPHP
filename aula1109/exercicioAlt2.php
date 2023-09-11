<?php

// Idade da pessoa em anos, meses e dias
$anos = 25;
$meses = 6;
$dias = 15;

// Função para verificar se um ano é bissexto
function isBissexto($ano) {
    return ($ano % 4 == 0 && ($ano % 100 != 0 || $ano % 400 == 0));
}

// Número de dias em cada mês (considerando anos bissextos)
$diasPorMes = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

$idadeEmDias = 0;

for ($i = 1; $i <= $anos; $i++) {
    $idadeEmDias += isBissexto(2023 - $i) ? 366 : 365;
}

for ($i = 1; $i <= $meses; $i++) {
    $idadeEmDias += $diasPorMes[$i - 1];
}

$idadeEmDias += $dias;

echo "A idade da pessoa em dias é: $idadeEmDias dias";
?>
