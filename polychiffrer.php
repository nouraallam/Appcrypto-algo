<?php
include_once __DIR__ . '/view/header.php';
?>

<div class="container row mt-3 ms-3 d-flex align-items-center justify-content-center">
  <div class="row col-12 col-md-6 ">
    <select class="form-control mb-2" name="" id="chiffrement">
      <option value="0" selected>Séléctionner un chiffrement</option>
      <option value="Vigenère">Vigenère</option>
      <option value="Hill">Hill</option>
      <option value="Transposition">Transposition</option>
      
    </select>
  </div>
  <div></div>

  <!-- Bloc clé -->
  <div id="cle" class="row col-12 col-md-6 mb-3">

  </div>

  <div></div>

  <!-- Boutton chiffrement -->
  <div class="row col-12 col-md-6 mb-3 d-flex align-items-center justify-content-center">
    <input type="button" class="btn btn-primary col-12 col-md-6" value="Chiffrer" id="btn-chiffrer">
  </div>

  <!-- Boutton dechiffrement -->
  <div class="row col-12 col-md-6 mb-3 d-flex align-items-center justify-content-center">
    <input type="button" class="btn btn-danger col-12 col-md-6" value="Déchiffrer" id="btn-dechiffrer">
  </div>


  <div class="row">
    <!-- Zone de texte à chiffrer -->
    <div class="container col-12 col-md-6 mb-3">
      <h6 class="text-center">Texte en clair</h6>
      <textarea class="form-control" name="txt-chiffrement" id="txt-chiffrement" cols="30" rows="10"></textarea>
    </div>
    <!-- Zone de texte à déchiffrer -->
    <div class="container col-12 col-md-6 mb-3">
      <h6 class="text-center">Texte chiffré/déchiffré</h6>
      <textarea class="form-control" name="txt-dechiffrement" id="txt-dechiffrement" cols="30" rows="10"></textarea>
    </div>
  </div>

</div>
<script src="JS/chiffrement.js"></script>
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
        if (selectedValue === "Vigenère") {
            window.location.href = "vigenére.php";
        } else if (selectedValue === "Transposition") {
            window.location.href = "transposition.php";
        } else if(selectedValue === "Hill"){
             window.location.href = "HILL.php";
        }
        // Ajoutez d'autres redirections similaires pour les autres algorithmes
    }

    // Ajouter un gestionnaire d'événements pour l'événement de changement
    document.getElementById("chiffrement").addEventListener("change", redirectToAlgorithmPage);
</script>

<body>


</body>
</html>
