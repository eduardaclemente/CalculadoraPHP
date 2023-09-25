<?php
# criar.php
$SERVIDOR = "localhost";
$USUARIO = "root";
$SENHA = "";
$BASE = "livros";
$TABELA = "livro";
$conexao = mysqli_connect($SERVIDOR, $USUARIO, $SENHA);
if (!$conexao) {
    die("Não foi possível conectar ao servidor de banco de dados");
} else {
    $sql = "Create Database $BASE";
    if (mysqli_query($conexao, $sql)) {
        mysqli_close($conexao);
        $conexao = mysqli_connect($SERVIDOR, $USUARIO, $SENHA, $BASE);
        if (!$conexao) {
            die("Não foi possível conectar na base de dados");
        } else {
            $sql = "Create Table $TABELA (codigo INT(6) UNSIGNED AUTO_INCREMENT PRIMARY
KEY, livro VARCHAR(70) not null, autor VARCHAR(40) not null, personagem
VARCHAR(40) null, ano SMALLINT not null)";
            if (mysqli_query($conexao, $sql)) {
                $sql = "insert into $TABELA (livro, autor, personagem, ano) Values ('1984', 'George Orwell', 'Winston', 1948)";
                if (mysqli_query($conexao, $sql)) {
                    $sql = "insert into $TABELA (livro, autor, personagem, ano) Values ('Guia dos Mochileiros das Galáxias', 'Douglas Adam', 'Trillian MacMillan', 1985)";
                    mysqli_query($conexao, $sql);
                    $sql = "insert into $TABELA (livro, autor, personagem, ano) Values ('Um estranho no ninho', 'Ken Kesey', 'Randle', 1962)";
                    mysqli_query($conexao, $sql);
                    $sql = "insert into $TABELA (livro, autor, personagem, ano) Values ('Minha coisa favorita é monstro', 'Emil Ferris', 'Karen Reyes', 2016)";
                    mysqli_query($conexao, $sql);
                    mysqli_close($conexao);
                    header("Location: http://127.0.0.1/aulasphp/");
                } else {
                    die("Falha na inserção de dados");
                }
            } else {
                die("Não foi possível criar a tabela de filmes");
            }
        }
    } else {
        die("Não foi possível criar a base de dados");
    }
}
?>