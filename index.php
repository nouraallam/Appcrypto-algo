<?php
include_once __DIR__ . '/view/header.php';
?>

<div class="container">
    <h3 class="text-center" style="font-family:  'Brush Script Std', cursive; color: #283384;">Bienvenue sur APPCrypt</h3>
    <!-- <h5 class="text-center">Chiffrer, déchiffrer et décrypter vos messages</h5> -->
</div>
<div class="container">
    <div class="row justify-content-evenly align-items-stretch my-3">
        <div class="card col-12 col-md-4 mb-2" style="width: 18rem;">
            <img src="./IMG/chiffrements.webp" class="card-img-top" alt="...">
            <div class="card-body d-flex flex-column justify-content-between">
                <h4 class="card-title" style="font-family: 'Brush Script MT', 'Brush Script Std', cursive; color: #283384;">Chiffrement & Déchiffrement</h4>
                <p class="card-text" style="font-family: 'oblique';">Découvrez comment chiffrer et déchiffrer des messages en utilisant différentes techniques.</p>
                <a href="./algo.php" class="btn btn-primary align-self-end">Chiffrer/Déchiffrer</a>
            </div>
        </div>


       <div class="card col-12 col-md-4 mb-2" style="width: 18rem;">
            <img src="./IMG/cryptanalyse.gif" class="card-img-top" alt="...">
            <div class="card-body d-flex flex-column justify-content-between">
                <h4 class="card-title" style="font-family: 'Brush Script MT', 'Brush Script Std', cursive; color: #283384;">Décryptage</h4>
                <p class="card-text" style="font-family: 'oblique';">Apprenez à décrypter des messages cryptés en utilisant différentes méthodes d'analyse cryptographique.</p>
                <a href="./attaque.php" class="btn btn-primary align-self-end">Décrypter</a>
            </div>
        </div>


        <div class="card col-12 col-md-4 mb-2" style="width: 18rem;">
            <img src="./IMG/livres2.jpg" class="card-img-top" alt="...">
            <div class="card-body d-flex flex-column justify-content-between">
                <h4 class="card-title" style="font-family: 'Brush Script MT', 'Brush Script Std', cursive; color: #283384;">Cours</h4>
                <p class="card-text" style="font-family: 'oblique';">Accédez à nos cours complets pour apprendre les bases de la cryptographie et ses applications.</p>
                <a href="./cours.php" class="btn btn-primary align-self-end">Consulter</a>
            </div>
        </div>



        <div class="card col-12 col-md-4 mb-2" style="width: 18rem;">
            <img src="./IMG/gyt.png" class="card-img-top" alt="...">
            <div class="card-body d-flex flex-column justify-content-between">
                <h4 class="card-title" style="font-family: 'Brush Script MT', 'Brush Script Std', cursive; color: #283384;">Exercices</h4>
                <p class="card-text"  style="font-family: 'oblique';">Entraînez-vous à chiffrer, déchiffrer et décrypter des messages cryptés en résolvant nos exercices interactifs.</p>
                <a href="./exercices.php" class="btn btn-primary align-self-end">S'exercer</a>
            </div>
        </div>
    </div>

</div>

<?php
include_once __DIR__ . '/view/footer.php';
?>