<?php
include_once __DIR__ . '/view/header.php';
?>

<html>
  <head>
    <style>
      /* Barre de navigation latérale */
.chapter-nav {
    background-color:  rgb(220, 230, 240); /* Nouvelle couleur de fond */
    border-right: 1px solid rgb(220, 230, 240); /* Nouvelle couleur de bordure */
    box-sizing: border-box;
    flex-shrink: 0;
    padding: 20px;
    position: fixed;
    top: 60px;
    left: 0;
    bottom: 5px;
    width: 200px;
}

.chapter-nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.chapter-nav ul li {
    margin-bottom: 10px;
}

.chapter-nav a {
    color: #1f618d; /* Nouvelle couleur de texte (bleu foncé) */
    text-decoration: none;
    font-family: 'calibri', sans-serif; /* Nouvelle police */
    font-size: 20px; /* Nouvelle taille de police */
    font-weight: bold; /* Texte en gras */
}

.chapter-nav a:hover {
    color: #bdc3c7; /* Nouvelle couleur de texte au survol */
}

/* Styles pour le contenu principal */
main {
    box-sizing: border-box;
    padding: 20px;
    flex-grow: 1;
    margin-left: 200px;
}

/* Styles pour les sections de chapitre */
section {
    margin-bottom: 20px;
}
    </style>
  </head>
</html>
<nav class="chapter-nav">
  <ul>
    <li><a href="#titre-qcm-container">QCM</a></li>
    <li><a href="#titre-cesar-container">Chiffrement de César</a></li>
    <li><a href="#titre-vigenere-container">Chiffrement de Vigénere</a></li>
    <li><a href="#titre-affine-container">Chiffrement d'Affine</a></li>
    <li><a href="#titre-HILL-container">Chiffrement de HILL</a></li>
    <li><a href="#titre-test1-container">Test 1</a></li>
    <li><a href="#titre-test2-container">Test 2</a></li>
    <li><a href="#titre-test3-container">Test 3</a></li>
  </ul>
</nav>

<div class="container my-5">
  
  <div class="row justify-content-center mb-2">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-body bg-dark rounded">
            <h2 id="titre-qcm-container" class="text-center text-light">QCM</h2>
          <div id="qcm-container"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center mb-2">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-body bg-dark rounded">
            <h2 id="titre-cesar-container" class="text-center text-light">Chiffrement de César</h2>
          <div id="cesar-container"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center mb-2">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-body bg-dark rounded">
            <h2 id="titre-vigenere-container" class="text-center text-light">Chiffrement de Vigenere</h2>
          <div id="vigenere-container"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center mb-2">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-body bg-dark rounded">
            <h2 id="titre-affine-container" class="text-center text-light">Chiffrement d'Affine</h2>
          <div id="affine-container"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center mb-2">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-body bg-dark rounded">
            <h2 id="titre-HILL-container" class="text-center text-light">Chiffrement de HILL</h2>
          <div id="HILL-container"></div>
        </div>
      </div>
    </div>
  </div>


  <div class="row justify-content-center mb-2">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-body bg-dark rounded">
            <h2 id="titre-test1-container" class="text-center text-light">Test 1</h2>
          <div id="test1-container"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center mb-2">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-body bg-dark rounded">
            <h2 id="titre-test2-container" class="text-center text-light">Test 2</h2>
          <div id="test2-container"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center mb-2">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-body bg-dark rounded">
            <h2 id="titre-test3-container" class="text-center text-light">Test 3</h2>
          <div id="test3-container"></div>
        </div>
      </div>
    </div>
  </div>

 

</div>


<script src="./JS/exercices.js"></script>

<?php
include_once __DIR__ . '/view/footer.php';
?>