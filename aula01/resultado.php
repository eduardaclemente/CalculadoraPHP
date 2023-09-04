<!DOCTYPE html>
<html>
<head>
    <title>Resultado</title>
</head>
<body>
    <h1>Resultado da Operação</h1>

    <?php
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operation = $_POST['operation'];

    switch ($operation) {
        case 'add':
            $result = $num1 + $num2;
            echo "A soma de $num1 e $num2 é: $result";
            break;
        case 'subtract':
            $result = $num1 - $num2;
            echo "A subtração de $num1 por $num2 é: $result";
            break;
        case 'multiply':
            $result = $num1 * $num2;
            echo "A multiplicação de $num1 e $num2 é: $result";
            break;
        case 'divide':
            if ($num2 != 0) {
                $result = $num1 / $num2;
                echo "A divisão de $num1 por $num2 é: $result";
            } else {
                echo "Não é possível dividir por zero.";
            }
            break;
        default:
            echo "Operação inválida.";
    }
    ?>

    <br><br>
    <a href="index.html">Voltar para a calculadora</a>
</body>
</html>

