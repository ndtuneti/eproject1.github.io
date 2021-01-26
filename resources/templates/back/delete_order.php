<?php require_once("../../../resources/config.php"); ?>

<?php
    if(isset($_GET['id'])){
        $query_delete = query("DELETE FROM `orders` WHERE `order_id` = ". escape_string($_GET['id']) . "");
        confirm($query_delete);
        
        redirect("../../../public/admin/order.php");
     
    }
    
?>