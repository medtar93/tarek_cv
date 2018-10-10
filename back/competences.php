<?php require 'connexion.php';

if(isset($_POST['competence'])  )
{// si on areçu un nouveau competence 
    if( $_POST['competence']!='' && $_POST['niveau']!='' && $_POST['categorie']!='') {
        $competence = addslashes($_POST['competence']);
        $niveau = addslashes($_POST['niveau']);
        $categorie = addslashes($_POST['categorie']);

        $pdoCV->exec("INSERT INTO t_competences VALUES (NULL, '$competence', '$niveau', '$categorie', '1')");

        header("location: ../back/competences.php");
            exit();}
    } //fin if

     //suppression d'une competence de la BDD
if(isset($_GET['id_competence'])){ // on recupère le competence dans l'url par son id 
    
    $efface = $_GET['id_competence']; //je passe l'id dans une variable $efface

    $sql = "DELETE FROM t_competences WHERE id_competence = '$efface' ";//delete de la base 
    $pdoCV->query($sql);// on peut le faire avec exec également 

    header("location: ../back/competences.php");
    exit();}
?>
<?php
    // pour pouvoir tier les infos 

    $order = '';
    if(isset($_GET['order']) && isset($_GET['column'])){

	if($_GET['column'] == 'competence'){$order = ' ORDER BY competence';}
	elseif($_GET['column'] == 'niveau'){$order = ' ORDER BY niveau';}
	elseif($_GET['column'] == 'categorie'){$order = ' ORDER BY categorie';}
	if($_GET['order'] == 'asc'){$order.= ' ASC';}
	elseif($_GET['order'] == 'desc'){$order.= ' DESC';}
}
       // Requête pour compter et chercher plusieurs enregistrements on ne peut compter qui si on a préparer(avec : prepare) la rrequête

       $sql = $pdoCV -> prepare("SELECT * FROM t_competences". $order);

       $sql -> execute();

       $nbr_competences = $sql -> rowCount();



   ?>


   <!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Creative - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="../startbootstrap-creative-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../startbootstrap-creative-gh-pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="../startbootstrap-creative-gh-pages/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../startbootstrap-creative-gh-pages/css/creative.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">BACK OFFICE : TAREK CV</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>Mes compétences</strong>
            </h1>
            <hr>
          </div>
          <div class="container">
             <br><br>
            <table border="1" >
                <thead>
                    <tr>
                        <th>compétences
                        <a href="competences.php?column=competence&order=asc"><i class="fas fa-arrow-circle-up"></a> |
                        <a href="competences.php?column=competence&order=desc"><i class="fas fa-arrow-circle-down"></i></a> 
                        </th>
                        <th>catégorie
                        <a href="competences.php?column=categorie&order=desc"><i class="fas fa-arrow-circle-up"></a> |
                        <a href="competences.php?column=categorie&order=asc"><i class="fas fa-arrow-circle-down"></i></a>
                        </th>
                        <th>niveau
                            <a href="competences.php?column=niveau&order=asc"><i class="fas fa-arrow-circle-up"></i></a> | 
                            <a href="competences.php?column=niveau&order=desc"><i class="fas fa-arrow-circle-down"></i></a>
                        </th>
                        <th>modifier</th>
                        <th>supprimer</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php while ($ligne_competence=$sql->fetch())
                        {
                    ?>
                    <tr>
                        <td><?php echo $ligne_competence['competence'];  ?></td>
                        <td><?php echo $ligne_competence['categorie'];  ?></td>
                        <td><?php echo $ligne_competence['niveau'];  ?></td>
                        <td><a href="modif_competence.php?id_competence=<?php echo $ligne_competence['id_competence'];?>"><i class="fas fa-pencil-alt"></i></a></td>
                        <td><a href="competences.php?id_competence=<?php echo $ligne_competence['id_competence'];?>"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            
            </table>
            <a href="#formulaire">Ajouter une competence</a>
        <span> * niveau de 1 à 5 </span>
        </div>
        </div>
      </div>
    </header>
      
        
    

<hr>
<div id="formulaire">
    <form action="competences.php" method="post">
       <div class="container">
            <label for="competence">competence</label>
            <input type="text" name="competence" placeholder="nouvelle competence" required>
       </div>
       <div class="container">
            <label for="niveau">niveau</label>
            <input type="text" name="niveau" placeholder="niveau de 1 à 5" required>
       </div>
       <div class="container">
            <label for="categorie">catégorie</label>
            <select name="categorie" id="">
                <option value="Developpement">Developpement</option>
                <option value="Infographie">Infographie</option>
                <option value="Gestion de projet">Gestion de projet</option>
            
            </select>
       </div>
    
       <div class="container">
       <button type="submit" class="btn btn-primary btn-xl js-scroll-trigger">Insérer une compétences</button>
       </div>
    </form>
</div>
</body>
</html>

