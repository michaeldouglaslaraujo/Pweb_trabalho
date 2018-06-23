<?php

	$conexao = mysqli_connect("localhost","root","","pw1") or die("Conexao falhou: " . mysqli_connect_errno());

    $email = '';
    $pass = '';
    
    session_start();

    if(isset($_POST["email"])){
        $email = $_POST["email"];
        $pass = $_POST["password"];

        $login = "SELECT * FROM usuario WHERE email = '{$email}' AND senha = '{$pass}' ";

        $access = mysqli_query($conexao, $login);
        if(!$access)
		{
            die("Falha na consulta ao banco");
        }
		    mysqli_close($conexao);
        
		$result_query = mysqli_fetch_assoc ($access);
        if(empty($result_query)){
            $msg = "Usuário ou senha incorretos.";
            echo "senha errada";
        }else{
			$_SESSION["codigo_usuario"] = $result_query["codigo"];
            $_SESSION["user_portal"] = $result_query["email"];
            header("location:index.html");
        }   
    }
?>
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
</head>x

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header"><h1>Login</div>
      <div class="card-body">
	  <?php if (isset($msg)){ ?>
                <style type="text/css"> #mensagem{ display:block; }</style>
                <div id="mensagem" >
                    <?php echo $msg ?>
                </div>
            <?php } ?>
        <form action="" method="post">
          <div class="form-group">
            <label for="email">E-mail</label>
            <input class="form-control" id="email" type="email" aria-describedby="emailHelp" name="email" placeholder="Digite seu endereço de e-mail."
			value="<?php echo $email; ?>" required>
          </div>
          <div class="form-group">
            <label for="senha">Senha</label>
            <input class="form-control" id="senha" type="password" placeholder="Digite sua senha." name="password"
			 value="<?php echo $pass; ?>" required>
          </div>
		  <!--<button type="submit" id="enviar"	 class="btn btn-primary btn-block" href="index.php">Entrar</button> -->
		  <input class="btn btn-primary btn-block" type="submit" value="Entrar">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Registre-se</a>
          <a class="d-block small" href="forgot-password.php">Esqueceu a Senha?</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
