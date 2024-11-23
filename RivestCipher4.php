<?php

function rc4($key, $data) {
    $keyLen = count($key);

    if ($keyLen == 0) {
        return array();
    }

    $s = range(0, 255);
    $j = 0;
    $result = array();

    // Étape 1 : Initialisation de S
    for ($i = 0; $i < 256; $i++) {
        $j = ($j + $s[$i] + $key[$i % $keyLen]) % 256;
        [$s[$i], $s[$j]] = [$s[$j], $s[$i]];
    }

    // Étape 2 : PRGA (Pseudo-Random Generation Algorithm)
    $i = $j = 0;

    foreach ($data as $char) {
        // Mettez à jour le calcul de $t et $keystream avant de les utiliser
        $i = ($i + 1) % 256;
        $j = ($j + $s[$i]) % 256;
        [$s[$i], $s[$j]] = [$s[$j], $s[$i]];
    
        $t = ($s[$i] + $s[$j]) % 256;
        $keystream = $s[$t];
    
        // Stockage du résultat en binaire (opération de bits correcte)
        $result[] = $char ^ $keystream;
    }

    return $result;
}

// Fonction pour formater la sortie binaire
function formatBinaryOutput($value) {
    // Ajoute des zéros à gauche pour assurer une longueur de 8 bits
    return str_pad(decbin($value), 8, '0', STR_PAD_LEFT);
}

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $key = array_map('intval', str_split(str_replace(' ', '', $_POST["key"])));
    // Utiliser explode pour diviser la séquence de texte en clair
    $data = array_map('intval', explode(' ', str_replace(' ', '', $_POST["data"])));
    $action = isset($_POST["encrypt"]) ? "encrypt" : (isset($_POST["decrypt"]) ? "decrypt" : "");

    if ($action === "encrypt") {
        // Chiffrement du texte
        $encryptedDataArray = rc4($key, $data);
        $encryptedDataBinaryArray = array_map('formatBinaryOutput', $encryptedDataArray);
    } elseif ($action === "decrypt") {
        // Déchiffrement du texte chiffré
        // $textdechiffre = decryptColumnarTransposition( $resultat, $key);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/view/header.php';   ?>
    <title>RC4 chiffrement/déchiffrement</title>
    <!-- Inclure le style Bootstrap pour conserver le même design -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
<!-- Formulaire HTML -->
<div class="container mt-3">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="row">
            <center>
                <div class="col-12 col-md-6">
                    <label for="cleInput">Clé :</label>
                    <input type="text" class="form-control" id="cleInput" name="key" >
                </div>
            </center>
        </div>
        </br></br>
        <div class="row">
            <div class="col-12 col-md-6 mt-3">
                <h6 class="text-center">Texte en clair</h6>
                <textarea class="form-control" name="data" id="text" cols="30" rows="5"><?php echo isset($text) ? implode(' ', $data) : ''; ?></textarea>
            </div>
            
            <div class="col-12 col-md-6 mt-3">
    <h6 class="text-center">Texte chiffré (binaire)</h6>
    <?php if (isset($encryptedDataBinaryArray)): ?>
        <textarea class="form-control" name="resultat" id="resultat" cols="30" rows="5"><?php echo implode('', array_map('formatBinaryOutput', $encryptedDataBinaryArray)); ?></textarea>
    <?php endif; ?>
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
</div>


</body>

</html>
