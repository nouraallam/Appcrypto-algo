<?php
function substitutionMultiplicationEncrypt($text, $key) {
    $result = '';
    $modulus = 26; // Modulo pour l'alphabet anglais

    for ($i = 0; $i < strlen($text); $i++) {
        $char = strtoupper($text[$i]); // Convertir en majuscule
        if (ctype_alpha($char)) {
            $encryptedChar = ((ord($char) - 65) * $key) % $modulus + 65;
            $result .= chr($encryptedChar);
        } else {
            $result .= $char;
        }
    }

    return $result;
}

function modInverse($a, $m) {
    $m0 = $m;
    $x0 = 0;
    $x1 = 1;

    while ($a > 1) {
        $q = intdiv($a, $m);
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

function substitutionMultiplicationDecrypt($text, $key) {
    $modulus = 26; // Modulo pour l'alphabet anglais

    // Vérifier si la clé est inversible
    $inverseKey = modInverse($key, $modulus);
    if ($inverseKey === false) {
        return "La clé n'est pas inversible dans Z26. Choisissez une autre clé.";
    }

    $result = '';
    for ($i = 0; $i < strlen($text); $i++) {
        $char = strtoupper($text[$i]);
        if (ctype_alpha($char)) {
            // Utiliser l'inverse modulaire pour le déchiffrement
            $decryptedChar = $inverseKey * (ord($char) - 65);
            while ($decryptedChar < 0) {
                $decryptedChar += $modulus;
            }
            $decryptedChar %= $modulus;
            $result .= chr($decryptedChar + 65);
        } else {
            $result .= $char;
        }
    }

    return $result;
}

// Traitement du formulaire pour le chiffrement
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["encrypt"])) {
    $plaintext = $_POST["plaintext"];
    $key = intval($_POST["key"]);

    // Chiffrement
    $encryptionResult = substitutionMultiplicationEncrypt($plaintext, $key);
}

// Traitement du formulaire pour le déchiffrement
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["decrypt"])) {
    $ciphertext = $_POST["ciphertext"];
    $key = intval($_POST["key"]);

    // Déchiffrement
    $decryptionResult = substitutionMultiplicationDecrypt($ciphertext, $key);
}

?>
<!DOCTYPE html>
<html lang="en">

<?php  include_once __DIR__ . '/view/header.php';   ?>
    <title>Chiffrement par Multipiplication</title>
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
                    <input type="text" class="form-control" name="key" id="cleInput" >
                </div></center>
            </div>
            </br></br>
            <div class="row">
                <div class="col-12 col-md-6 mt-3">
                    <h6 class="text-center">Texte en clair</h6>
                    <textarea class="form-control" name="plaintext" id="text" cols="30" rows="5"><?php echo isset($plaintext) ? $plaintext : ''; ?></textarea>
                </div>
                <div class="col-12 col-md-6 mt-3">
                    <h6 class="text-center">Texte chiffré/déchiffré</h6>
                    <textarea class="form-control" name="ciphertext" id="resultat" cols="30" rows="5"><?php echo isset($encryptionResult) ? $encryptionResult : ''; ?></textarea>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 col-md-6">
                    <input type="submit" class="btn btn-primary col-12" value="Chiffrer" name="encrypt" id="btn-chiffrer">
                </div>
                <div class="col-12 col-md-6">
                    <input type="submit" class="btn btn-danger col-12" value="Déchiffrer"  name="decrypt" id="btn-dechiffrer">
                </div>
            </div>
        </form>
</br></br>
        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($decryptionResult)) {
        echo "<h3>Résultat du déchiffrement:</h3>";
        echo "<p>$decryptionResult</p>";
    }
    ?>
    </div>

    <!-- Inclure les scripts Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
</body>
</html>

