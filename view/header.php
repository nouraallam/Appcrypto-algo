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
    <style>
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

<body class="vh-100" style="display:flex; min-height:100vh; flex-direction: column;">
    <!-- Navbar -->
    <div class="container-fluid px-5 bg-light mon-bg">
        <nav class="navbar navbar-expand-sm navbar-light bg-light nav" aria-label="Third navbar example">
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