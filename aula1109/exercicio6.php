<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Área de Pizza</title>
</head>
<body>
    <h1>Calculadora de Área de Pizza</h1>

    <?php
    /* Faça uma solução em PHP que calcule a área
    de um pizza, sabendo-se a medida do seu
    diâmetro */
    function calcularAreaDaPizza($diametro) {
        $raio = $diametro / 2;
        $area = M_PI * pow($raio, 2);
        return $area;
    }

    if (isset($_POST['diametro'])) {
        $diametro = floatval($_POST['diametro']);
    
        $saborPizza = $_POST['sabor_pizza'];

        $areaDaPizza = calcularAreaDaPizza($diametro);

        echo "<p>Você escolheu uma pizza de sabor '$saborPizza' com diâmetro de $diametro cm.</p>";
        echo "<p>A área da pizza é de " . number_format($areaDaPizza, 2) . " cm².</p>";
    }
    ?>

    <form method="post" action="">
        <label for="sabor_pizza">Escolha o sabor da pizza:</label>
        <select name="sabor_pizza" id="sabor_pizza" required>
            <option value="Professor Cid">Baiana</option>
            <option value="Margherita">Margherita</option>
            <option value="Pepperoni">Pepperoni</option>
            <option value="Calabresa">Calabresa</option>
            <option value="Portuguesa">Portuguesa</option>
            <option value="Frango">Frango c/ Capitury</option>
            <option value="4 queijos">4 Queijos</option>
        </select>

        <br>

        <label for="diametro">Digite o diâmetro da pizza (em cm):</label>
        <input type="number" name="diametro" id="diametro" required>
        <input type="submit" value="Calcular Área">
    </form>
</body>
</html>
