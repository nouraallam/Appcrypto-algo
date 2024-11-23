<?php
// Inclure le fichier d'en-tête (si nécessaire)
//include_once __DIR__ . '/view/header.php';

// Fonction pour convertir une chaîne hexadécimale en binaire
function hexToBin($hex)
{
    return hex2bin(str_replace(' ', '', $hex));
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $message = $_POST["message"];
    $key = $_POST["key"];
    $operation = $_POST["operation"];
    $inputType = $_POST["input_type"];

    // Convertir le texte et la clé en binaire en fonction du type d'entrée
    if ($inputType == "hex") {
        $message = hexToBin($message);
        $key = hexToBin($key);
    }

    // Chiffrer ou déchiffrer en fonction de l'opération sélectionnée
    if ($operation == "encrypt") {
        // Chiffrer le message en utilisant AES-128-ECB
        // Le mode de remplissage PKCS7 est utilisé par défaut
        $ciphertext = bin2hex(openssl_encrypt($message, 'aes-128-ecb', $key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING));
        $result = "Texte chiffré : $ciphertext";
    } elseif ($operation == "decrypt") {
        // Déchiffrer le message en utilisant AES-128-ECB
        // Le mode de remplissage PKCS7 est utilisé par défaut
        $decrypted = openssl_decrypt(hex2bin($message), 'aes-128-ecb', $key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING);
        $result = "Texte déchiffré : $decrypted";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php
// Inclure le fichier d'en-tête (si nécessaire)
include_once __DIR__ . '/view/header.php';?>
    <title>AES Encryption/Decryption</title>

    <!-- Intégration de Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            display: flex;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            display: grid;
            gap: 10px;
            text-align: left;
            max-width: 600px;
            margin: auto;
        }

        .result {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            font-size: 16px;
            padding: 10px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2 class="mt-5 mb-3">Chiffrement et Déchiffrement AES</h2>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea class="form-control" id="message" name="message" rows="4" cols="50"></textarea>
            </div>

            <div class="form-group">
                <label for="key">Clé:</label>
                <input type="text" class="form-control" id="key" name="key">
            </div>

            <div class="form-group">
                <label for="input_type">Type d'entrée:</label>
                <select class="form-control" id="input_type" name="input_type">
                    <option value="text">Texte</option>
                    <option value="hex">Hexadécimal</option>
                </select>
            </div>

            <div class="form-group">
                <label for="operation">Opération:</label>
                <select class="form-control" id="operation" name="operation">
                    <option value="encrypt">Chiffrer</option>
                    <option value="decrypt">Déchiffrer</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Exécuter</button>
        </form>

        <?php
        // Afficher le résultat s'il y en a un
        if (isset($result)) {
            echo "<div class='result'>$result</div>";
        }
        ?>
    </div>

    <!-- Intégration de Bootstrap JS et jQuery (optionnel, si nécessaire) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
