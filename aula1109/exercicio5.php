<?php

function calcularArrecadacaoTotal($quantidadePaezinhos, $quantidadeBroas) {
    $precoPaezinho = 0.12;
    $precoBroa = 1.50;
    $arrecadacaoTotal = ($quantidadePaezinhos * $precoPaezinho) + ($quantidadeBroas * $precoBroa);
    return $arrecadacaoTotal;
}


function calcularValorPoupanca($arrecadacaoTotal) {
    $percentualPoupanca = 0.10; // 10%
    $valorPoupanca = $arrecadacaoTotal * $percentualPoupanca;
    return $valorPoupanca;
}

$quantidadePaezinhos = 100; 
$quantidadeBroas = 50;     

$arrecadacaoTotal = calcularArrecadacaoTotal($quantidadePaezinhos, $quantidadeBroas);

$valorPoupanca = calcularValorPoupanca($arrecadacaoTotal);

echo "Arrecadação total do dia: R$ " . number_format($arrecadacaoTotal, 2, ',', '.') . "<br>";
echo "Valor a ser guardado na poupança: R$ " . number_format($valorPoupanca, 2, ',', '.');
?>
