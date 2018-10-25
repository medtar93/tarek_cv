<?php require 'inc/connexion.php';


include 'inc/doc1.php'; 

// Récupère les données de l'utilisateur par son id

$sql = $pdoCV -> query(" SELECT * FROM t_utilisateurs ");
$ligne_utilisateur = $sql-> fetch(); ?>

        <title>BACK OFFICE : TAREK CV : ACCUEIL</title>

<?php include 'inc/head2.php';
include 'inc/header3.php';?>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 ">
            <p class="text-white text-center" style="font-size : 2em"><strong>Bonjour! Je suis <?php echo $ligne_utilisateur['prenom']; ?> <?php echo $ligne_utilisateur['nom']; ?> </strong></p>
            </div>
        </div>
        <hr>
        <div class="row mx-auto text-white">
            <div class="card col col-lg-2 col-md-5 col-12 mb-1 ml-1 mx-auto">
                <a href="competences.php"><p><strong>Mes compétences</strong></p></a>
            </div>    
            <div class="card col col-lg-2 col-md-5  col-12 mb-1 ml-1 mx-auto">
                <a href="experiences.php"><p><strong>Mes expériences</strong></p></a>
            </div>
            
            <div class="card col col-lg-2 col-md-5 col-12 mb-1 ml-1 mx-auto">
                <a href="formations.php"><p><strong>Mes formations</strong></p></a>
            </div>
            <div class="card col col-lg-2  col-md-5 col-12 mb-1 ml-1 mx-auto">
                <a href="loisirs.php"><p><strong>Mes loisirs</strong></p></a>
            </div>

        </div>
    </div>
  </header>
<?php include 'inc/contact4.php'; ?>