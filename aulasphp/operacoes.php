<?php
# operacoes.php
$SERVIDOR = "localhost";
$USUARIO = "root";
$SENHA = "";
$BASE = "livros";
$TABELA = "livro";
$oper = $_GET["op"];
$oper = ($oper) ? : "X";
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
<?php
switch ($oper) {
    case 'incluir':
        ?>
        <form action="operacoes.php" method="GET">
            <input type="hidden" name="op" value="add">
            <p><label for="livro">Nome do Livro:</label>
            <input type="text" id="livro" name="livro" size="80"></p>
            <p><label for="autor">Nome do Autor:</label>
            <input type="text" id="autor" name="autor"></p>
            <p><label for="personagem">Nome do Personagem:</label>
            <input type="text" id="personagem" name="personagem"></p>
            <p><label for="ano">Ano de Lançamento:</label>
            <input type="number" id="ano" name="ano" min="1895"></p>
            <p><input type="submit" value="Enviar"></p>
        </form>
        <?php
        break;
    case 'add':
        $livro = $_GET["livro"];
        $autor = $_GET["autor"];
        $personagem = $_GET["personagem"];
        $ano = $_GET["ano"];
        $conexao = mysqli_connect($SERVIDOR, $USUARIO, $SENHA, $BASE);
        $sql = "insert into $TABELA (livro, autor, personagem, ano) Values
('$livro', '$autor', '$personagem', $ano)";
        mysqli_query($conexao, $sql);
        mysqli_close($conexao);
        header("Location: http://127.0.0.1/aulasphp/");
        break;
    case 'exc':
        $codigo = $_GET["codigo"];
        $conexao = mysqli_connect($SERVIDOR, $USUARIO, $SENHA, $BASE);
        $sql = "Delete From $TABELA Where codigo = $codigo";
        mysqli_query($conexao, $sql);
        mysqli_close($conexao);
        header("Location: http://127.0.0.1/aulasphp/");
        break;
    case 'alt':
        $codigo = $_GET["codigo"];
        $nome = $_GET["livro"];
        $personagem = $_GET["personagem"];
        $autor = $_GET["autor"];
        $ano = $_GET["ano"];
        ?>
 <form action="operacoes.php" method="GET">
 <input type="hidden" name="op" value="upd">
 <input type="hidden" name="codigo" value="<?php echo $codigo ?>">
 <p><label for="livro">Nome do livro:</label>
 <input type="text" id="livro" name="livro" value="<?php echo $nome ?>" size="80">
</p>
 <p><label for="autor">Nome do Personagem:</label>
 <input type="text" id="personagem" name="personagem" value="<?php echo $personagem ?>">
</p>
 <p><label for="autor">Nome do autor:</label>
 <input type="text" id="autor" name="autor" value="<?php echo
                                                                  $autor ?>"></p>
 <p><label for="ano">Ano de Lançamento:</label>
 <input type="number" id="ano" name="ano" min="1895" value="<?php echo $ano ?>">
</p>
 <p><input type="submit" value="Alterar"></p>
 </form>
<?php
break;
case 'upd':
    $nome = $_GET["livro"];
    $autor = $_GET["autor"];
    $personagem = $_GET["personagem"];
    $ano = $_GET["ano"];
    $codigo = $_GET["codigo"];
    $conexao = mysqli_connect($SERVIDOR, $USUARIO, $SENHA, $BASE);
    $sql = "update $TABELA set livro = '$livro', autor = '$autor',
personagem = '$personagem', ano = '$ano' where codigo = $codigo";
    mysqli_query($conexao, $sql);
    mysqli_close($conexao);
    header("Location: http://127.0.0.1/aulasphp/");
    break;
default:
    echo " <h1>$oper é uma operação não conhecida</h1>";
    echo " <p><a href='http://127.0.0.1/aulasphp/'>Voltar</a></p>";
}
?>
</body>
</html> 