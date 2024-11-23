

    <?php
      
// Fonction pour calculer l'inverse modulaire d'un nombre
function inverseModulo($a, $m) {
    $m0 = $m;
    $x0 = 0;
    $x1 = 1;

    if ($m == 1) {
        return 0;
    }

    while ($a > 1) {
        $q = (int)($a / $m);
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

function inverseMatrix($key) {
    $det = ($key[0][0] * $key[1][1] - $key[0][1] * $key[1][0] + 26) % 26;
    $detInv = inverseModulo($det, 26);

    $inverseKey = [
        [
            ($key[1][1] * $detInv) % 26,
            (-$key[0][1] * $detInv + 26) % 26,
        ],
        [
            (-$key[1][0] * $detInv + 26) % 26,
            ($key[0][0] * $detInv) % 26,
        ],
    ];

    return $inverseKey;
}

    // Fonction pour chiffrement de Hill
    function convertToMatrix($key) {
        $key = explode(',', $key);
        return [
            [(int)$key[0], (int)$key[1]],
            [(int)$key[2], (int)$key[3]]
        ];
    }
    
    function hillCipher($text, $key) {
        $text = preg_replace("/[^A-Za-z]/", '', strtoupper($text));
    
        // Conversion de la clé en une matrice
        $keyMatrix = convertToMatrix($key); // Appel correct de la fonction convertToMatrix
    
        // Taille du texte
        $textLength = strlen($text);
    
        // Calcul de la taille de la clé
        $keySize = count($keyMatrix);
    
        // Initialisation du résultat
        $result = "";
    
        // Chiffrement par blocs
        for ($i = 0; $i < $textLength; $i += $keySize) {
            // Récupération du bloc de texte
            $block = substr($text, $i, $keySize);
    
            // Initialisation du vecteur résultant
            $resultVector = array_fill(0, $keySize, 0);
    
            // Calcul du produit de la matrice de clé avec le bloc de texte
            for ($row = 0; $row < $keySize; $row++) {
                for ($col = 0; $col < $keySize; $col++) {
                    $resultVector[$row] += $keyMatrix[$row][$col] * (ord($block[$col]) - ord('A'));
                }
                $resultVector[$row] %= 26;
            }
    
            // Ajout du résultat au texte chiffré
            foreach ($resultVector as $val) {
                $result .= chr($val + ord('A'));
            }
        }
    
        return $result;
    }
    

    // Fonction pour déchiffrement de Hill
 // Fonction pour déchiffrement de Hill
function hillDecipher($text, $key) {
    $text = preg_replace("/[^A-Za-z]/", '', strtoupper($text)); // Convertir en majuscules et garder que les lettres

    // Conversion de la clé en une matrice
    $keyMatrix = convertToMatrix($key);

    // Calcul de la taille de la clé
    $keySize = count($keyMatrix);

    // Calcul de la matrice inverse
    $invMatrix = inverseMatrix($keyMatrix);

    // Déchiffrement par blocs
    $textLength = strlen($text);
    $result = "";

    for ($i = 0; $i < $textLength; $i += $keySize) {
        $block = substr($text, $i, $keySize);

        $blockVector = array_map('ord', str_split($block)); // Convertir le bloc en valeurs ASCII
        $decryptedVector = [
            ($invMatrix[0][0] * ($blockVector[0] - ord('A')) + $invMatrix[0][1] * ($blockVector[1] - ord('A'))) % 26,
            ($invMatrix[1][0] * ($blockVector[0] - ord('A')) + $invMatrix[1][1] * ($blockVector[1] - ord('A'))) % 26
        ];

        // Appliquer modulo 26 et convertir en lettres
        foreach ($decryptedVector as &$val) {
            if ($val < 0) {
                $val += 26; // Assurer que le résultat est positif
            }
            $result .= chr($val + ord('A'));
        }
    }

    return $result;
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $texte = $_POST["texte"];
    $cle = $_POST["cle"];
    $resultat = $_POST["resultat"];

    if (isset($_POST["crypter"])) {
        $textchiffre = hillCipher($texte, $cle);
        //echo "<br>Résultat du chiffrement : " . $resultat;
    } elseif (isset($_POST["decrypter"])) {
        $dechiffretext = hillDecipher($resultat, $cle);
       // echo "<br>Résultat du déchiffrement : " . $resultat;
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
                    <input type="text" class="form-control" id="cleInput" name="cle">
                </div></center>
            </div>
            </br></br>
            <div class="row">
                <div class="col-12 col-md-6 mt-3">
                    <h6 class="text-center">Texte en clair</h6>
                    <textarea class="form-control" name="texte" id="text" cols="30" rows="5"><?php echo isset( $texte) ?  $texte : ''; ?></textarea>
                </div>
                <div class="col-12 col-md-6 mt-3">
                    <h6 class="text-center">Texte déchiffré</h6>
                    <textarea class="form-control" name="resultat" id="resultat" cols="30" rows="5"><?php echo isset($textchiffre) ? $textchiffre : ''; ?></textarea>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 col-md-6">
                    <input type="submit" class="btn btn-primary col-12" value="Chiffrer" name="crypter" id="btn-chiffrer">
                </div>
                <div class="col-12 col-md-6">
                    <input type="submit" class="btn btn-danger col-12" value="Déchiffrer" name="decrypter" id="btn-dechiffrer">
                </div>
            </div>
        </form>
        </br></br>
         
        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset( $dechiffretext) && isset($_POST["decrypter"])) {

    // Echo du code HTML à l'intérieur de PHP
    echo '<center>';
    echo '<div class="col-12 col-md-6 mt-3 text-center">';
    echo '<h6>Texte chiffré/déchiffré</h6>';
    echo '<textarea class="form-control mx-auto"  id="resultat" cols="30" rows="5">' . (isset( $dechiffretext) ?  $dechiffretext : '') . '</textarea>';
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
 