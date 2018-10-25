<?php require 'inc/connexion.php';
?>
<?php
// Récupère les données de l'utilisateur par son id

$sql = $pdoCV -> query(" SELECT * FROM t_utilisateurs ");
$ligne_utilisateur = $sql-> fetch(); 

     // pour pouvoir trier les infos 
     $order = '';
     if(isset($_GET['order']) && isset($_GET['column'])){
 
   if($_GET['column'] == 'titre_form'){$order = ' ORDER BY titre_form';}
   elseif($_GET['column'] == 'stitre_form'){$order = ' ORDER BY stitre_form';}
   elseif($_GET['column'] == 'dates_form'){$order = ' ORDER BY dates_form';}
   if($_GET['order'] == 'asc'){$order.= ' ASC';}
   elseif($_GET['order'] == 'desc'){$order.= ' DESC';}
  }
 ?>
 <?php include 'inc/doc1.php'; // debut de la page HTML (doctype + meta ) ?>
<title>mtbenkherouf.com - MES FORMATIONS</title>

<?php include 'inc/head2.php'; // inclusion du headend.php qui contient tout les liens CDN nécéssaires et la femeture de la balise head 
  include 'inc/header3.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase text-white">
              <strong>Mes formations</strong>
            </h1>
            <hr>
       </div>
    </div>
             <?php   
              // Requête pour compter et chercher plusieurs enregistrements on ne peut compter qui si on a préparer(avec : prepare) la rrequête
            $sql = $pdoCV -> prepare("SELECT * FROM t_formations $order");
            $sql -> execute();
            $nbr_formations = $sql -> rowCount();
            ?>
            <div class="row">
                <table  class="table table-fixed bg-light" style="width:100%" >
                    <thead>
                        <tr>
                            <th class="col-3"><?php echo $nbr_formations;?> formations<br>
                            <a href="formations.php?column=titre_form&order=asc"><i class="fas fa-sort-alpha-down"></i></a> |
                            <a href="formations.php?column=titre_form&order=desc"><i class="fas fa-sort-alpha-up"></i></a> 
                            </th>
                            <th class="col-3">complément<br>
                            <a href="formations.php?column=stitre_form&order=asc"><i class="fas fa-sort-alpha-down"></i></a> |
                            <a href="formations.php?column=stitre_form&order=desc"><i class="fas fa-sort-alpha-up"></i></a>
                            </th>
                            <th class="col-2">dates<br>
                                <a href="formations.php?column=dates_form&order=asc"><i class="fas fa-sort-numeric-down"></i></a> | 
                                <a href="formations.php?column=dates_form&order=desc"><i class="fas fa-sort-numeric-up"></i></a>
                            </th>
                            <th class="col-4">description <br></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($ligne_formation=$sql->fetch())
                            {
                        ?>
                        <tr>
                            <td class="col-3"><?php echo $ligne_formation['titre_form'];  ?></td>
                            <td class="col-3"><?php echo $ligne_formation['stitre_form'];  ?></td>
                            <td class="col-2"><?php echo $ligne_formation['dates_form'];  ?></td>
                            <td class="col-4"><?php echo $ligne_formation['description_form'];  ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
    </div>
    </div>
    </div>
</header>
<?php include 'inc/contact4.php'; ?>