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
	} else {
		header("Location: login.php");
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
    <link rel="stylesheet" href="./assets/css/main.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <form action="login.php" method="POST">
            <div>
                <img src="./assets/images/login-image.png" alt="Logo" class="logo">
            </div>
            <div id="labels">
                <div class="item">
                    <input class="label" type="email" name="email" placeholder="Email" />
                </div>

                <div class="item">
                    <input class="label" type="password" name="senha" placeholder="Senha" />
                </div>
                <div>
                    <div class="buttom">
                        <input class="button" type="submit" value="Entrar">
                    </div>
                </div>
            </div>
        </form>
        </section>
</body>

</html>