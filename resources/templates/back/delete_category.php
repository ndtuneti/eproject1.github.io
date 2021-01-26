<?php require_once("../../../resources/config.php"); ?>

<?php
    if(isset($_GET['id'])){
        $query_delete = query("DELETE FROM `categories` WHERE cat_id = ". escape_string($_GET['id']) . "");
        confirm($query_delete);
        
        redirect("../../../public/admin/categories.php");
    }
    
?>