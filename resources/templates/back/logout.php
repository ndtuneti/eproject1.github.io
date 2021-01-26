<?php require_once("../../../resources/config.php"); ?>
<?php
unset($_SESSION["username"]);
redirect("../../../public/index.php");
?>