<?php require 'connexion.php';
// gestion MAJ d'une info
if(isset($_POST['competence'])){
    
    if( $_POST['competence']!='' && $_POST['niveau']!='' && $_POST['categorie']!='')
        {
            
            $competence = addslashes($_POST['competence']);
            $niveau = addslashes($_POST['niveau']);
            $categorie = addslashes($_POST['categorie']);
            $id_competence = $_POST['id_competence'];

            $pdoCV->exec("UPDATE t_competences SET competence='$competence', niveau='$niveau',categorie='$categorie'  WHERE id_competence='$id_competence' ");

            header("location: ../back/competences.php");
                exit();
            } //fin if
        } 


//Je recupère l'id de ce que je mets à jour 
$id_competence=$_GET['id_competence']; // par son id et avec son get
$sql = $pdoCV-> query("SELECT * FROM t_competences WHERE id_competence='$id_competence'");
$ligne_competence = $sql->fetch();

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
    <h2>Mise à jour d'une competence</h2>
<?php echo $ligne_competence['competence'];?>
<ul>
    <li>id : <?php echo $ligne_competence['id_competence'];?></li>
    <li> niveau : <?php echo $ligne_competence['niveau'];?>/ 5</li>
    <li>catégorie : <?php echo $ligne_competence['categorie'];?> </li>
</ul>

<hr>
<form action="modif_competence.php" method="post">
   <div class="">
        <label for="competence">competence</label>
        <input type="text" name="competence" placeholder="nouvelle competence" value="<?php echo $ligne_competence['competence'];?>" required>
   </div>
   <div class="">
        <label for="niveau">niveau</label>
        <input type="text" name="niveau" placeholder="niveau de 1 à 5" value="<?php echo $ligne_competence['niveau'];?>" required>
   </div>
   <div class="">
        <label for="categorie">catégorie</label>
        <select name="categorie" id="">
            <option value="Developpement" <?php 
            if(!(strcmp("Developpement", $ligne_competence['categorie']))) {
                 echo "selected=\"selected\"";
                }  
            ?>>Developpement</option>
            <option value="Infographie" <?php 
            if(!(strcmp("Infographie", $ligne_competence['categorie']))) { 
                echo "selected=\"selected\"";
                }  
            ?>>Infographie</option>
            <option value="Gestion de projet" <?php 
            if(!(strcmp("Gestion de projet", $ligne_competence['categorie']))) 
            { echo "selected=\"selected\"";
              }  
            ?>>Gestion de projet</option>
        
        </select>
   </div>

   <div class="">
   <input type="hidden" name="id_competence" value="<?php echo $ligne_competence['id_competence'];?>" >
   




   <button type="submit">MAJ d'une compétence</button>
   </div>
</form>
    
    
</body>
</html>