<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<?php include('../includes/head.php') ?>
</head>
<body>
	<?php include('../includes/menu.php') ?>
	<main class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4 form-login" style="margin-top: 8%;">
				<form action="../controle/autenticador.php" method="post">
					<div class="form-group">
						<label for="email">Usuário</label>
						<input type="text" name="usuario" id="usuario" class="form-control" placeholder="Seu usuário" required>
					</div>
					<div class="form-group">
						<label for="senha">Senha</label>
						<input type="password" name="senha" id="senha" class="form-control" placeholder="Sua senha" required>
					</div>
					<button type="submit" class="btn btn-md btn-primary btn-block">ENTRAR</button>
					<a href="cadastro.php" class="text-success nav-link">Cadastre-se</a>
				</form>
			</div>
		</div>
	</main>
	<?php include('../includes/footer.php');?>
</body>
</html>