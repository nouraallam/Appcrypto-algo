<?php

include_once __DIR__ . '/view/header.php';

function modInverse($a, $m) {
    for ($x = 1; $x < $m; $x++) {
        if (($a * $x) % $m == 1) {
            return $x;
        }
    }
    return 1;
}

function powerMod($base, $exp, $mod) {
    $result = 1;
    $base = intval($base) % $mod;

    while ($exp > 0) {
        if ($exp % 2 == 1) {
            $result = ($result * $base) % $mod;
        }
        $exp = $exp >> 1;
        $base = ($base * $base) % $mod;
    }
    return $result;
}

function encrypt($message, $e, $n) {
    return powerMod($message, $e, $n);
}

function decrypt($message, $d, $n) {
    return powerMod($message, $d, $n);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $p = intval($_POST["p"]);
    $q = intval($_POST["q"]);
    $message = intval($_POST["message"]);

    $e = 7;   // remplacez par votre valeur de e
    $n = $p * $q;
    $d = modInverse($e, ($p - 1) * ($q - 1));

    $encryptedMessage = encrypt($message, $e, $n);
    $decryptedMessage = decrypt($encryptedMessage, $d, $n);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chiffrement RSA</title>
    <style>
        input {
  display: block; /* Assure que chaque label est affiché sur une nouvelle ligne */
  margin-bottom: 10px; /* Ajoute un espacement en bas de chaque label */
  font-size: 30px; /* Définit la taille de la police */
  color: #333; /* Définit la couleur du texte */
  font-weight: bold; /* Met en gras le texte du label */
}
body {
 
 
  align-items: center;
 
}

form {
  text-align: left; /* Aligner le texte à gauche à l'intérieur du formulaire si nécessaire */
  /* Ajoutez d'autres propriétés de style au besoin */
}

    </style>
</head>

<body>
    <h2>Chiffrement RSA</h2>
    <form method="post" action="">
        <label for="p">Entrez la valeur de p :</label>
        <input type="text" name="p" required>
        <br>
        <label for="q">Entrez la valeur de q :</label>
        <input type="text" name="q" required>
        <br>
        <label for="message">Entrez le message :</label>
        <input type="text" name="message" required>
        <br>
        <input type="submit" value="Chiffrer / Déchiffrer">
    </form>

    <?php
    if (isset($encryptedMessage) && isset($decryptedMessage)) {
        echo "<h3>Résultats :</h3>";
        echo "Message original : " . $message . "<br>";
        echo "Message crypté : " . $encryptedMessage . "<br>";
        echo "Message décrypté : " . $decryptedMessage;
    }
    ?>

<!-- Inclure les scripts Bootstrap -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
