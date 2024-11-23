<?php

function chiffrementDES($key, $data) {
    $cipher = "DES-EDE3-CBC";
    $ivSize = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivSize);
    $texte_chiffre = openssl_encrypt($data, $cipher, $key, 0, $iv);
    return base64_encode($iv . $texte_chiffre);
}

function dechiffrementDES($key, $data) {
    $cipher = "DES-EDE3-CBC";
    $data = base64_decode($data);
    $ivSize = openssl_cipher_iv_length($cipher);
    $iv = substr($data, 0, $ivSize);
    $texte_dechiffre = openssl_decrypt(substr($data, $ivSize), $cipher, $key, 0, $iv);
    return $texte_dechiffre;
}

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $key = $_POST["cle"];
    $texte_clair = $_POST["texte_clair"];
    $choix = $_POST["choix"];

    if ($choix == "chiffrer") {
        $texte_chiffre = chiffrementDES($key, $texte_clair);
        $resultat_hex = bin2hex($texte_chiffre);
    } elseif ($choix == "dechiffrer") {
        $texte_dechiffre = dechiffrementDES($key, hex2bin($texte_clair));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chiffrement et Déchiffrement DES</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Chiffrement et Déchiffrement DES</h1>
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
