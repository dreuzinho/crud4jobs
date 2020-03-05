<?php
require 'config.php';

$id = 0;

if (isset($_GET['id']) && empty($_GET['id']) == false) {
    $id = addslashes($_GET['id']);
}

if (isset($_POST['email']) && empty($_POST['email']) == false) {
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));

    $sql = "UPDATE usuarios SET email = '$email', senha = '$senha' WHERE id = '$id'";
    $pdo->query($sql);
    header("Location: index.php");
}

$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$sql = $pdo->query($sql);
if ($sql->rowCount() > 0) {
    $dado = $sql->fetch();
} else {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<body>
    <form method="POST">
        Email.:<br />
        <input type="text" name="email" value="" /><br /><br />
        Senha:<br />
        <input type="text" name="senha" value="" /><br /><br />

        <input type="submit" value="Atualizar" />
    </form>
</body>

</html>