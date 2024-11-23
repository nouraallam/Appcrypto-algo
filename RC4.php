<?php

function rc4($key, $data) {
    $keylen = strlen($key);
    $s = range(0, 255);
    $j = 0;

    for ($i = 0; $i < 256; $i++) {
        $j = ($j + $s[$i] + ord($key[$i % $keylen])) % 256;
        // Swap
        $temp = $s[$i];
        $s[$i] = $s[$j];
        $s[$j] = $temp;
    }

    $i = 0;
    $j = 0;
    $result = '';

    for ($k = 0; $k < strlen($data); $k++) {
        $i = ($i + 1) % 256;
        $j = ($j + $s[$i]) % 256;
        // Swap
        $temp = $s[$i];
        $s[$i] = $s[$j];
        $s[$j] = $temp;

        $result .= $data[$k] ^ chr($s[($s[$i] + $s[$j]) % 256]);
    }

    return $result;
}

function rc4_decrypt($key, $data) {
    // La fonction de déchiffrement est la même que la fonction de chiffrement pour RC4
    return rc4($key, $data);
}

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $key = $_POST["cle"];
    $texte_clair = $_POST["texte_clair"];
    $choix = $_POST["choix"];

    if ($choix == "chiffrer") {
        $texte_chiffre = rc4($key, $texte_clair);
        $resultat_hex = bin2hex($texte_chiffre);
    } elseif ($choix == "dechiffrer") {
        $texte_dechiffre = rc4_decrypt($key, hex2bin($texte_clair));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chiffrement et Déchiffrement RC4</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

h1 {
    text-align: center;
}

form {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

label {
    display: block;
    margin-bottom: 8px;
}

input[type="text"],
select {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.resultat {
    margin-top: 20px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

    </style>
</head>
<body>
    <h1>Chiffrement et Déchiffrement RC4</h1>
    <form action="" method="post">
        <label for="cle">Clé :</label>
        <input type="text" id="cle" name="cle" required><br>
        <label for="texte_clair">Texte :</label>
        <input type="text" id="texte_clair" name="texte_clair" required><br>
        <label for="choix">Choix :</label>
        <select id="choix" name="choix" required>
            <option value="chiffrer">Chiffrer</option>
            <option value="dechiffrer">Déchiffrer</option>
        </select><br>
        <input type="submit" value="Exécuter">
    </form>

    <?php if (isset($resultat_hex)) : ?>
        <div class="resultat">
            <p>Texte chiffré (hex) : <?= $resultat_hex ?></p>
        </div>
    <?php elseif (isset($texte_dechiffre)) : ?>
        <div class="resultat">
            <p>Texte déchiffré : <?= $texte_dechiffre ?></p>
        </div>
    <?php endif; ?>
</body>
</html>
