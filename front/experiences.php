<?php require 'inc/connexion.php';
 ?>
<?php
    // Récupère les données de l'utilisateur par son id

$sql = $pdoCV -> query(" SELECT * FROM t_utilisateurs ");
$ligne_utilisateur = $sql-> fetch(); 
     // pour pouvoir trier les infos 
     $order = '';
     if(isset($_GET['order']) && isset($_GET['column'])){
 
   if($_GET['column'] == 'titre_exp'){$order = ' ORDER BY titre_exp';}
   elseif($_GET['column'] == 'stitre_exp'){$order = ' ORDER BY stitre_exp';}
   elseif($_GET['column'] == 'dates_exp'){$order = ' ORDER BY dates_exp';}
   if($_GET['order'] == 'asc'){$order.= ' ASC';}
   elseif($_GET['order'] == 'desc'){$order.= ' DESC';}
  }
 ?>
 <?php include 'inc/doc1.php'; // debut de la page HTML (doctype + meta ) ?>
<title>MTBENKHEROUF.COM - MES EXPERIENCES</title>

<?php include 'inc/head2.php'; // inclusion du headend.php qui contient tout les liens CDN nécéssaires et la femeture de la balise head 
  include 'inc/header3.php'; ?>
        <div class="container">
            <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase text-white">
              <strong>Mes expériences</strong>
            </h1>
            <hr>
           </div>
           <br><br>
             <?php   
              // Requête pour compter et chercher plusieurs enregistrements on ne peut compter qui si on a préparer(avec : prepare) la rrequête
            $sql = $pdoCV -> prepare("SELECT * FROM t_experiences $order");
            $sql -> execute();
            $nbr_experiences = $sql -> rowCount();
            ?> 
                            <div class="row">
                <table class="table table-fixed bg-light">
                <thead>
                    <tr>
                        <th class="col-3"><?php echo $nbr_experiences;?>  expériences
                            <a href="experiences.php?column=experience&order=asc"><i class="fas fa-sort-alpha-down"></i></a> |
                            <a href="experiences.php?column=experience&order=desc"><i class="fas fa-sort-alpha-up"></i></a> </th>
                        <th class="col-4">
                        complément
                        <a href="experiences.php?column=categorie&order=desc"><i class="fas fa-sort-alpha-down"></i></a> |
                        <a href="experiences.php?column=categorie&order=asc"><i class="fas fa-sort-alpha-up"></i></a>
                        </th>
                        <th class="col-2">
                        dates 
                            <a href="experiences.php?column=niveau&order=asc"><i class="fas fa-sort-numeric-down"></i></a> | 
                            <a href="experiences.php?column=niveau&order=desc"><i class="fas fa-sort-numeric-up"></i></a>
                        </th>
                        <th class="col-3">
                            description
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($ligne_experience=$sql->fetch())
                     {
                ?>
                    <tr>
                        <td class="col-3"><?php echo $ligne_experience['titre_exp'];  ?></td>
                        <td class="col-4"><?php echo $ligne_experience['stitre_exp'];  ?></td>
                        <td class="col-2"><?php echo $ligne_experience['dates_exp'];  ?></td>
                        <td class="col-3"><?php echo $ligne_experience['description_exp'];  ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                </table>
            </div>
         </div>
    </div> 
        
</header>
<?php include 'inc/contact4.php'; ?>