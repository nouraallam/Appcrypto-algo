<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="IMG/cryptoo.png" type="image/x-icon">
    <link rel="stylesheet" href="CSS/index.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <title>APPCrypt</title>

</head>

<body class="vh-100" style="display:flex; min-height:100vh; flex-direction: column;">
    <!-- Navbar -->
    <div class="container-fluid px-5 bg-light mon-bg">
    <nav class="navbar navbar-expand-sm navbar-light bg-light mon-bg fixed-top" style="width: 100%;">
            <a class="navbar-brand logo" href="index.php">
                <img src="IMG/cryptoo.png" width="35" height="35" class="d-inline-block align-top" alt="logo" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse" id="navbarsExample03">
                <ul class="navbar-nav me-auto mb-2 mb-sm-0 ">

                    <li class="nav-item">
                        <a class="nav-link menuNav" href="#"></a>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link menuNav" href="algo.php">Classique</a>

                    </li>

                    

                    <li class="nav-item">
                        <a class="nav-link menuNav" href="decrypter.php">Moderne</a>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link menuNav" href="cours.php">Cours</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link menuNav" href="exercices.php">Exercices</a>

                    </li>

                </ul>

                
            </div>

        </nav>

    </div>
    <!-- Fin Header -->
<html>
  <head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">

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

 h3, h5, h6 {
    color: #1f618d;
    font-family: 'Arial', sans-serif;
}
h4 {
  color: rgb(0, 100, 0); /* Vert clair pour h4 */
  font-family: 'Arial', sans-serif;
}

h2 {
  color: #1f618d;
  text-decoration: underline; 
  font-family: 'Arial', sans-serif;
}
.main-content p {
    font-family: 'Calibri', sans-serif; /* Utiliser la police Calibri */
    font-size: 18px; /* Nouvelle taille de police */
    line-height: 1.5; /* Espacement des lignes */
    color: #333; /* Couleur du texte */
}

/* Autres styles existants... */

/* Styles pour le texte dans le header */
.navbar-brand,
.navbar-nav>a {
    color: #1f618d; /* Nouvelle couleur de texte */
    font-weight: bold; /* Texte en gras */
}

/* Styles pour le texte du logo au survol */
.navbar-brand:hover {
    color: #bdc3c7; /* Nouvelle couleur de texte au survol */
}

/* Styles pour le texte des liens du menu au survol */
.navbar-nav>a:hover {
    color: #bdc3c7; /* Nouvelle couleur de texte au survol */
}

/* Styles spécifiques pour les liens "Classique", "Moderne", "Cours" et "Exercices" */
.nav-item:nth-child(2) .nav-link,
.nav-item:nth-child(3) .nav-link,
.nav-item:nth-child(4) .nav-link,
.nav-item:nth-child(5) .nav-link {
    color: #1f618d; /* Nouvelle couleur de texte pour les liens spécifiques */
    font-weight: bold; /* Texte en gras pour les liens spécifiques */
}

/* Styles pour le texte des liens spécifiques au survol */
.nav-item:nth-child(2):hover .nav-link,
.nav-item:nth-child(3):hover .nav-link,
.nav-item:nth-child(4):hover .nav-link,
.nav-item:nth-child(5):hover .nav-link {
    color: #bdc3c7; /* Nouvelle couleur de texte au survol pour les liens spécifiques */
}


</style>


  </head>
  <body>
<!-- Barre de navigation -->
<nav class="chapter-nav">
  <ul>
    <li><a href="#chapitre1">Chapitre 1 : Introduction</a></li>
    <li><a href="#chapitre2">Chapitre 2 : Le chiffrement par substitution</a></li>
    <li><a href="#chapitre3">Chapitre 3 : Le chiffrement par transposition</a></li>
    <li><a href="#chapitre4">Chapitre 4 : Les chiffrements moderne</a></li>
  </ul>
</nav>

<main>
<div class="main-content">
  <!-- Chapitre 1 -->
  <section id="chapitre1">
    <h2>Chapitre 1 : Introduction</h2>
    <h2>Chapitre 1 : Introduction</h2>
    <p>La cryptographie assure certains objectifs de la sécurité informatique, plus précisément la confidentialité des données dans les réseaux de communication </br>
      La cryptologie rassemble les techniques destinées à dissimuler le sens d'un message à toute personne autre que son destinataire. Elle est restée longtemps confinée aux millieu militaires et diplomatiques.
      Aujourd'hui, avec la généralisation des technologies numériques, elle est omniprésente dans notre vie quotidienne. </br>
      Dans ce chapitre, nous allons d'abord présenter le vocabulaire nécessaire à la comprehension de la cryptographie.
    </p>

    <section id="Vocabulaire et définition">
      <h4> Vocabulaire et définitions </h4>
      <p> Dans cette section, des définitions relatives à la cryptographie seront présentées : </br> </p>

      <section id="Cryptologie">
        <h5> Cryptologie </h5>
        <p> La cryptologie est la science des messages secrets. Elle est la réunion de deux disciplines qui s'alimentent l'une l'autre à savoir, la cryptographie et la cryptanalyse </br> </p>

        <h5> Cryptographie </h5>
        <p> La cryptographie est à la fois une science et un art. C'est une science, car la résolution des problèmes exige la connaissance de certaines règles,
          lesquelles, tout en admettant beaucoup d'exceptions, n'en sont pas moins fixes et définies; ces règles entraînent une suite de raisonnement logiques.
          La cryptographie est aussi un art, car elle fait appel aux talents d'intuition d'imagination et d'invention du chercheur,
          ces facultés étant elles-mêmes secondées par des connaissances linguistiques approfondies. </br> </p>

        <h5> Cryptanalyse </h5>
        <p> La cryptanalyse est la technique qui consiste à déduire un texte en clair à partir d'un texte chiffré sans posséder la clé de chiffrement.
          Le processus par lequel on tente de comprendre un message en particulier est appelé généralement une attaque. </p>

        <h5> Cryptosystème </h5>
        <p> Un système cryptographique ou cryptosystème est composé d'un algorithme de cryptage (chiffrement) et d'un algorithme de décryptage (déchiffrement). </br> </p>

        <h5> Cryptogramme </h5>
        <p> Un cryptogramme est un message écrit à l'aide d'un système de chiffrement. </p>

        <section id="Définitions">
          <h6> Définition formelle </h6>
          <p> Un cryptosystème est un quituple (P,C,K,E,D) tel que : </br>
          <ul>
            <li><b> P : </b> ensemble de textes <b> clairs </b> </li>
            <li><b> C : </b> ensemble de textes <b> chiffrés </b> </li>
            <li><b> K : </b> ensemble de <b> clés </b> </li>
            <li><b> E : </b> un ensemble de fonctions E(k) | k ∈ K de<b> chiffrement </b> (cryptage) de P vers C. </li>
            <li><b> D : </b> ensemble de fonctions D(k) | k ∈ K de <b> déchiffrement </b> de C vers P.</li>
          </ul>
          satisfaisant : ∀k ∈ K, ∃k⁻¹ ∈ K | ∀m ∈ P : D(k-1) (E(k)(m)) = m </br>
          La dernière propriété est fondamentale. Elle précise que si un texte clair x est chiffré
          en un cryptogramme (message chiffré) y avec K, alors il existe une clé K' tel que y défchiffré avec
          K' redonne x</p>

          <h6> Types de cryptosystèmes </h6>
          <p> <b> Systèmes à usage restreint : </b> les algorithmes de chiffrement de déchiffrement
            sont secrets. La sécurité repose sur leur confidentialité. </br> </p>

          <p> <b> Systèmes à usage général : </b> La confidentialité ne repose pas sur l'algorithme, mais sur une clé.
            Tout le monde peut utiliser le même système </br> </p>

          <h5> Chiffre </h5>
          <p> Ensemble de procédés et ensemble de symboles (lettres, nombres, signes, etc.) employés
            pour remplacer les lettres du message à chiffre. On distingue généralement les chiffres à transposition et
            ceux à substitution. </br> </p>

          <h5> Chiffrement </h5>
          <p> Opération qui consiste à transformer un texte clair en cryptogramme. On parle de chiffrement,
            car, à la Renaissance, on utilisait principalement des chiffres arabes comme caractères de l'écriture secrète.
            Claire (ou message clair) Version Intelligible d'un message et compréhensible par tous </br> </p>

          <h5> Déchiffrement </h5>
          <p>Opération inverse du chiffrement, c'est une opération qui consiste à obtenir la version originale d'un message
            qui a été précédemment chiffré en connaissant la méthode de chiffrement et les clés (contrairement au décryptage).
            </br> </p>

          <h5> Décryptage </h5>
          <p> Opération qui consiste à retrouver le texte en clair sans disposer des clés théoriquement nécessaires.
            Ine ne faut pas confondre déchiffrement et décryptage </br> </p>

          <h5> Bigramme </h5>
          <p> C'est un groupe de deux lettres. </br> </p>

          <h5> Clé </h5>
          <p> Dans un système de chiffrement, elle correspond à un nombre, un mot, une phrase.. qui permet
            grâce à l'algorithme de chiffrement, de chiffrer ou déchiffrer un message. </br> </p>

          <h5> Casser un code </h5>
          <p> C'est de trouver la clé du code ou le moyen d'accéder à ce qu'il protégeait </br> </p>




        </section>

        <!-- Chapitre 2 -->
        <section id="chapitre2">
          <h2>Chapitre 2 : Le chiffrement par substitution</h2>
          <p>Le chiffrement par substitution est l'une des techniques les plus simples de chiffrement. Nous allons l'étudier en détail dans ce chapitre. </br> </p>
          <p> La première idée qui vient à l'esprit pour chiffrer un texte écrit dans une langue à alphabet,
            consiste à remplacer chaque lettre par une autre lettre selon une règle convenue. Dans le chiffrement
            par substitutions, chaque lettre est remplacée par une autre, mais garde sa place d'origine.
            Il existe trois type de chiffrement par subsitution : </br>
          </p>

          <h4> Chiffre de subsitution mono-alphabétique </h4>
          <p> Chaque lettre du message d'origine est toujours remplacée par une même autre lettre. </br> </p>

    <h4> Chiffre de subsitution polygrammique </h4>
    <p> Les lettres ne sont pas remplacées une par une, mais par blocs de plusieurs (deux ou trois généralement).
        Par exemple, dans une subsitution bigrammique, deux lettres du texte clair sont transformées en deux lettre du cryptogramme. </p>

</br>
    <section id="Chiffrement_César">
    <h3> Chiffrement de César </h3>
    <p> Le chiffrement de César est la méthode de cryptographie la plus ancienne communément admise par l'histoire.
      Il consiste en une substitution mono-alphabétique, où la substitution est définie par un décalage de lettre.
      L'algorithme de chiffrement consiste à décaler les lettres de l'alphabet, selon la clé de chiffrement k qui représente le nombre de lettres à déclaer </br> </p>
            <h4> Formellement </h4>
            <ul>
              <li><b> Chiffrement : </b> C = (L + K) mod 26 </li>
              <li><b> Déchiffrement : </b>L = (C - K) mod 26 </li>
              <li><b> L : </b> représente la lettre du texte clair </li>
              <li><b> C : </b> le résultat du chiffrement de la lettre L </li>
              <li><b> K : </b> représente la clé de chiffrement (le pas de déclage)</li>
              <p> <b> NB : </b> On commence le calcul par 0, c'est-à-dire la lettre A = 0 </br>
                <b> Exemple : </b> On veut chiffrer la lettre D avec une clé K = 4 <br>
                          C = (ord(D) + K) mod 26 = (3 + 4) mod 26 = 7 <br>
                          C = H
</section>        

    <h5> Méthode d'Al-Kindi </h5>
    <p> La méthode d'Al-Kindi est basée sur une analyse des fréquences d'apparition de chaque lettre dans une langue.
         Nous pouvons en dresser un histogramme, comme le montre la figure ci dessous : </p>
    <div>   
    <img class ="image-graphique" src= "https://image1.slideserve.com/2862540/fr-quences-des-lettres-dans-diff-rentes-langues-l.jpg" width=40% height=40%>
    </div>
</br>
    <p> L'attaquant met alors en relation la fréquence des lettres du message codé avec ces statistiques.
      Ainsi, il puet alors connaître la plupart des lettres du message, mais pas toutes (certaines ayant des fréquences trop similaires).
      Cependant, la découvrete des lettres principales permet de percer le reste du message. Cette technique nécessite en outre que le texte ait une longuer suffisante
      et implique que l'attaquant connaisse la langue d'origine du message crypté. </br> </p>
    <p> Le chiffrement de César est très peu sûr, puisqu'il est très facile de tester de façon exhaustive toutes les possibilités. 
      Pourant ,en raison de sa grande simplicité, le code de César fut encore employé par les officiers sudistes pendant la guerre de Sécession, et même par l'armée russe en 1915. </p>

</br>
    <section id ="chiffrement_affine">
      <h3> Chiffrement d'Affine </h3>
      <p> C'est une version améliorée du chiffrement de César. Au lieu d'additionner le pas de décalage, on utise ce qu'on appelle la fonction d'Affine : </br> </p>
      <ul>
        <li> F(X) = aX + b</li>
        <li> La clé est (a,b) tel que a,b  [0..25] et PGCD (a,26) = 1</li>
        <li> <b> Chiffrement </b> : C  = (a * L + b) mod 26 </li>
        <li> <b> Déchiffrement </b> : L = a⁻¹ * (C-b) mod 26 (avec a⁻¹ l'inverse modulaire de a)</li>
      </ul>
      <p> <b> Remarque </b> Si a = 1, alors on se retrouve avec le chiffrement de césar </p>

      <h4> Comment choisir les nombres a et b ? </h4>
      <p> Pour que le codage puisse remplir sa fonction, il faut qu'a chaque entier n dans [0,25] siut assicué 
        une unique image n' = axn + b dans [0,25] ce qui ne sera pas le cas pour tous les couples (a,b).</br>
        En effet, si par exemple on choisit a = 4 et b = 1, on voit que pour n = 0, on trouve n' = 4x0 + 1 ≡ 1[26], mais si n = 13 alors n' = 4x13 + 1 ≡ 1[26],
        on a donc une ambiguité, car 0 et 13 ont la même image par la transformation affine. </br>
        Lorsque n décrit [0,25], les valeurs de n' seront toutes différentes les unes des autres si et seulement si 
        a est un entier premier avec 26 dans [0,25]. 
        b peut être librement choisi parmi les 26 entiers de [0,25] </br> </p>

      <h4> Cryptanalyse du chiffrement d'Affine </h4>
      <p> On peut se servir de la méthode d'Al-Kindi, pour établir la fréquence relative à chaque lettre chiffrée, puis identifier 
        les chiffres des deux lettres les plus fréquentes. Enfin, on résout le système d'équations à deux inconnus : </br> </p>
        <ul>
          <li> F(L1) = C1 = (a*L1 +b) mod 26 </li>
          <li> F(L2) = C2 = (a*L2 +b) mod 26</li>
        </ul>
      <b> Exemple : </b>
       <ul>
         <li> F ("E") = F(4) = 6 ≡ "G" -> (4a + b) mod 26 = 6 </li>
         <li> F ("T") = F(16) = 7 ≡ "H"  -> (19a + b) mod 26 = 7</li>
         <li> (a,b) = (7,4) </li>
        </ul>
    </section>

</br>
</br>
    <section id="chiffrement_vigenere">
      <h3> Chiffrement de Vigenère </h3>
      <p> C'est un chiffrement <b> poly-alphabétique </b>, le chiffrement de Vigenère est une amélioration du chiffrement
      de César. Sa force réside dans l'utilisation non pas d'un, mais de 26 alphabets décalés pour chiffrer un message.
      On peut résumer ces décalages avec un carré de Vigenère. 
      Ce chiffrement utilise une clé qui définit le décalage pour chaque lettre du message (A : déclage de 0 pas, B: de 1 pas etc...). </br>
      La grande force du chiffrement de Vigenère est que la même lettre sera chiffrée de différentes manières. </br>
      Si la clé est aussi longue que le texte en clair et moyennant quelques précautions d'utilisation, le système est appelé masque jetable. </p>

      <img class="image-vigenere" src ="https://e.educlever.com/img/6/1/2/5/612517.png" width = 30% height= 30%>
    </section>
</br>
      <h4> Cryptanalyse du chiffrement de Vigenère </h4>
      <p> La première étape de cette méthode de déchiffrement consiste à determiner la taille de la clé de chiffrement.
        L'opération qui permet de la déterminer porte le nom du test de Kasiski, du nom de son inventeur. Il s'appuie sur les répétitions du texte chiffré. </p>
      <img class="image-carre" src="https://fr.scoutwiki.org/images/0/07/Vigenere.gif" width = 30% height= 30%>
</br>
      <h3 id="chiffrement_playfair"> Chiffrement de Playfair </h3>
      <p> Le chiffrement de Playfaire est un chiffrement polugraùùoqie, il a été popularisé par <b> Lyon Playfair </b> mais il a été inventé par <b> Sir Charles Wheatstone </b> (1854)
      un des pionniers du télégraphe électrique. Dans le chiffrement de Playfair, on dispose les 25 lettres de l'alphabet (W exclu, car inutile, on utilise V à la place) dans une grille de 5x5.
      La variante anglaise consiste à garder le W et à fusionner I et J.</br>
        On remplit ensuite la matrice par les lettres du mot clé. Si une lettre se répète, on l'ecrit qu'une seule fois. Puis on complète par les lettres restantes de l'alphabet. </p>

      <h4> Méthode de chiffrement </h4>
      <p> On chiffre le texte par groupes de deux lettres (des bigrammes) en appliquant les règles suivantes : </p>
        <ol>
          <li> Si les deux lettres sont sur les coins d'un rectangle, alors les lettres chiffrées sont sur les deux autres coins.
            Autrement dit, chaque groupe de deux lettres est codé par la lettre à l'intersection de la ligne de la première et la colonne de la deuxième. Puis à l'intersection
            de la ligne de la deuxième et de la colonne de la première. </li>
          <li> Si deux lettres sont sur la même ligne, on prend les deux lettres qui les suivent immédiatement à leur droite</li>
          <li> Si deux lettres sont sur la même colonne, on prend les deux lettres qui les suivent immédiatement en dessous. </li>
          <li> Si le bigramme est composé de deux fois la même lettre, on insère une nulle (usuellement le X) entre les deux pour éliminer ce doublon ; </li>
          <li> S'il y a une seule lettre, on complète par la lettre "X" </li>
      </ol>
     <h4> Méthode de déchiffrement </h4>
     <p> Pour le déchiffrement, on applique  les règles de chiffrement à l'envers : </p>
      <ol>
        <li> Si les deux lettres sont sur les coins d'un rectangle. Chaque groupe de deux lettres est 
          codé par la lettre à l'intersection de la ligne de la première et la colonne de la deuxième puis à l'intersection de la ligne 
          de la deuxième et de la colonne de la première </li>
        <li> Si deux lettres sont sur la même ligne, on prend les deux lettres qui les suivent immédiatement à leur gauche </li>
        <li> Si deux lettres sont sur la même colonne, on prend les deux lettres qui les suivent immédiatement en dessus </li>
      </ol>
     <h4> Cryptanalyse du chiffrement de Playfair </h4>
     <p> Si le cryptogramme est assez long, on peut l'attaquer en regardant quels bigrammes apparaissent le plus souvent
      et en supposant qu'ils représentent les bigrammes les plus courants. Il faut ensuite essayer de reconstituer la grille de chiffrement. </br>
      Comme la plupart des chiffrements anciens, le chiffrement de Playfair peut facilement être cassé si l'on dispose de suffisament d'echantillons.
      Obtenir la clé est relativement rapide si l'on a connaissance à la fois du texte chiffré et du texte clair (attaque à texte clair connu). </p>
    
      <h3> Chiffrement de Hill </h3>
      <p> Il consiste à chiffre le message en substituant les lettrs du message, non plus lettre par lettre,
        mais par groupe de lettres. Il permet ainsi de rendre plus difficile de le casser par observation des fréquences. </br>
        C'est un chiffrement à base de l'algèbre matricielle, la substitution se fait à l'aide de m équations linéaires.
        L'algorithme remplace m lettre successives par m lettre chiffrées. </p>
      <h4> Chiffrement  </h4>
      <p> Les lettres sont remplacées par leur rang suivant l'alphabet. On choisit une clé K sous forme d'une matrice de 2x2 telle que PGCD(det(K),26) = 1
        Chaque paire de lettres Lₖ et Lₖ₊₁ du message clair sont remplacées par Cₖ et Cₖ₊₁ </p>
       <!-- Ajout formule Hill -->

      <h4> Déchiffrement </h4>
      <p> Pour déchiffrer, le principe est le même que pour le chiffrement : on prend les lettres deux par deux,puis on les multiplie par une matrice.
        Cette matrice doit être l'inverse de la matrice de chiffrement (modulo 26). </p>
      <!-- Ajout formule déchiffrement Hill --> 


      <h4> Description de l'algorithme d'Euclide étendu (les équations diophantiennes) </h4>
      <ul>
        <li> On commence par descendre avec l'algorithme d'Euclide pour le PGCD, en notant les quotients dans la colonne de gauche
          et les restes successifs dans la seconde colonne. Pour deux élements successifs descendants, on calcul le troisième par division : a divisé par b -> q reste c. <li>
        <li> Le processus s'arrête lorsqu'on obtient un reste nul (0), qui permet d'écrire dans la colonne 3, en face des deux derniers nombres obtenus, les nombres 0 et 1, dont les produits croisés 
          avec la deuxième colonne ont une différence de 1. On peut les lire comme des déterminants valant alternativement 1 et -1. </li>
        <li> On remonte ensuite en construisant la troisième colonne avec l'égalité caractéristique de la division euclidienne : x' = y' * q + z', parallèlement à la première colonne.
          On note des traits obliques alternés pour indiquer dans quel sens la soustraction donne 1. </li>
        <li> A chaque ligne, on a par construction une solution d'une équation de la forme ay - bx ± 1, avec une alternance des signes.
          La ligne d'en haut fournit ainsi la solution de l'équation diophantienne initiale, les lignes suivantes celle d'équations diophantiennes réduites. </li>
      </ul>

      <h4> Cryptanalyse </h4>
      <p> Bien qu'il soit plus dur à casser que le chiffrement d'Affine, le chiffrement de Hill est loin de garantir une sécurité totale.
        On peut lui aussi l'attaquer en faisant une analyse de fréquences, mais cette fois sur les bigrammes. Les plus fréquents de la langues française sont :
        "es","en","ou","de","nt","te","on". En relevant les bigrammes apparaissant le plus dans un texte chiffré, on pourra
        supposer qu'ils représentent un de ceux-là. On pourra ensuite compléter cette démarche par une attaque avec mot probable : 
          <ul>
              <li> Essayer de trouver quelques caractéristiques de quelques mots du texte chiffré. </li>
              <li> Regarder dans les mots de la langue originale quels sont les mots qui ont ces caractéristiques. </li>
              <li> Remplacer, observer et analyser </li>
          </ul>
      
  <!-- Chapitre 3 -->
  <section id="chapitre3">
    <h2>Chapitre 3 : Le chiffrement par transposition</h2>
    <p>Le chiffrement par transposition est une autre technique de chiffrement qui consiste à permuter les lettres du message. Nous allons l'étudier en détail dans ce chapitre.</p>
    <p> Un chiffre de transposition consiste à changer l'ordre des lettres, donc à construire des anagrammes. Cette méthode est connue depuis l'Antiquité, puisque les Spartes
      utilisaient déja une scytale. Une analyse statistique sur les chiffrements par transposition n'est pas utile, puisque seul l'ordre des symboles est différent;
      les symboles restent les mêmes. Donc, les symboles les plus fréquents dans le message clair resteront évidemment les plus fréquents dans le message chiffré. </p>
    <h4> Transposition simple par colonnes </h4>
    <p> Dans ce type de chiffrement, on dispose les lettres du message dans un tableau de <l>n </l> colonnes. </p>
    <h4> Chiffrement </h4>
    <p> Pour chiffrer un message, on va disposer les lettres du message horizontalement sur la matrice de longueur n,puis on collecte les lettres verticalement.
      Pour un message de longueur m alors on aura deux cas de figure : </p>
      <ul>
        <li> m mod n = 0 ; dans ce cas, toutes les colonnes ont la même hauteur [m/n]. </li>
        <li> m mod n = i ; tel que a> 0 : dans ce cas, la hauteur des i premières colonnes est [m/n] +1.
          La hauteur des n - i colonnes restantes est [m/n]. </li>
      </ul>
    <h4> Déchiffrement </h4>
    <p> Contrairement au chiffrement, on dispose les lettres du chiffre verticalement, puis on collecte les lettres horizontalement. La construction de la matrice se fait 
      de la même manière </p>
    
    <h4> Transposition complexe par colonnes </h4>
    <p> Une transposition complexe par colonnes s'effectue à partir d'une clé (mot ou expression) de longueur souhaitée.
    On numérote ensuite les lettres dans l'ordre alphabétique. Si une même lettre appraît plusieurs fois, elle est numérotée successivement de la gauche
    vers la droite. </p>
    <h4> Chiffrement </h4>
    <p> La clé du message donne à la fois le nombre de colonnes du tableau, et la l'ordre de la récolte des lettres.
      De la même manière que la transposition simple, on dispose horizontalement les lettres du message sur la matrice de longuer équivalente à la longueur 
      de la clé</br> </p>
    <p> On collecte verticalement les lettres suivant l'ordre croissant des lettres de la clé par rapport à l'alphabet. </p>
    <h4> Déchiffrement </h4>
    <p> On effectue l'opération inverse pour déchiffrer le message : </p>
    <ul>
      <li> On dispose verticalement les lettres du message chiffré suivant l'ordre croissant des lettres du mot clé 
        par rapport à l'alphabet. </li>
      <li> Collecter horizontalement les lettres </li>
    </ul>
    <h4> Cryptanalyse du chiffrement par transposition </h4>
    <p> A moins que l'on dispose de renseignements subsidaires, le décryptement d'une transposition à tableau est souvent un travail long,
      comportant de nombreux tâtonnements. Le principe de base consiste à rechercher une juxtaposition verticale de deux portions du cryptogramme
      permettant d'obtenir des bigrammes particulièrement vraisemblables. Par exemple (qu,es,et,etc.). </br>
      La manière la plus commode de réaliser des juxtapositions paraît être de faire deux bandes de papier sur chacune desquelles on inscrira verticalement le texte complet du cryptogramme.
      En les faisant coulisser l'une par rapport à l'autre, on pourra réaliser toutes les juxtapositions possibles. </p>
</br>
</br>
  </section>

 <!-- Chapitre 4 -->
  <section id="chapitre4">
     <h2>Algorithme de chiffrement à clé publique</h2>
     <p>Les techniques de cryptographie classique ont apporté une grande contribution à la sécurité des messages transmis durant des siècles.
      Néanmoins, elles ne sont plus d'actualité, dès l'apparition des premiers ordinateurs. En effet, d'un côté, ces techniques ne garantissent pas une sécurité
      forte, car avec de simples algorithmes, un ordinateur peut les casser en une fraction de seconde.
      D'un autre côté, ces techniques permettent seulement le chiffrement de données textuelles. </p>
      <p> La cryptographie entre dans une nouvelle ère avec l'utilsiation intensive des ordinateurs, qui permettent d'exploiter des algorithmes bien plus complexe, 
        mais en même temps, les attaques peuvent être automatisées. </p>
      <p> Ce chapitre va présenter certaines techniques de cryptographie moderne, plus exactement les algorithmes de chiffrement à clé publique. </p>
     </p>
      <h4> Chiffrement symétrique </h4>
      <p> Les chiffrements symétriques aussi appelées chiffrement à clé privé (secrète) sont les héritiers
        des méthodes cryptographiques anciennes (commes les substitutions,les transpositions). Dans ce type de chiffrement,
        l'expéditeur et le destinataire emploient une instance différente d'une même clé pour chiffrer et déchiffrer les messages. </br>
        Le chiffrement symétrique s'appuie grandement sur le fait que les clés doivent être gardées secrètes. L'un des avantages du chiffrement symétrique
        est la rapidité du chiffrement des messages par rapport au chiffrement asymétrique. Néanmoins, l'échange des clés secrètes, qui doit 
        se faire par un canal sécurisé, est souvent le point faible de ces méthodes de chiffrement. Enfin le chiffrement symétrique
        assure uniquement la confidentialité des données transmises ou stockées, elle ne peut pas être meployée pour confirmer leur intégrité ni leur authenticité. </p>
      
        <h4> Chiffrement asymétrique </h4>
        <p> En novembre 1976,Diffie et Hellman publient l'article dans le quelle ils fournissent pour le problème d'échange de clés, cette solution
          est le chiffrement à clé publique qui est également connue sous le terme de chiffrement asymétrique. Le chiffrement asymétrique utilise deux clés conjointement,
          une combinaison d'une clé privée et d'une clé publique. Si un message est chiffré par la clé privée, alors eule la clé publique correspondant à cette clé privée peut déchiffrer le message.
          Si un message est chiffré par la clé publique, alors seule la clé privée peut déchiffrer le message.
          La clé privée doit rester connue uniquement par son propriétaire respectif, tandis que la clé publique est mise à disposition de tous sur une base de données
          ou un annuaire publiquement accessible.
          L'avantage du chiffrement asymétrique est qu'il peut assurer la confidentialité, l'authenticité et la non-répudiation des communications et du stockage de données électroniques.
          Le principal inconvénient du chiffrement asymétrique est sa lenteur par rapport au chiffrement symétrique. En effet, le chiffrement asymétrique exisge une puissance
          de calcul bien supérieure en raison de sa compléxité mathématique. Dans la suite de cette section,l'algorithme d'exponentiation modulaire
          rapide sera présenté, cet algorithme sera utilisé dans les différents chiffrements qui seront présentés dans ce chapitre. </p>

        <h4> Chiffrement à clé publique </h4>
        <h4> Chiffrement de RSA </h4>
        <p> Après que Whitfield Diffie et Martin Hellman ont introduit la cryptographie a clé publique en 1976, une nouvelle branche de la cryptographie
          s'est soudainement ouverte. En 1977, Ronald Rivest, Adi Shamir et Leonard Adleman ont proposé le premier schéma cryptographique asymétrique intitulé RSA.
          Ce dernier est parfois appelé algorithme Rivest -Shamir - Adleman, est le schéma cryptographique asymétrique le plus utilisé, même si les courbes elliptiques et les schémas 
          logarithmiques discrets gagnent du terrain. </br>
          Avec le chiffrement RSA, la clé publique comme la clé privée peuvent chiffrer un message. La clé opposée à celle utilisée pour chiffre un message sert à le déchiffrer.
          Cet attribut constitue l'une des raisons pour lesquelles RSA est devenu l'algorithme asymétrique, le plus couramment utilisé, car il fournit une méthode 
          permettant d'assurer la confidentialité, l'intégrité, l'authenticité et la non-répudiation des communications et du stockage de données électroniques.</br>
          La sécurité de l'algorithme RSA provient du caractère complexe de la factorisation de grands entiers produits de deux grands nombres entiers.
          Il est facile de multiplier ces nombres, mais la détermination des nombres entiers d'origine, <b>la factorisation </b>

          <h4> Création des clés </h4>
          <p> L'étape de création des clés est à la charge de l'entité (A) qui veut chiffrer ces messages avec une clé privée. Cette étape n'intervient pas à chaque
            chiffrement, car les clés peuvent être réutilisées. Le renouvellement des clés n'intervient que si la clé privée est compromise, ou par 
            précaution au bout d'un certain temps (qui peut se compter en années).
            <ul>
              <li> Choisir p et q, deux grands nombres premiers distincts ; </li>
              <li> Calculer leur produit n = p * q, appelé module de chiffrement ; </li>
              <li> Calculer Φ(n) = (p-1)(q-1) </li>
              <li> Choisir un entier naturel e premier avec Φ(n) et strictement inférieur à Φ(n), appelé exposant de chiffrement ; </li>
              <li> Calculer d,tel que ed mod Φ(n) = 1. Autrement dit, ed -1 est un multiple de Φ(n). On peut calculer d à partir de e et Φ(n), en utilisant l'algorithme d'Euclide </li>
            </ul>
          <h4> Chiffrement </h4>
          <p> M est un entier naturel strictement inférieur à n représentant un message, alors le message chiffré sera représenté par : C = M^e mod n. </p>
          <h4> Déchiffrement </h4>
          <p> pour déchiffrer C, on utilise la clé privée (d,n) comme suit : M = C^d mod n. </p>

        <h4> Chiffrement d'ElGamal </h4>
        <p> Le chiffrement d'ElGamal est un protocole de cryptographie asymétrique inventé par Taher Elgamal en 1984, ce chiffrement est basé
          sur le problème du logarithme discret. </p>
        <h4> Génération de clés </h4>
        <p> Choisir un grand nombre premier p et deux nombres a et g tel que : </p>
        <ul>
          <li> a < p ; </li>
          <li> g < p ; </li>
        </ul>
        <p> Puis on calcule A = g^a mod p . La clé publique est (A,g,p) et la clé privée est a. </p>
        <h4> Chiffrement </h4>
        <p>Pour chiffrer un message M, on choisit un nombre aléatoire b, tel que b < a et le pgcd (b,p-1) = 1, puis on calcule : </p>
        <ul>
          <li> B = g^b mod p ; </li>
          <li> C = M * A^b mod p.</li>
        </ul>
        <p> Le message chiffré est alors (B,C) </p>

        <h4> Déchiffrement </h4>
        <p> Pour déchiffrer un message avec l'algorithme d'ElGamal, on utilise la formule suivante : </p>
        <ul>
          <li> M = C * B^(p-a-1) mod p. </li>
        </ul>   
  </section>
</div>
</main>

