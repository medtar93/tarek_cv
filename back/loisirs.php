<?php require 'connexion.php';

//insertion d'un loisir 
if(isset($_POST['loisir']) && $_POST['loisir']!='' ){// si on areçu un nouveau loisir 
    $loisir = addslashes($_POST['loisir']);
    $pdoCV->exec("INSERT INTO t_loisirs VALUES (NULL, '$loisir','1')");

    header("location: ../back/loisirs.php");
        exit();
    } //fin if

    //suppression d'un loisir de la BDD
if(isset($_GET['id_loisir'])){ // on recupère le loisir dans l'url par son id 
    
    $efface = $_GET['id_loisir']; //je passe l'id dans une variable $efface

    $sql = "DELETE FROM t_loisirs WHERE id_loisir = '$efface' ";//delete de la base 
    $pdoCV->query($sql);// on peut le faire avec exec également 

    header("location: ../back/loisirs.php");
    exit();

}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title></title>
</head>
<body>
<?php

       // Requête pour compter et chercher plusieurs enregistrements on ne peut compter qui si on a préparer(avec : prepare) la rrequête

       $sql = $pdoCV -> prepare("SELECT * FROM t_loisirs");

       $sql -> execute();

       $nbr_loisirs = $sql -> rowCount();

   ?>
    <h1>BACK OFFICE : TAREK CV</h1>
    <h2>Ajout et liste des loisirs</h2>
  
<div>
    <table border="1">
        <thead>
            <tr>
                <th>Loisirs: <?php echo $nbr_loisirs; ?></th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($ligne_loisir=$sql->fetch())
                {
            ?>
            <tr>
                <td><?php echo $ligne_loisir['loisir'];  ?></td>
                <td><a href="modif_loisir.php?id_loisir=<?php echo $ligne_loisir['id_loisir'];?>">modifier</a></td>
                <td><a href="loisirs.php?id_loisir=<?php echo $ligne_loisir['id_loisir'];?>">supprimer</a></td>
            </tr>
            <?php } ?>
        </tbody>
    
    </table>
</div>

<hr>
<form action="loisirs.php" method="post">
   <div class="">
        <label for="loisir">Loisir</label>
        <input type="text" name="loisir" placeholder="nouveau loisir" required>
   </div>

   <div class="">
   <button type="submit">Insérer un loisir</button>
   </div>
</form>
    
    
</body>
</html>