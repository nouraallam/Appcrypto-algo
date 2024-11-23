<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/view/header.php'; ?>
    <meta charset="UTF-8">
    <title>Attaque par Force Brute - Chiffrement de César</title>

    <!-- Ajoutez les liens Bootstrap ici -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Attaque par Force Brute - Chiffrement de César</h1>
        <form action="" method="post" class="mt-3">
            <div class="form-group">
                <label for="message_chiffre">Texte chiffré :</label><br>
                <textarea id="message_chiffre" name="message_chiffre" rows="4" cols="50" class="form-control"></textarea>
            </div>
            <input type="submit" value="Attaque" class="btn btn-primary mt-3">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupération du texte chiffré soumis par le formulaire
            $message_chiffre = strtoupper($_POST["message_chiffre"]); // Convertir en majuscules pour la simplicité

            // Algorithme de force brute pour décrypter le message chiffré
            bruteForceCesar($message_chiffre);
        }

        // Fonction de force brute pour le chiffrement de César
        function bruteForceCesar($message_chiffre)
        {
            $alphabet = range('A', 'Z'); // Liste des lettres de l'alphabet
            $longueur_alphabet = count($alphabet); // Longueur de l'alphabet
            $lettres_chiffrees = str_split($message_chiffre); // Séparation du texte chiffré en lettres

            // Boucle pour tester toutes les clés possibles (déplacements de lettres)
            for ($cle = 0; $cle < $longueur_alphabet; $cle++) {
                $message_dechiffre = "";

                // Déchiffrement en testant chaque lettre
                foreach ($lettres_chiffrees as $lettre) {
                    if ($lettre === " ") {
                        $message_dechiffre .= " "; // Conserver les espaces inchangés
                    } else {
                        // Trouver la position de la lettre chiffrée dans l'alphabet
                        $position = array_search($lettre, $alphabet);

                        // Déplacer la lettre vers la gauche avec la clé (modulo pour boucler dans l'alphabet)
                        $nouvelle_position = ($position - $cle + $longueur_alphabet) % $longueur_alphabet;

                        // Ajouter la lettre déchiffrée au message
                        $message_dechiffre .= $alphabet[$nouvelle_position];
                    }
                }

                // Afficher le texte déchifré pour chaque clé testée
                echo "<div class='mt-3'>Clé $cle : $message_dechiffre</div>";
            }
        }
        ?>
    </div>
</body>

</html>
