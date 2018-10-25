<?php require 'inc/connexion.php';
?>
<?php
// Récupère les données de l'utilisateur par son id

$sql = $pdoCV -> query(" SELECT * FROM t_utilisateurs ");
$ligne_utilisateur = $sql-> fetch(); 

     // pour pouvoir trier les infos 
     $order = '';
     if(isset($_GET['order']) && isset($_GET['column'])){
 
        if($_GET['column'] == 'competence'){$order = ' ORDER BY competence';}
            elseif($_GET['column'] == 'niveau'){$order = ' ORDER BY niveau';}
            elseif($_GET['column'] == 'categorie'){$order = ' ORDER BY categorie';}
        if($_GET['order'] == 'asc'){$order.= ' ASC';}
            elseif($_GET['order'] == 'desc'){$order.= ' DESC';}
    }
 ?>
<?php include 'inc/doc1.php'; // debut de la page HTML (doctype + meta ) ?>
<title>mtbenkherouf.com - MES COMPETENCES</title>
<?php
include 'inc/head2.php'; // inclusion du headend.php qui contient tout les liens CDN nécéssaires et la femeture de la balise head 
  include 'inc/header3.php'; ?>

        <div class="container">
            
            <div class="col-lg-10 mx-auto">
                <h1 class="text-uppercase text-white">
                <strong>Mes compétences</strong>
                </h1>
                <hr>
            </div>
          
             <?php   
              // Requête pour compter et chercher plusieurs enregistrements on ne peut compter qui si on a préparer(avec : prepare) la rrequête
            $sql = $pdoCV -> prepare("SELECT * FROM t_competences $order");
            $sql -> execute();
            $nbr_competences = $sql -> rowCount();
            ?>

           
                <div class="row">
                <table class="table table-fixed bg-light">
                <thead>
                    <tr>
                        <th class="col-6"><?php echo $nbr_competences;?> compétences 
                            <a href="competences.php?column=competence&order=asc"><i class="fas fa-sort-alpha-down"></i></a> |
                            <a href="competences.php?column=competence&order=desc"><i class="fas fa-sort-alpha-up"></i></a> </th>
                        <th class="col-4">
                            catégorie
                        <a href="competences.php?column=categorie&order=desc"><i class="fas fa-sort-alpha-down"></i></a> |
                        <a href="competences.php?column=categorie&order=asc"><i class="fas fa-sort-alpha-up"></i></a>
                        </th>
                        <th class="col-2">
                            niveau 
                            <a href="competences.php?column=niveau&order=asc"><i class="fas fa-sort-numeric-down"></i></a> | 
                            <a href="competences.php?column=niveau&order=desc"><i class="fas fa-sort-numeric-up"></i></a>
                            <br>
                            <span class="annotation">notation de 1 à 5</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($ligne_competence=$sql->fetch())
                     {
                ?>
                    <tr>
                        <td class="col-6"><?php echo $ligne_competence['competence'];  ?></td>
                        <td class="col-4"><?php echo $ligne_competence['categorie'];  ?></td>
                        <td class="col-2"><?php echo $ligne_competence['niveau'];  ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                </table>
            </div>
         </div>
    </div> 
        
    </header>
<?php include 'inc/contact4.php'; ?>


