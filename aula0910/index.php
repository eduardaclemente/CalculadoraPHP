<?php
$SERVIDOR = "localhost";
$USUARIO = "root";
$SENHA = "";
$BASE = "boasaude";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Agendamento da Clínica Boa Saúde</title>
		<style>
			* {font-family: Verdana, sans-serif; background-color: #EDE5DF; color: #252525;}
			div {margin: 2px;}
			h1, h2 {text-align: center; background-color: #FFB486;}
			img {background-color: #FFB486;}
			table {border-collapse: collapse; margin: auto;}
			th {background-color: #805B44; color: #EDE5DF;}
			a {text-decoration: none;}
			th a {background-color: #805B44; color: #EDE5DF;}
			th, td {padding: 5px;}
			table, th, td {border: 1px solid #CC916C;}
			#cab {clear: both; display: flex; background-color: #FFB486;}
			#logo {width: 20%; float: left;}
			#topo {width: 70%; float: left;}
			#logo, #topo {height: 90%; background-color: #FFB486;}
			#area {text-align: center; width: 95%;}
			#bot {margin-bottom: 10px;}
			#rodape {text-align: center; font-size: 60%; background-color: #FFB486;}
			#rodape p {background-color: #FFB486; padding: 3px; margin: 2px;}
			.botao {display: inline-block; padding: 10px 20px; font-size: 16px;
				font-weight: bold; text-align: center;	background-color: #FFF06F; 
				color: #252525; border-radius: 5px; border: 2px solid #FFB486;}
		</style>
	</head>
	<body>
		<div id="cont">
			<div id="cab">
				<div id="logo">
					<img src="logo.png">
				</div>
				<div id="topo">
					<h1>Clínica Boa Saúde</h1>
					<h2>Agendamento de consulta</h2>
				</div>
			</div>
			<div id="area">
				<h3>Agenda</h3>
				<table>
					<tr><th>Data</th><th>Horário</th><th>Paciente</th>
						<th>Médico <a href="controle.php?op=newM" title="Novo médico">&oplus;</a></th>
						<th>Carteira</th><th></th></tr>
<?php
$con = mysqli_connect($SERVIDOR, $USUARIO, $SENHA, $BASE);
$dados = mysqli_query($con, "select * from vProxConsultas");
mysqli_close($con);
while ($linha = mysqli_fetch_assoc($dados)) {
	$id = $linha["id_consulta"];
	$dia = $linha["data_c"];
	$hora = $linha["hora"];
	$pac = $linha["paciente"];
	$med = $linha["medico"];
	$cart = $linha["carteira"];
	$cancela = $linha["dif"] > 48 ? "<a href=\"controle.php?op=canc&id=$id\">&#x1F5D1;</a>" : "&nbsp;" ;
 echo "<tr><td>$dia</td><td>$hora</td><td>$pac</td><td>$med</td><td>$cart</td>" . 
  "<td>$cancela <a href=\"controle.php?op=alt&id=$id\">&#9842;</a></td></tr>";
}
?>
				</table>
				<p id="bot">
					<a href="controle.php?op=nova" class="botao">Novo agendamento</a>
				</p>
			</div>
			<div id="rodape">
				<p>Clínica Boa Saúde</p>
				<p>Travessa das Trapalhadas, 789</p>
				<p>Hospitápolis, Felicidade do Norte</p>
			</div>
		</div>
	</body>
</html>