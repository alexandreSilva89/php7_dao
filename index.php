<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Access Object</title>
</head>
<body>
    <?php
        require_once "config.php";

        $sql = new Conexao();

        $usuarios = $sql->select("SELECT * FROM usuarios");

        echo json_encode($usuarios);
    ?>
</body>
</html>