<?php require 'connexion.php'?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
  <?php 
    
    $sql = $pdoCV->query(" SELECT * FROM t_users ");
    $line_user = $sql->fetch();

    
    ?>
    <title><?php  ?></title>
</head>
<body>

    <h1>BACK OFFICE : TAREK CV</h1>
  

    <?php 
        echo $line_user['firstname'];
    ?>
    
</body>
</html>