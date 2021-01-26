<?php require_once("../../resources/config.php"); ?>
<?php include(TEMPLATE_BACK . DS . "header.php"); ?>
<?php
	if (!isset($_SESSION['username'])) {
			redirect('login.php');
	   }
?>
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
            <?php include(TEMPLATE_BACK . DS . "admin_content.php"); ?>           
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
 <?php include(TEMPLATE_BACK . DS . "footer.php"); ?>           