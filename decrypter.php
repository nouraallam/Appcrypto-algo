<?php
include_once __DIR__ . '/view/header.php';
?>

<div class="container row mt-3 ms-3 d-flex align-items-center justify-content-center">
    <div class="row col-12 col-md-6 ">
        <select class="form-control mb-2" name="" id="chiffrement">
            <option value="0" selected>Séléctionner un chiffrement</option>
            <option value="RSA">RSA</option>
            <option value="RC4">RC4</option>
            <option value="AES">AES</option>
             
        </select>
    </div>
    <div></div>

    <!-- Bloc clé -->
    <div id="cle" class="mb-3">
    
    </div>
    <div></div>

    <div class="row">
        <!-- Zone de texte à chiffrer -->
        <div class="container col-12 col-md-6 mb-3">
            <h6 class="text-center">Texte en clair</h6>
            <textarea class="form-control" name="txt-chiffrement" id="txt-chiffrement" cols="30" rows="10"></textarea>
        </div>
        <!-- Zone de texte à déchiffrer -->
        <div class="container col-12 col-md-6 mb-3">
            <h6 class="text-center">Texte chiffré</h6>
            <textarea class="form-control" name="txt-dechiffrement" id="txt-dechiffrement" cols="30" rows="10"></textarea>
        </div>
    </div>
    <div class="row mt-3">
    <div class="row col-12 col-md-6 mb-3 d-flex align-items-center justify-content-center">
        <input type="button" class="btn btn-warning col-12 col-md-6" value="crypter" id="btn-decrypter">
    </div>
    <div class="row col-12 col-md-6 mb-3 d-flex align-items-center justify-content-center">
        <input type="button" class="btn btn-warning col-12 col-md-6" value="Décrypter" id="btn-decrypter">
    </div>

    </div>
</div>

<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="exampleModalToggleLabel"> <!-- titre d'erreur ici avec JS --> </h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Msg d'erreur ici avec JS -->
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Fermer</button>
            </div>
        </div>
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
        if (selectedValue === "RSA") {
            window.location.href = "RSA.php";
        } 
        else if (selectedValue === "RC4") {
            window.location.href = "RivestCipher4.php";
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





