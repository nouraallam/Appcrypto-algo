<?php
include_once __DIR__ . '/view/header.php';

// Fonction pour encrypter ou décrypter un texte en utilisant le chiffre de César
function caesarCipher($text, $shift) {
    $result = "";
    $length = strlen($text);

    for ($i = 0; $i < $length; $i++) {
        $char = $text[$i];

        // Vérifier si le caractère est alphabétique
        if (ctype_alpha($char)) {
            // Déterminer la position ASCII de la lettre et appliquer le décalage
            $asciiStart = ord('A');
            $result .= chr(($asciiStart + ord(strtoupper($char)) + $shift) % 26 + $asciiStart);
        } else {
            // Si le caractère n'est pas alphabétique, le laisser inchangé
            $result .= $char;
        }
    }

    return $result;
}

// Traitement du formulaire lorsque la méthode HTTP est POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $inputText = $_POST["text"];
    $shift = (int)$_POST["cle"]; // La clé est maintenant "cle" et non "shift"
    $action = isset($_POST["encrypt"]);

    // Appeler la fonction caesarCipher avec les données du formulaire pour le chiffrement 
    $encryptedText = caesarCipher($inputText, $shift);
}
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données du formulaire
        $resultat = $_POST["resultat"];
        $shift = (int)$_POST["cle"]; // La clé est maintenant "cle" et non "shift"
        $action = isset($_POST["decrypt"]);
    
        // Appeler la fonction caesarCipher avec les données du formulaire pour t le déchiffrement
        $decryptedText = caesarCipher($resultat, -$shift);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chiffrement de César</title>
    <!-- Inclure le style Bootstrap pour conserver le même design -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-3">
        <form method="POST" action="">
            <div class="row">
                <center>
                <div class="col-12 col-md-6">
                    <label for="cleInput">Clé :</label>
                    <input type="text" class="form-control" id="cleInput" name="cle">
                </div></center>
            </div>
            </br></br>
            <div class="row">
                <div class="col-12 col-md-6 mt-3">
                    <h6 class="text-center">Texte en clair</h6>
                    <textarea class="form-control" name="text" id="text" cols="30" rows="5"><?php echo isset($inputText) ? $inputText : ''; ?></textarea>
                </div>
                <div class="col-12 col-md-6 mt-3">
                    <h6 class="text-center">Texte déchiffré</h6>
                    <textarea class="form-control" name="resultat" id="resultat" cols="30" rows="5"><?php echo isset($encryptedText) ? $encryptedText : ''; ?></textarea>
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
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($decryptedText)  && $action == "decrypt" ) {
        echo "<h3>Résultat du déchiffrement:</h3>";
        echo "<p>$decryptedText </p>";
    }
    ?>
    </div>

    <!-- Inclure les scripts Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
