<?php
include_once __DIR__ . '/view/header.php';
$inputText = $encryptedText = $decryptedText = $a = $b = $action = "";

// Fonction de chiffrement affine
function affineEncrypt($text, $a, $b) {
    $result = "";
    $m = 26; // Taille de l'alphabet

    // Boucle à travers chaque caractère du texte
    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];

        // Vérifier si le caractère est alphabétique
        if (ctype_alpha($char)) {
            $isUpper = ctype_upper($char);
            $char = strtoupper($char);

            // Calcul du caractère chiffré en utilisant la formule du chiffrement affine Y=ax+b MOD26
            $encryptedChar = chr((($a * (ord($char) - ord('A')) + $b) % $m) + ord('A'));

            // Conversion du résultat en minuscules si nécessaire
            if (!$isUpper) {
                $encryptedChar = strtolower($encryptedChar);
            }

            // Ajout du caractère chiffré au résultat final
            $result .= $encryptedChar;
        } else {
            // Si le caractère n'est pas alphabétique, laisser inchangé dans le résultat
            $result .= $char;
        }
    }

    // Retourner le résultat du chiffrement
    return $result;
}

// Fonction de déchiffrement affine
function custom_gmp_invert($a, $m)
{
    // Trouver l'inverse multiplicatif de a modulo m
    for ($x = 1; $x < $m; $x++) {
        if (($a * $x) % $m == 1) {
            return $x;
        }
    }

    // Si l'inverse n'existe pas, retourner -1
    return -1;
}

// Fonction de déchiffrement affine
function affineDecrypt($text, $a, $b) {
    $result = "";
    $m = 26; // Taille de l'alphabet

    // La formule de déchiffrement affine est D(x) = a^(-1) * (x - b) mod m,
    // où a^(-1) est l'inverse multiplicatif de a modulo m.

    // Calculer l'inverse multiplicatif de a modulo m
    $aInverse = custom_gmp_invert($a, $m);

    // Vérifier si l'inverse a été trouvé
    if ($aInverse === -1) {
        echo "L'inverse multiplicatif de a modulo m n'existe pas. Veuillez choisir une autre clé.";
        exit; // Arrêter le script
    }

    // Boucle à travers chaque caractère du texte
    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];

        // Vérifier si le caractère est alphabétique
        if (ctype_alpha($char)) {
            $isUpper = ctype_upper($char);
            $char = strtoupper($char);

            // Calcul du caractère déchiffré en utilisant la formule du déchiffrement affine x=(y-b)a^-1 mod 26
            $decryptedChar = chr((($aInverse * (ord($char) - ord('A') - $b + $m) % $m) + ord('A')));

            // Conversion du résultat en minuscules si nécessaire
            if (!$isUpper) {
                $decryptedChar = strtolower($decryptedChar);
            }

            // Ajout du caractère déchiffré au résultat final
            $result .= $decryptedChar;
        } else {
            // Si le caractère n'est pas alphabétique, laisser inchangé dans le résultat
            $result .= $char;
        }
    }

    // Retourner le résultat du déchiffrement
    return $result;
}

// Traitement du formulaire
if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = $_POST["text"];
    $resultat= $_POST["resultat"];
    $a = $_POST["a"];
    $b = $_POST["b"];
    $action = isset($_POST["encrypt"]) ? "encrypt" : (isset($_POST["decrypt"]) ? "decrypt" : "");

    // Utiliser directement $action pour déterminer l'action
    if ($action == "encrypt") {
        // Appel de la fonction de chiffrement
        $encryptedText = affineEncrypt($inputText, $a, $b);
    } elseif ($action == "decrypt") {
        // Appel de la fonction de déchiffrement
        $decryptedText = affineDecrypt($resultat, $a, $b);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chiffrement Affine</title>
    <!-- Inclure le style Bootstrap pour conserver le même design -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-3">
        <form method="POST" action="">
            <div class="row">
                <div class="col-12 col-md-6">
                    <label for="a">Clé "a":</label>
                    <input type="number" class="form-control" id="a" name="a" required>
                </div>
                <div class="col-12 col-md-6">
                    <label for="b">Clé "b":</label>
                    <input type="number" class="form-control" id="b" name="b" required>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 mt-3">
                    <h6 class="text-center">Texte en clair</h6>
                    <textarea class="form-control" name="text" id="text" cols="30" rows="5"><?php echo isset($inputText) ? $inputText : ''; ?></textarea>
                </div>
                <div class="col-12 col-md-6 mt-3">
                    <h6 class="text-center">Texte chiffré/déchiffré</h6>
                    <textarea class="form-control" name="resultat" id="resultat" cols="30" rows="5"><?php echo isset($encryptedText) ? $encryptedText : ''; ?></textarea>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 col-md-6">
                    <!-- Modifier le nom du bouton à "encrypt" -->
                    <input type="submit" class="btn btn-primary col-12" value="Chiffrer" name="encrypt" id="btn-chiffrer">
                </div>
                <div class="col-12 col-md-6">
                    <!-- Modifier le nom du bouton à "decrypt" -->
                    <input type="submit" class="btn btn-danger col-12" value="Déchiffrer" name="decrypt" id="btn-dechiffrer">
                </div>
            </div>
        </form>
        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($decryptedText) && $action == "decrypt") {
    echo "<h3>Résultat du déchiffrement:</h3>";
    echo "<p>$decryptedText</p>";
}
?>

    </div>

    <!-- Inclure les scripts Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <?php /* if (!empty($encryptedText) || !empty($decryptedText)) : ?>
        <div class="container mt-3">
            <h3>Résultats:</h3>
            <?php if (!empty($encryptedText)) : ?>
                <p><strong>Texte chiffré:</strong> <?php echo $encryptedText; ?></p>
            <?php endif; ?>
            <?php if (!empty($decryptedText)) : ?>
                <p><strong>Texte déchiffré:</strong> <?php echo $decryptedText; ?></p>
            <?php endif; ?>
        </div>
    <?php endif; */ ?>
</body>

</html>
