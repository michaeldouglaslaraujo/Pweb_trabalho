<?php

	session_start();

	$con = new mysqli("baratheon0001.hospedagemdesites.ws","norto_fatecig","freiJoao59","norton_fatecig");
	mysqli_set_charset($con, "utf8");

	if(mysqli_connect_error()):
		echo "Erro na conexão: ".mysqli_connect_error();
	endif;

if(isset($_POST['editar'])):
	
	$titulo = mysqli_escape_string($con, $_POST['titulo']);
	$subTitulo = mysqli_escape_string($con, $_POST['subTitulo']);
	$aluno1 = mysqli_escape_string($con, $_POST['aluno1']);
	$aluno2 = mysqli_escape_string($con, $_POST['aluno2']);
	$aluno3 = mysqli_escape_string($con, $_POST['aluno3']);
	$aluno4 = mysqli_escape_string($con, $_POST['aluno4']);
	$autores =  mysqli_escape_string($con, $_POST['aluno1'].', '.$_POST['aluno2'].', '.$_POST['aluno3'].', '.$_POST['aluno4']);
	$orientador = mysqli_escape_string($con, $_POST['orientador']);
	$resumo = mysqli_escape_string($con, $_POST['resumo']);
	$resumoIngles = mysqli_escape_string($con, $_POST['resumoIngles']);
	$palavrasChaves = mysqli_escape_string($con, $_POST['palavrasChaves']);
	$dataTrabalho = mysqli_escape_string($con, $_POST['dataTrabalho']);
	
	$curso = mysqli_escape_string($con, $_POST['curso']);
	$status = mysqli_escape_string($con, $_POST['status']);
	$url = mysqli_escape_string($con, $_POST['url']);
	$arquivo = mysqli_escape_string($con, $_POST['arquivo']);
	
	$codigo = mysqli_escape_string($con, $_POST['codigo']);
	

	$sql = "UPDATE trabalho_academico SET titulo = '$titulo', subTitulo = '$subTitulo', autores = '$autores', orientador = '$orientador', resumo = '$resumo', 
	resumoIngles = '$resumoIngles', dataTrabalho = '$dataTrabalho' WHERE codigo = '$codigo'"; 
		
	
	if(mysqli_query($con, $sql)):
		$_SESSION['mensagem'] = "Atualizado com sucesso!";
		header('Location: ../tela_repositorio_academico.php');
	else:
		$_SESSION['mensagem'] = "Erro ao atualizar";
		header('Location: ../tela_repositorio_academico.php');
	endif;
	
endif;
mysqli_close($con);	
?>