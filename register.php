<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Projeto PWeb</title>
  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header"><h3>Cadastro de Usuário</h3></div>
      <div class="card-body">
        <form method="post" action="register.php">
		  <div class="form-group">
            <label for="nome">Nome</label>
            <input class="form-control" name="nome" id="nome" type="text" aria-describedby="nameHelp" placeholder="Digite seu nome." required >          
          </div>
          <div class="form-group">
            <label for="email">E-mail</label>
            <input class="form-control" name="email" id="email" type="email" aria-describedby="emailHelp" placeholder="Digite seu E-mail." required >
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="senha">Senha</label>
                <input class="form-control" name="senha" id="senha" type="password" placeholder="Digite a senha." required>
              </div>
              <div class="col-md-6">
                <label for="confirmaSenha">Confirme a senha</label>
                <input class="form-control" id="ConfirmaSenha" type="password" placeholder="Digite a senha novamente." oninput="validaSenha(this)" required>
              </div>
            </div></br>
					  
		  <input type="submit" name="btn1" class="btn btn-primary btn-block"  value="Cadastrar" href="login.html">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Área de login</a>
        </div>
      </div>
    </div>
  </div>
  <?php

		if(isset($_POST["btn1"]))
		{
		inserir();
		}
	
	?>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>

<script>
function validaSenha (input){ 
	if (input.value != document.getElementById('senha').value) {
    input.setCustomValidity('Repita a senha corretamente');
  } else {
    input.setCustomValidity('');
  }
} 
</script>
<?php
function inserir()
	{ 
			$con = mysqli_connect("localhost","root","","pw1");
			$nome	= $_POST["nome"];
			$email	= $_POST["email"];
			$senha	= $_POST["senha"];
			$sql = "insert into usuario(nome, email, senha, status) values('$nome', '$email', '$senha', '1')";
			mysqli_query($con,$sql);
			$con->close();
	}
?>
