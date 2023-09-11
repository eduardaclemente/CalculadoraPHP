<!DOCTYPE html>
<html>
<head>
    <title>Contador de Caracteres de Senha</title>
</head>
<body>
    <h1>Contador de Caracteres de Senha</h1>

    <?php

/* Faça uma solução em PHP que receba uma
senha e informe quantos caracteres têm na
senha escolhida */

    // Verifica se o formulário foi enviado
    if (isset($_POST['senha'])) {
        // Obtém a senha do formulário
        $senha = $_POST['senha'];

        // Conta o número de caracteres na senha
        $numCaracteres = strlen($senha);

        // Exibe o resultado
        echo "<p>A senha digitada possui $numCaracteres caracteres.</p>";
    }
    ?>

    <form method="post" action="">
        <label for="senha">Digite sua senha:</label>
        <input type="password" name="senha" id="senha" required>
        <input type="submit" value="Contar Caracteres">
    </form>
</body>
</html>
