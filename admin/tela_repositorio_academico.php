<?php

$con = new mysqli("baratheon0001.hospedagemdesites.ws","norto_fatecig","freiJoao59","norton_fatecig");
	mysqli_set_charset($con, "utf8");

	if(mysqli_connect_error()):
		echo "Erro na conexão: ".mysqli_connect_error();
	endif;
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Fatec Ipiranga - Repositório Acadêmico">
  <meta name="author" content="Andreza Barbosa">
  <title>Repositório Acadêmico</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">


  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Repositório Acadêmico</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.html">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Repositório Acadêmico</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <!--<a class="nav-link" href="#">
            <i class="fa fa-fw fa-link"></i>-->
            <span class="nav-link-text"></span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
    </div>
  </nav> 
  <div class="content-wrapper">
    <div class="container-fluid">
		
	<!-- Mensagem de sucesso ou fracasso ao cadastrar -->
	<?php
	session_start();
	if(isset($_SESSION['mensagem']) && isset($_SESSION['msg'])):
	?>
	
	<div class="alert alert-warning">
		<?php 
		echo $_SESSION['msg'];
		?>
		<?php echo "<br>"?>
	</div>
		
	<div class="alert alert-success">	
		<?php
		echo $_SESSION['mensagem']; 
		?>
	</div>
	
	<?php
	endif;
	session_unset();
	?>
	
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Repositório Acadêmico</a>
        </li>
        <li class="breadcrumb-item active">TCC</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> TCCs salvos</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<form class="form-inline my-2 my-lg-0 mr-lg-2">
					
            </div>
			
			</form>
              <thead>
                <tr>
                  <th>Título</th>
				  <th>Subtítulo</th>
                  <th>Autores</th>
                  <th>Orientador</th>
                  <th>Data Trabalho</th>
				  <!--<th>Curso</th>-->
                </tr>
              </thead>
              
              <tbody>
			  
				<!-- Vai trazer os campos preenchidos na tabela para a lista-->
				<?php
				$con = new mysqli("baratheon0001.hospedagemdesites.ws","norto_fatecig","freiJoao59","norton_fatecig");
				mysqli_set_charset($con, "utf8");
				
				$sql = "SELECT * FROM trabalho_academico";
				$resultado = mysqli_query($con, $sql);
				while($dados = mysqli_fetch_array($resultado)):
				?>
                <tr>
				  <th><?php echo $dados['titulo']; ?></th>
				  <th><?php echo $dados['subTitulo']; ?></th>
				  <td><?php echo $dados['autores']; ?></td>
				  <td><?php echo $dados['orientador']; ?></td>
				  <td><?php echo $dados['dataTrabalho']; ?></td>
				  
				  <td><a class="btn btn-success" href="editarTCC.php?codigo=<?php echo $dados['codigo']; ?>" >Alterar</a></td>
				  	
				</tr>
				<?php endwhile; 
				mysqli_close($con);	
				?>
				
              </tbody>
            </table>
			<br>
			<a href="cadastroTCC.php" class="btn btn-primary">Adicionar Trabalho</a>
        </div>
      </div>
        
		<div class="card-footer small text-muted">Baixado ontem ás 23:59</div>
    
	</div>
   </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Fatec Ipiranga 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
  </div>
</body>

</html>
