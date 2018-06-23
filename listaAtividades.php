<?php
	
	$codigoTurma = $_GET["turma"];
	
	
	$conexao = mysqli_connect("baratheon0001.hospedagemdesites.ws","norto_fatecig","freiJoao59","norton_fatecig");
	$sql = "select * from atividade where codigoTurma=$codigoTurma and curdate between dtInicio and dtFim";
	$result = mysqli_query($conexao, $sql);
	while ($registro = @mysqli_fetch_array($result)) 
	{
		$codigo = $registro ["codigo"];
		$titulo = $registro ["titulo"];
		echo"<option value='$codigo'> $titulo </option>";
	}					
	$conexao->close();
?>