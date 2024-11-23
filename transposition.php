 <?php
function encryptColumnarTransposition($plainText, $key) {
    // Calcul du nombre de colonnes
    $numColumns = strlen($key);

    // Calcul du nombre de lignes (arrondi vers le haut)
    $numRows = ceil(strlen($plainText) / $numColumns);

    // Initialisation de la matrice
    $matrix = array();

    $index = 0;
    // Remplissage de la matrice avec le texte en clair
    for ($i = 0; $i < $numRows; $i++) {
        for ($j = 0; $j < $numColumns; $j++) {
            // Remplissage de la matrice avec chaque caractère du texte
            if ($index < strlen($plainText)) {
                $matrix[$i][$j] = $plainText[$index++];
            } else {
                // Si le texte est terminé, remplissage avec des espaces
                $matrix[$i][$j] = ' ';
            }
        }
    }

    // Construction du tableau des indices
    $indices = range(0, $numColumns - 1);

    // Tri des indices en fonction des caractères de la clé
    usort($indices, function ($a, $b) use ($key) {
        return strcmp($key[$a], $key[$b]);
    });

    // Construction du texte chiffré en suivant l'ordre des colonnes spécifié par la clé
    $encryptedText = '';
    foreach ($indices as $col) {
        for ($i = 0; $i < $numRows; $i++) {
            $encryptedText .= $matrix[$i][$col];
        }
    }

    // Renvoi du texte chiffré
    return $encryptedText;
}


function decryptColumnarTransposition($cipherText, $key) {
    // Calcul du nombre de colonnes
    $numColumns = strlen($key);

    // Calcul du nombre de lignes (arrondi vers le haut)
    $numRows = ceil(strlen($cipherText) / $numColumns);

    // Initialisation de la matrice,Création d'une matrice vide avec le nombre de lignes et de colonnes calculé précédemment
    $matrix = array_fill(0, $numRows, array_fill(0, $numColumns, ''));

    // Construction du tableau des indices
    $indices = range(0, $numColumns - 1);

    // Transformation de la clé en un tableau de caractères pour faciliter le tri
    $keyArray = str_split($key);

    // Tri des indices en utilisant l'ordre alphabétique des caractères de la clé
    array_multisort($keyArray, $indices);

    // Remplissage de la matrice avec le texte chiffré
    $index = 0;
    foreach ($indices as $col) {
        for ($row = 0; $row < $numRows; $row++) {
            if ($index < strlen($cipherText)) {
                $matrix[$row][$col] = $cipherText[$index++];
            }
        }
    }

    // Construction du texte déchiffré en suivant l'ordre des colonnes spécifié par la clé  en concaténant les caractères de chaque ligne de la matrice.
    $decryptedText = '';
    foreach ($matrix as $row) {
        $decryptedText .= implode('', $row);
    }

    // Supprimer les espaces ajoutés à la fin du texte chiffré
    $decryptedText = rtrim($decryptedText);

    // Renvoi du texte déchiffré
    return $decryptedText;
}





if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $key = trim($_POST["key"]);
    $text = $_POST["text"];
    $resultat = $_POST["resultat"];
    $action = isset($_POST["encrypt"]) ? "encrypt" : (isset($_POST["decrypt"]) ? "decrypt" : "");


    if ( $action === "encrypt") {
        // Chiffrement du texte brut
        $textchiffre = encryptColumnarTransposition($text, $key);
    } elseif ( $action === "decrypt") {
        // Déchiffrement du texte chiffré
        $textdechiffre = decryptColumnarTransposition( $resultat, $key);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php  include_once __DIR__ . '/view/header.php';   ?>
    <title>Columnar Transposition Cipher</title>
        <!-- Inclure le style Bootstrap pour conserver le même design -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <!-- Formulaire HTML -->
    <div class="container mt-3">
        <form method="POST" action="">
            <div class="row">
                <center>
                <div class="col-12 col-md-6">
                    <label for="cleInput">Clé :</label>
                    <input type="text" class="form-control" id="cleInput" name="key">
                </div></center>
            </div>
            </br></br>
            <div class="row">
                <div class="col-12 col-md-6 mt-3">
                    <h6 class="text-center">Texte en clair</h6>
                    <textarea class="form-control" name="text" id="text" cols="30" rows="5"><?php echo isset( $text) ?  $text : ''; ?></textarea>
                </div>
                <div class="col-12 col-md-6 mt-3">
                    <h6 class="text-center">Texte déchiffré</h6>
                    <textarea class="form-control" name="resultat" id="resultat" cols="30" rows="5"><?php echo isset($textchiffre) ? $textchiffre : ''; ?></textarea>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 col-md-6">
                    <input type="submit" class="btn btn-primary col-12" value="Chiffrer" name="encrypt" id="btn-chiffrer">
                </div>
                <div class="col-12 col-md-6">
                    <input type="submit" class="btn btn-danger col-12" value="Déchiffrer" name="decrypt" id="btn-dechiffrer">
                </div>
            </div>
        </form>
        </br></br>

        
        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset( $textdechiffre) && $action == "decrypt") {

    // Echo du code HTML à l'intérieur de PHP
    echo '<center>';
    echo '<div class="col-12 col-md-6 mt-3 text-center">';
    echo '<h6>Texte déchiffré</h6>';
    echo '<textarea class="form-control mx-auto"  id="resultat" cols="30" rows="5">' . (isset( $textdechiffre) ?  $textdechiffre : '') . '</textarea>';
    echo '</div>';
    echo '</center>';
}
?>
</body>
</html>
