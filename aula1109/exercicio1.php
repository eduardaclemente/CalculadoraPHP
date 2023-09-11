<?php
/* Construa uma solução em PHP que, tendo como dados de entrada 
dois pontos quaisquer no plano, P(x1,y1) e P(x2,y2),
escreva a distância entre eles */

// Coordenadas do primeiro ponto (x1, y1)
$x1 = 3;
$y1 = 4;

// Coordenadas do segundo ponto (x2, y2)
$x2 = 6;
$y2 = 8;

// Calcula a distância entre os dois pontos
$distancia = sqrt(pow($x2 - $x1, 2) + pow($y2 - $y1, 2));

// Exibe a distância
echo "A distância entre os pontos P($x1, $y1) e P($x2, $y2) é: $distancia";
?>