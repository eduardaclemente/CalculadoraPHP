<?php

function calcularCustoAoConsumidor($custoDeFabrica) {
    $porcentagemDistribuidor = 0.28;
    $impostos = 0.45;
    $custoAoConsumidor = $custoDeFabrica + ($custoDeFabrica * $porcentagemDistribuidor) + ($custoDeFabrica * $impostos);
    return $custoAoConsumidor;
}

$custoDeFabrica = 25000; // Insere o valor de custo

$custoAoConsumidor = calcularCustoAoConsumidor($custoDeFabrica);

echo "O custo ao consumidor do carro é: R$ " . number_format($custoAoConsumidor, 2, ',', '.');
?>
