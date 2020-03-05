<?php
session_start();
require 'config.php';

if (empty($_SESSION['logado'])) {
    header("Location: login.html");
    exit;
}

$email = '';
$codigo = '';
$sql = "SELECT email, codigo FROM usuarios WHERE id = '" . addslashes($_SESSION['logado']) . "'";
$sql = $pdo->query($sql);
if ($sql->rowCount() > 0) {
    $info = $sql->fetch();
    $email = $info['email'];
    $codigo = $info['codigo'];
}

if (isset($_GET['ordem']) && empty($_GET['ordem']) == false) {
    $ordem = addslashes($_GET['ordem']);
    $sql = "SELECT * FROM usuarios ORDER BY " . $ordem;
} else {
    $sql = "SELECT * FROM usuarios";
    $ordem = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <h1>Area interna do sistema</h1>
    <p>Usuario: <?php echo $email; ?> - <a href="sair.php">Sair</a></p>
    <p>Link: http://localhost/crud4jobs/cadastrar.php?codigo=<?php echo $codigo; ?></p>

    <table border="1" width="100%">
        <tr>
            <th>Nome</th>
            <th>Código</th>
            <th>Ação</th>
        </tr>
        <?php
        $sql = "SELECT * FROM usuarios";
        $sql = $pdo->query($sql);
        if ($sql->rowCount() > 0) {
            foreach ($sql->fetchAll() as $usuario) {
                echo '<tr>';
                echo '<td><center>' . $usuario['email'] . '</center></td>';
                echo '<td><center>' . $usuario['codigo'] . '</center></td>';
                echo '<td><center><a href="editar.php?id=' . $usuario['id'] . '">Editar</a> - 
                    <a href="excluir.php?id=' . $usuario['id'] . '">Excluir</a></center></td>';
                echo '<tr>';
            }
        }
        ?>

    </table>
</body>

</html>