<?php
session_start();
require 'config.php';

if (!empty($_POST['email'])) {
	$email = addslashes($_POST['email']);
	$senha = md5($_POST['senha']);

	$sql = "SELECT id FROM usuarios WHERE email = '$email' AND senha = '$senha'";
	$sql = $pdo->query($sql);

	if ($sql->rowCount() > 0) {
		$info = $sql->fetch();

		$_SESSION['logado'] = $info['id'];
		header("Location: index.php");
		exit;
	}
}
if (isset($_POST['email']) && !empty($_POST['email'])) {
	$email = addslashes($_POST['email']);
	$pwd = md5(addslashes($_POST['pwd']));
	$sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
	$sql->bindValue(":email", $email, PDO::PARAM_STR);
	$sql->bindValue(":senha", $pwd, PDO::PARAM_STR);
	$sql->execute();
	if ($sql->rowCount() > 0) {
		$data       = $sql->fetch(PDO::FETCH_ASSOC);
		session_start();
		$_SESSION['logado'] = $data['id'];
		header("Location: index.php");
	} else {
		header("Location: login.php");
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
</head>

<body>
	<form method="POST">
		E-mail:<br />
		<input type="email" name="email" /><br /><br />

		Senha:<br />
		<input type="password" name="senha" /><br /><br />

		<input type="submit" value="Entrar">
	</form>
</body>

</html>