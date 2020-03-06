<?php
session_start();
require 'config.php';

if (!empty($_GET['codigo'])) {
	$codigo = addslashes($_GET['codigo']);

	$sql = "SELECT * FROM usuarios WHERE codigo = '$codigo'";
	$sql = $pdo->query($sql);

	if ($sql->rowCount() == 0) {
		header("Location: login.php");
		exit;
	}
} else {
	header("Location: login.php");
	exit;
}

if (!empty($_POST['email'])) {
	$email = addslashes($_POST['email']);
	$senha = md5($_POST['senha']);

	$sql = "SELECT * FROM usuarios WHERE email = '$email'";
	$sql = $pdo->query($sql);

	if ($sql->rowCount() <= 0) {

		$codigo = md5(rand(0, 99999) . rand(0, 99999));
		$sql = "INSERT INTO usuarios (email, senha, codigo) VALUES ('$email', '$senha', '$codigo')";
		$sql = $pdo->query($sql);

		unset($_SESSION['logado']);

		header("Location: index.php");
		exit;
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="./assets/css/main.css">
</head>

<body>
    <div class="container">
        <form method="POST" action="cadastrar.php">
            <div>
                <img src="./assets/images/cadastro-image.png" alt="Logo" class="logo">
            </div>
            <div id="labels">
                <div class="item">
                    <input class="label" type="email" name="email" placeholder="Email" />
                </div>
                <div class="item">
                    <input class="label" type="password" name="senha" placeholder="Senha" />
                </div>
                <div class="buttom">
                    <input class="button" type="submit" value="Cadastrar" />
                </div>
            </div>
    </div>
    </form>
    </div>
</body>

</html>