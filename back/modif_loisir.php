<?php require 'connexion.php';
// gestion MAJ d'une info

if(isset ($_POST['loisir'])){// si on areçu un nouveau loisir 
   
    $loisir = addslashes($_POST['loisir']);
    $id_loisir = $_POST['id_loisir'];
   
    $pdoCV->exec("UPDATE t_loisirs SET loisir='$loisir' WHERE id_loisir='$id_loisir'");

    header("location: ../back/loisirs.php");
        exit();
    } //fin if

//Je recupère l'id de ce que je mets à jour 
$id_loisir=$_GET['id_loisir']; // par son id et avec son get
$sql = $pdoCV-> query("SELECT * FROM t_loisirs WHERE id_loisir='$id_loisir'");
$ligne_loisir = $sql->fetch(); //va chercher! va!



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

    <h1>BACK OFFICE : TAREK CV</h1>
    <h2>Mise à jour d'un loisir</h2>
<?php echo $ligne_loisir['loisir'];?>

<hr>
<form action="modif_loisir.php" method="post">
   <div class="">
        <label for="loisir">Loisir</label>
        <input type="text" name="loisir" value="<?php echo $ligne_loisir['loisir'];?>" placeholder="nouveau loisir" required>
   </div>

   <div class="">
   <input type="hidden" name="id_loisir" value="<?php echo $ligne_loisir['id_loisir'];?>" >
   <button type="submit">MAJ</button>
   </div>
</form>
    
    
</body>
</html>