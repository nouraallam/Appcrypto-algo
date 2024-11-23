<?php
function vigenereEncrypt($text, $key) {
    $text = strtoupper($text);
    $key = strtoupper($key);
    $encryptedText = '';

    for ($i = 0, $j = 0; $i < strlen($text); $i++) {
        $char = $text[$i];

        if (ctype_alpha($char)) {
            $encryptedText .= chr((ord($char) + ord($key[$j % strlen($key)]) - 2 * ord('A')) % 26 + ord('A'));
            $j++;
        } else {
            $encryptedText .= $char;
        }
    }

    return $encryptedText;
}

function vigenereDecrypt($text, $key) {
    $text = strtoupper($text);
    $key = strtoupper($key);
    $decryptedText = '';

    for ($i = 0, $j = 0; $i < strlen($text); $i++) {
        $char = $text[$i];

        if (ctype_alpha($char)) {
            $decryptedText .= chr((ord($char) - ord($key[$j % strlen($key)]) + 26) % 26 + ord('A'));
            $j++;
        } else {
            $decryptedText .= $char;
        }
    }

    return $decryptedText;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = isset($_POST['text']) ? $_POST['text'] : '';
    $key = isset($_POST['key']) ? $_POST['key'] : '';
    $resultat = isset($_POST['resultat']) ? $_POST['resultat'] : '';
    $action = isset($_POST["encrypt"]) ? "encrypt" : (isset($_POST["decrypt"]) ? "decrypt" : "");

    if ($action === 'encrypt') {
        $textchiffre = vigenereEncrypt($text, $key);
    } elseif ($action === 'decrypt') {
        $textdechiffre = vigenereDecrypt($resultat, $key);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php  include_once __DIR__ . '/view/header.php';   ?>
    <title>Chiffrement de Vigenère</title>
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
    echo '<h6>Texte chiffré/déchiffré</h6>';
    echo '<textarea class="form-control mx-auto"  id="resultat" cols="30" rows="5">' . (isset( $textdechiffre) ?  $textdechiffre : '') . '</textarea>';
    echo '</div>';
    echo '</center>';
}
?>
    </div>

    <!-- Inclure les scripts Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
