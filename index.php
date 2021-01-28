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

    /* Carrega um usuario
        $newuser = new Usuario();
        $newuser->loadById(2);
        echo $newuser;
    */
   //carrega uma lista de usuarios

   /*
   $listando = Usuario::getList();
   echo json_encode($listando);
*/

//Carrega uma lista de usuarios pesquisando pelo login

//$search = Usuario::search('jo');
//echo json_encode($search);

$usuario = new Usuario();
$usuario->login("alexandre", "1234");

echo $usuario;

    ?>
</body>
</html>