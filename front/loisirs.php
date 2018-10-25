<?php
    require 'inc/connexion.php';
    include 'inc/doc1.php'; // debut de la page HTML (doctype + meta )
    // Récupère les données de l'utilisateur par son id

$sql = $pdoCV -> query(" SELECT * FROM t_utilisateurs ");
$ligne_utilisateur = $sql-> fetch(); ?>
<?php
    include 'inc/head2.php'; // inclusion du headend.php qui contient tout les liens CDN nécéssaires et la femeture de la balise head 
    include 'inc/header3.php'; ?>
<?php

       // Requête pour compter et chercher plusieurs enregistrements on ne peut compter qui si on a préparer(avec : prepare) la rrequête

       $sql = $pdoCV -> prepare("SELECT * FROM t_loisirs");

       $sql -> execute();

       $nbr_loisirs = $sql -> rowCount();

   ?>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="text-uppercase text-white">
                    <strong>Mes loisirs</strong>
                </h1>
                <hr>
            </div>
        </div>
    <div class="container">
        <table class="table table-striped table-bordered bg-light" style="width:100%">
            <thead>
                <tr>
                    <th>Loisirs: <?php echo $nbr_loisirs; ?></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($ligne_loisir=$sql->fetch())
                    {
                ?>
                <tr>
                    <td><?php echo $ligne_loisir['loisir'];  ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    </header>
     <?php include 'inc/contact4.php'; ?>
    