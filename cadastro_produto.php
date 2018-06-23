<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="cadastro_produto.css">
		<title>Projeto Pweb - Cadastro de Produto </title>
	</head>
	<body>
		<div id="fundo">
			<div id="topo">
				<h1> Cadastro de Produto </h1>
			</div>
			<div id="corpo">
				<div id="input">
					Nome:  </br><input type="txtNomeProduto" id="txtNomeProduto" required  placeholder=" Entre com o nome do Produto"/><br/><br/>
					Descritivo do Produto:</br> <input type="txtDescricaoProduto" id="txtDescricaoProduto" required  placeholder=" Entre com o Descrição do Produto"/><br/><br/>
					Custo de Aquisicao: </br><input type="numAquisicaoProd" id="numAquisicaoProd" required  placeholder=" Entre com o valor de Aquisição do Produto"/><br/><br/>
					Porcentagem de Lucro desejado:</br> <input type="numLucroProd" id="numLucroProd" required  placeholder=" Entre com o Lucro desejado sobre a unidade do produto"/><br/><br/>
					Valor de Venda: </br><input type="numValorVendaProd" id="numValorVendaProd" required  placeholder=" Valor de Venda do Produto (Preenchido Automaticamente)."/><br/><br/>
				</div>
				
				<label><input type="buttom"  name="cadastrar" value="Cadastrar" href="cadastro_produto.php" /> </label><br/><br/>
				<label><input type="buttom"  name="voltar" value="Voltar" onclick="voltar()";/> </label><br/><br/>
			</div>
		</div>
	
				<?php
					if(isset($_POST["cadastrar"]))
					{
						inserir();
					}
				?>
	</body>
</html>

<script lang="javascript" src="jquery-3.3.1.min.js"></script>
<script lang="javascript">


function voltar()
{
	$(location).attr('href', 'menu.html');
}

</script>

<?php
function inserir()
	{ 
			$con = mysqli_connect("localhost","root","","pw1");
			$nome_produto	= $_POST["txtNomeProduto"];
			$descritivo_produto	= $_POST["txtDescricaoProduto"];
			$custo_aquisicao	= $_POST["numAquisicaoProd"];
			$porcentagem_lucro	= $_POST["numLucroProd"];
			$valor_venda	= $_POST["numValorVendaProd"];
			$sql = "insert into produto(nome_produto, descritivo_produto, custo_aquisicao, porcentagem_lucro, valor_venda, status) values
			              ('$nome_produto', '$descritivo_produto', '$custo_aquisicao', '$porcentagem_lucro', '$valor_venda', '1')";
			mysqli_query($con,$sql);
			$con->close();
	}
?>