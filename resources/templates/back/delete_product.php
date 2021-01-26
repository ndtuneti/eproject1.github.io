<?php require_once("../../../resources/config.php"); ?>

<?php
    if(isset($_GET['id'])){
        $query_delete = query("DELETE FROM `products` WHERE product_id = ". escape_string($_GET['id']) . "");
        confirm($query_delete);
        
        redirect("../../../public/admin/view_product.php");
     
    }
    
?>