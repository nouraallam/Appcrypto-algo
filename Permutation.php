 <?php
    
    if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
        $texte = strtoupper($_POST["text"]);
        $cle = strtoupper($_POST["cle"]);
        $resultat = strtoupper($_POST["resultat"]);

        if (isset($_POST["crypter"])) {
            $texte_crypte = "";
            $alphabet = range('A', 'Z');

            // Vérification que la clé contient 26 lettres uniques
            if (preg_match('/^[A-Z]{26}$/', $cle)) {
                $cle_map = array_combine($alphabet, str_split($cle));

                foreach (str_split($texte) as $caractere) {
                    if (ctype_alpha($caractere)) {
                        $nouvelle_lettre = $cle_map[$caractere];
                        $texte_crypte .= $nouvelle_lettre;
                    } else {
                        $texte_crypte .= $caractere;
                    }
                }
            }
             /*   echo "<br>Résultat du chiffrement : " . $texte_crypte;
            } else {
                echo "<br>La clé doit contenir exactement 26 lettres uniques de l'alphabet.";
            } */
        } elseif (isset($_POST["decrypter"])) {
            $texte_decrypte = "";
            $alphabet = range('A', 'Z');

            // Vérification que la clé contient 26 lettres uniques
            if (preg_match('/^[A-Z]{26}$/', $cle)) {
                $cle_map = array_combine($alphabet, str_split($cle));

                foreach (str_split($resultat) as $caractere) {
                    if (ctype_alpha($caractere)) {
                        $nouvelle_lettre = array_search($caractere, $cle_map);
                        $texte_decrypte .= $nouvelle_lettre;
                    } else {
                        $texte_decrypte .= $caractere;
                    }
                }
               /* echo "<br>Résultat du déchiffrement : " . $texte_decrypte;
            } else {
                echo "<br>La clé doit contenir exactement 26 lettres uniques de l'alphabet.";
            }*/
        }
    }
}
    ?>

<!DOCTYPE html>
<html>
<head>
<?php  include_once __DIR__ . '/view/header.php';   ?>
    <title>Chiffrement par Permutation</title>
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
                    <textarea class="form-control" name="text" id="text" cols="30" rows="5"><?php echo isset(  $texte) ?   $texte : ''; ?></textarea>
                </div>
                <div class="col-12 col-md-6 mt-3">
                    <h6 class="text-center">Texte chiffré/déchiffré</h6>
                    <textarea class="form-control" name="resultat" id="resultat" cols="30" rows="5"><?php echo isset($texte_crypte) ? $texte_crypte : ''; ?></textarea>
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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($texte_decrypte) && isset($_POST["decrypter"])) {

    // Echo du code HTML à l'intérieur de PHP
    echo '<center>';
    echo '<div class="col-12 col-md-6 mt-3 text-center">';
    echo '<h6>Texte chiffré/déchiffré</h6>';
    echo '<textarea class="form-control mx-auto" name="resultat" id="resultat" cols="30" rows="5">' . (isset($texte_decrypte) ? $texte_decrypte : '') . '</textarea>';
    echo '</div>';
    echo '</center>';
}
?>


    </div>
<!-- Inclure les scripts Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


            

       <!-- <h2>Entrer votre Texte</h2>
        <input type="text" name="texte"><br><br>
        <h2>Clé (permutation des lettres) :</h2>
        <input type="text" name="cle"><br><br>
        <input type="submit" name="crypter" value="Crypter">
        <input type="submit" name="decrypter" value="Decrypter">
        <a href="index.html" class="button">Retour à l'accueil</a>-->
    </form>
</body>
</html>
        