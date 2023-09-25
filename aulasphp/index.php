<?php
# index.php
$SERVIDOR = "localhost";
$USUARIO = "root";
$SENHA = "";
$BASE = "livros";
$TABELA = "livro";
$conexao = mysqli_connect($SERVIDOR, $USUARIO, $SENHA, $BASE);
if (!$conexao) {
    header("Location: http://127.0.0.1/aulasphp/criar.php");
} else {
    ?>
<!DOCTYPE html>
<html>
<head>
 <title>Livros</title>
 <style>
 table {border-collapse: collapse;}
 td, th {border: 1px solid #000; padding: 8px;}
 th {background-color: #f0f0f0;}
 </style>
</head>
<body>
<?php
$sql = "Select * FROM $TABELA ORDER BY ano, livro";
$dados = mysqli_query($conexao, $sql);
if (mysqli_num_rows($dados) > 0) {
    ?>
 <table>
 <tr><th>Livro</th><th>Personagem</th><th>Autor</th><th>Ano</th><th>Ações</th></tr>
<?php
while ($linha = mysqli_fetch_assoc($dados)) {
    $livro = $linha["livro"];
    $personagem = $linha["personagem"];
    $autor = $linha["autor"];
    $ano = $linha["ano"];
    $codigo = $linha["codigo"];
    echo " <tr><td>$livro</td><td>$personagem</td><td>$autor</td><td>$ano</td><td><a
href='operacoes.php?op=exc&codigo=$codigo'>Excluir</a>&nbsp;<a href='operacoes.php?
op=alt&codigo=$codigo&livro=$livro&personagem=$personagem&autor=$autor&ano=$ano'>Alterar</a>
</td></tr>\n";
}
mysqli_close($conexao);
?>
 </table>
<?php

} else {
    ?>
 <h1>Sem dados disponíveis</h1>
<?php

}
?>
 <p><a href="operacoes.php?op=incluir">Incluir</a></p>
</body>
</html>
<?php

}
?>