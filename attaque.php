<?php
include_once __DIR__ . '/view/header.php';
?>

<div class="container row mt-3 ms-3 d-flex align-items-center justify-content-center">
    <div class="row col-12 col-md-6 ">
        <select class="form-control mb-2" name="" id="chiffrement">
            <option value="0" selected>Séléctionner une attaque</option>
            <option value="cesar">cesar</option>
            <option value="multiplication">multiplication</option>
            
             
        </select>
    </div>

    

    <div class="row">
        <!-- Zone de texte à chiffrer -->
        <div class="container col-12 col-md-6 mb-3">
            <h6 class="text-center">Texte chiffré</h6>
            <textarea class="form-control" name="txt-chiffrement" id="txt-chiffrement" cols="20" rows="8"></textarea>
        </div>
        <!-- Zone de texte à déchiffrer -->
    
    </div>
    <div class="col-12 col-md-6">
                <input type="submit" class="btn btn-primary col-12" value="Attaque" name="encrypt" id="btn-chiffrer">
    </div>
 
</div>



<!DOCTYPE html>
<html>
<script>
    // Fonction pour gérer le changement d'option dans le menu déroulant
    function redirectToAlgorithmPage() {
        // Récupérer l'élément select
        var selectElement = document.getElementById("chiffrement");

        // Récupérer la valeur sélectionnée
        var selectedValue = selectElement.value;

        // pour rediriger l'utilisateur vers la page correspondante.
        if (selectedValue === "cesar") {
            window.location.href = "force-césar.php";
        } 
        else if (selectedValue === "multiplication") {
            window.location.href = "force-multi.php";
        } else if(selectedValue === "AES"){
             window.location.href = "AES.php";
        }
        // Ajoutez d'autres redirections similaires pour les autres algorithmes
    }

    // Ajouter un gestionnaire d'événements pour l'événement de changement
    document.getElementById("chiffrement").addEventListener("change", redirectToAlgorithmPage);
</script>

<body>


</body>
</html>





