<?php 
    include "../head.php"; 
    include "../navbar.php";
?>

<h2 class="indigo-text center-align">Cerrar sesión</h2>

<?php 
  require("../controllers/userController.php");
  logout();
?>

<?php include "../footer.php"; ?>