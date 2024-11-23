<!DOCTYPE html>
<html lang="en">
<head>
    <?php  include_once __DIR__ . '/view/header.php';   ?>
    <meta charset="UTF-8">
    <title>Chiffrement par Multiplication - Attaque par Force Brute</title>
    <!-- Ajoutez les liens Bootstrap ici -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Chiffrement par Multiplication - Attaque par Force Brute</h1>
        <form action="" method="post" class="mt-3">
            <div class="form-group">
                <label for="message_chiffre">Texte chiffré :</label><br>
                <input type="text" id="message_chiffre" name="message_chiffre" class="form-control" required>
            </div>
            <input type="submit" value="Décrypter" class="btn btn-primary mt-3">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupération du texte chiffré soumis par le formulaire
            $message_chiffre = strtoupper($_POST["message_chiffre"]); // Convertir en majuscules pour la simplicité

            // Algorithme de force brute pour décrypter le message chiffré
            forceBruteMultiplication($message_chiffre);
        }

        // Fonction de force brute pour le chiffrement par multiplication
        function forceBruteMultiplication($message_chiffre) {
            echo "<h3>Résultats de l'attaque par force brute :</h3>";

            // Boucle pour tester toutes les clés possibles
            for ($cle = 1; $cle <= 25; $cle++) {
                $message_dechiffre = "";

                // Déchiffrement en testant chaque lettre
                for ($i = 0; $i < strlen($message_chiffre); $i++) {
                    $lettre_chiffree = $message_chiffre[$i];

                    if (ctype_upper($lettre_chiffree)) {
                        // Conversion de la lettre en position (A=0, B=1, ..., Z=25)
                        $position_chiffre = ord($lettre_chiffree) - ord('A');

                        // Déchiffrement avec la clé de multiplication (modulo pour boucler dans l'alphabet)
                        $nouvelle_position = ($position_chiffre * modInverse($cle, 26)) % 26;

                        // Conversion de la nouvelle position en lettre
                        $lettre_dechiffree = chr($nouvelle_position + ord('A'));

                        // Ajouter la lettre déchiffrée au message
                        $message_dechiffre .= $lettre_dechiffree;
                    } else {
                        // Conserver les caractères non alphabétiques inchangés
                        $message_dechiffre .= $lettre_chiffree;
                    }
                }

                // Afficher le texte déchiffré pour chaque clé testée
                echo "<p>Clé $cle : $message_dechiffre</p>";
            }
        }

        // Fonction pour calculer l'inverse modulaire
        // Fonction pour calculer l'inverse modulaire
function modInverse($a, $m) {
    $m0 = $m;
    $x0 = 0;
    $x1 = 1;

    if ($m == 0) {
        return 1; // La division par zéro n'a pas d'impact car l'inverse modulaire n'est pas nécessaire
    }

    while ($a > 1) {
        $q = intval($a / $m);
        $t = $m;

        $m = $a % $m;
        $a = $t;

        $t = $x0;
        $x0 = $x1 - $q * $x0;
        $x1 = $t;
    }

    if ($x1 < 0) {
        $x1 += $m0;
    }

    return $x1;
}

        ?>
    </div>
</body>
</html>
