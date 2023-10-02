<?php
/*
Abra seu ambiente MySQL, crie o banco de dados boasaude com o comando
create database boasaude;

Acesse a base criada com o comando
use boasaude;

Execute os comandos do arquivo bsaude.sql
*/

if (isset($_GET['op'])) {
	$op = $_GET['op'];
} else {
	$op = "Non";
}

switch ($op) {
	case 'nova':
?>
<!DOCTYPE html>
<html>
	<head><title>Novo agendamento</title></head>
	<body>
		<form action="controle.php" method="GET">
			<input type="hidden" name="op" value="new">
   <p><label for="paciente">Nome do Paciente:</label>
    <select id="paciente" name="paciente">
<?php
  $con = mysqli_connect('localhost', 'root', '12345678', 'boasaude'); 
  $dados = mysqli_query($con, "select * from paciente order by nome");
  mysqli_close($con);
  echo mysqli_num_rows($dados);
  while ($linha = mysqli_fetch_assoc($dados)) {
  	$id = $linha["id_pac"];
  	$nome = $linha["nome"];
  	echo "     <option value=\"$id\">$nome</option>";
  }
?>
    </select></p>
   <p><label for="medico">Nome do Médico:</label>
    <select id="medico" name="medico">
<?php
  $con = mysqli_connect('localhost', 'root', '12345678', 'boasaude'); 
  $dados = mysqli_query($con, "select * from medico order by nome");
  mysqli_close($con);
  while($linha = mysqli_fetch_assoc($dados)){
  	$crm = $linha["crm"];
  	$nome = $linha["nome"];
  	$espec = $linha["especialidade"];
  	echo "     <option value=\"$crm\">$nome ($espec)</option>";
  }
?>
    </select></p>
   <p><label for="data">Data da Consulta:</label>
    <input type="date" id="data" name="data"></p>
   <p><label for="hora">Hora da Consulta:</label>
    <input type="time" id="hora" name="hora"></p>
   <p><label for="carteira">Carteira: </label>
    <select id="carteira" name="carteira">
    	<option value="Convênio">Convênio</option>
    	<option value="Particular">Particular</option>
    	<option value="Plano">Plano</option>
    </select></p> 
   <p><input type="submit" value="Agendar Consulta"></p>
</form>
	</body>
</html>
<?php	 
		break;
	case 'new':
	  $id_pac = $_GET["paciente"];
	  $crm = $_GET["medico"];
	  $data = $_GET["data"];
	  $hora = $_GET["hora"];
	  $carteira = $_GET["carteira"];
	  $sql = "insert into consulta (data, id_pac, crm, carteira) values (str_to_date(\"$data $hora\",\"%Y-%m-%d %H:%i\"), $id_pac, $crm, \"$carteira\")";
   $con = mysqli_connect('localhost', 'root', '12345678', 'boasaude'); 
   $dados = mysqli_query($con, $sql);
   mysqli_close($con);
   header("Location: index.php");
	 break;
	default:
		die("Operação desconhecida");
		break;
}
?>