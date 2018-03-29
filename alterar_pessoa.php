<?php
	include_once("registra_pessoa.php");

	if(!$_SESSION['usuario']){
		header('Location: index.php?erro=1');
	}

	$pessoa = selectIdPessoas($_POST["id"]);

?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Despesas</title>

		<!-- jquery - link cdn -->

		<script src="https://code.jquery.com/jquery-3.2.1.min.js"
		  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
		  crossorigin="anonymous"></script>

		<script type="text/javascript" src="js/jquery.mask.min.js"/></script>


		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<!-- bootstrap - link cdn -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link href="estilo.css" rel="stylesheet">
	</head>

	<body>

		<!-- Static navbar -->
		<nav class="navbar navbar-fixed-top navbar-inverse navbar-transparente">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#barranavegacao">
				        <span class="sr-only">Alternar navegação</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
     				</button>

     				<a href="home.php" class="navbar-brand">
     				   <span class="img-logo">Despesas</span>
     				</a>
     			</div>

     			<div class="collapse navbar-collapse" id="barranavegacao">
					<ul class="nav navbar-nav">
				      <li><a href="home.php">Home</a></li>
				      <li class="dropdown active">
				        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Cadastro
				        <span class="caret"></span></a>
				        <ul class="dropdown-menu">
				          <li><a href="inserir_pessoa.php">Cadastro de Clientes</a></li>
				          <li><a href="inserir_produto.php">Cadastro de Produtos</a></li>
				        </ul>
				      </li>
				      <li class="dropdown">
				        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Consultas
				        <span class="caret"></span></a>
				        <ul class="dropdown-menu">
				          <li><a href="consulta_clientes.php">Consulta de Clientes</a></li>
				          <li><a href="consulta_produtos.php">Consulta de Produtos</a></li>
				          <li role="separator" class="divider"></li>
				          <li><a href="consulta_contas.php">Consulta de Contas a Pagar</a></li>
				          <li><a href="consulta_contas_receber.php">Consulta de Contas a Receber</a></li>
				      </ul>
				      <li class="dropdown">
				        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Financeiro
				        <span class="caret"></span></a>
				        <ul class="dropdown-menu">
				          <li><a href="inserir_conta.php">Contas a Pagar</a></li>
				          <li><a href="inserir_recebimento.php">Contas a Receber</a></li>
				        </ul>
				      </li>


				    </ul>
				
				      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="">Ajuda</a>
        </li>
        <li class="divisor" role="separator">
        </li>
        <li>
          <a href="sair.php">Sair</a>
        </li>
    </ul>
</div>


			</div>
		</nav>
		<br><br><br><br><br><br><br>

		<div class="container">
			<div class="col-md-6">
		<form name="dadosPessoa" action="registra_pessoa.php" method="POST">
			<div class="form-group">
				<label style="color:#E4CDAC; font-size: 17px; font-family:Arial" for="nome">Nome</label>
				<input type="text" class="form-control" id="nome" name="nome" value="<?=$pessoa["nome"]?>" placeholder="Insira um nome" size="20">
			</div>

			<div class="form-group">
				<label style="color:#E4CDAC; font-size: 17px; font-family:Arial" for="datanascimento">Data de Nascimento</label>
				<input type="date" class="form-control" name="nascimento" value="<?=$pessoa["nascimento"]?>" id="datanascimento">
			</div>

			<div class="form-group">
				<label style="color:#E4CDAC; font-size: 17px; font-family:Arial" for="telefone">Telefone</label>
				<input type="text" class="form-control" name="telefone" id="telefone" value="<?=$pessoa["telefone"]?>"/>
				<script type="text/javascript">$("#telefone").mask("(00) 00000-0000");</script>
			</div>

			<div class="form-group">
				<label style="color:#E4CDAC; font-size: 17px; font-family:Arial" for="endereco">Endereço</label>
				<input type="text" class="form-control" name="endereco" value="<?=$pessoa["endereco"]?>" id="endereco" size="20">
			</div>

			<input type="hidden" name="acao" value="alterar">
			<input type="hidden" name="id" value="<?=$pessoa["id"]?>"/>

			<div class="form-group">
				<button onclick="msgSucesso()" type="submit" value="Enviar" name="Enviar" class="btn customizado btn-roxo btn-lg">Alterar</button>
			</div>

			<script>
			function msgSucesso(){
				alert('Pessoa alterada com sucesso!');
			}
			</script>

		</form>
	</div>
</div>


		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	</body>
</html>