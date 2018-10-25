<?php require 'inc/connexion.php';


include 'inc/doc1.php'; 

// Récupère les données de l'utilisateur par son id

$sql = $pdoCV -> query(" SELECT * FROM t_utilisateurs WHERE id_utilisateur = 1");
$ligne_utilisateur = $sql-> fetch(); ?>

        <title><?php echo $ligne_utilisateur['prenom'] . ' ' .$ligne_utilisateur['nom']; ?> : développeur web</title>

<?php include 'inc/head2.php';
include 'inc/header3.php';?>
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col-lg-10 mt-5">
            <p class="text-white text-center" style="font-size : 2em"><strong>Bonjour ! Je suis <?php echo $ligne_utilisateur['prenom']; ?> <?php echo $ligne_utilisateur['nom']; ?> </strong></p>
            </div>
        </div>
        <hr>
        
    </div>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" >
        <a href="competences.php">
            <div class="card col col-lg-12 col-md-5 col-12 mb-1 ml-1 mx-auto competences" >
                <h3 class="text-white">Développeur web</h3>
            </div>
        </a>    
    </div>
    <div class="carousel-item">
             <div class="card col col-lg-12 col-md-5  col-12 mb-1 ml-1 mx-auto experiences" style="height: 300px">
                <a href="experiences.php"><h3 class="text-yellow">aux expériences variées,</h3></a>
            </div>
    </div>
    <div class="carousel-item">
            <div class="card col col-lg-12 col-md-5 col-12 mb-1 ml-1 mx-auto formations" style="height: 300px">
                <a href="formations.php"><h3 class="text-yellow">un parcours de formation atypique,</h3></a>
            </div>
    </div>
    <div class="carousel-item">
            <div class="card col col-lg-12  col-md-5 col-12 mb-1 ml-1 mx-auto loisirs" style="height: 300px">
                <a href="loisirs.php"><h3 class="text-yellow">avec un esprit collectif et une mentalité de gagnant.</h3></a>
            </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  </header>
<?php include 'inc/contact4.php'; ?>