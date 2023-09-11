<!DOCTYPE html>
<html>
<head>
    <title>Conversor de Temperatura</title>
</head>
<body>
    <h1>Conversor de Temperatura</h1>

    <?php
    function converterCelsiusParaFahrenheit($celsius) {
        $fahrenheit = ($celsius * 9/5) + 32;
        return $fahrenheit;
    }


    if (isset($_POST['celsius'])) {
        $celsius = floatval($_POST['celsius']);

        // Converte a temperatura para Fahrenheit
        $fahrenheit = converterCelsiusParaFahrenheit($celsius);

        // Exibe o resultado
        echo "<p>$celsius graus Celsius é equivalente a $fahrenheit graus Fahrenheit.</p>";
    }
    ?>

    <form method="post" action="">
        <label for="celsius">Digite a temperatura em graus Celsius:</label>
        <input type="number" name="celsius" id="celsius" required>
        <input type="submit" value="Converter para Fahrenheit">
    </form>
</body>
</html>
