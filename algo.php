<?php
include_once __DIR__ . '/view/header.php';
?>

<br><br><br>
<br><br><br>
<br>
<div class="container">
  <div class="row d-flex justify-content-center">

    <!-- Bouton chiffrement -->
    <div class="col-12 col-md-6 mb-3 d-flex align-items-center justify-content-center my-auto">
  <a href="chiffrer.php"  class="btn btn-primary col-12 col-md-6" id="btn-chiffrer">
    mono-alphabétique
  </a>
</div>


    <!-- Bouton dechiffrement -->
    <div class="col-12 col-md-6 mb-3 d-flex align-items-center justify-content-center my-auto">
      <a href="polychiffrer.php" class="btn btn-danger col-12 col-md-6"  id="btn-dechiffrer">
      poly-alphabétique
        </a> 
    </div>

  </div>
</div>
<?php
include_once __DIR__ . '/view/footer.php';
?>
