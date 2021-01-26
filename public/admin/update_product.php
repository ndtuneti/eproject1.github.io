<?php require_once("../../resources/config.php"); ?>
<?php include(TEMPLATE_BACK . DS . "header.php"); ?>
<?php update_product(); ?>

<?PHP 
    if($_SERVER["REQUEST_METHOD"] == 'GET'){
        $product_id = $_GET['id'];
        $sql = "SELECT * FROM `products` WHERE product_id = ".($_GET['id'])."";
			$query = mysqli_query($connection,$sql);
    }
?>
<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Update Product</h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce
                        sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Pages</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Update Product</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">    
            <?PHP while( $row = fetch_array($query)){ ?>
                <form id="form" data-parsley-validate="" novalidate="" method="POST" action="" enctype="multipart/form-data">

                    <div class="form-group row">
                        <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right">Product Title</label>
                        <div class="col-9 col-lg-10">
                            <input id="inputEmail2" type="text" required="" data-parsley-type="" placeholder=""
                                class="form-control" name="product_title" value="<?php echo $row['product_title'] ?>">
                        </div>
                    </div>

                    <div class="form-group row"> 
                        <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right">Product Category</label>
                        <div class="col-9 col-lg-10"> 
                            <select class="form-control" id="input-select" name="product_category_id">
                                <option >Choose Category</option>
                                <?php show_categories_in_add_product()?>
                            </select> </div>
                    </div>
                    <div class="form-group row"> 
                        <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right">Product Quantity</label>
                        <div class="col-9 col-lg-10"> <input type="number" required="" class="form-control" name="product_quantity" value="<?php echo $row['product_quantity'] ?>"> </div>
                    </div>
                    <div class="form-group row">
                         <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right">Product Price</label>
                        <div class="col-9 col-lg-10">
                            <input type="number" required="" class="form-control" name="product_price" value="<?php echo $row['product_price'] ?>"> 
                        </div>
                    </div>
                    <div class="form-group row"> 
                        <label class="col-3 col-lg-2 col-form-label text-right">Description</label>
                        <div class="col-9 col-lg-10"> 
                            <textarea required="" class="form-control" rows="7" name="product_description" value=""><?php echo $row['product_description']?></textarea>
                        </div>
                    </div>
                    <div class="row pt-2 pt-sm-5 mt-1">
                        <div class="col-sm-6 pl-0">
                            <p class="text-right"> 
                                <button type="submit" class="btn btn-space btn-primary" name="update_product">Update Product</button> 
                                <button class="btn btn-space btn-secondary">Cancel</button>
                            </p>
                        </div>
                    </div>
                </form>
            <?PHP } ?>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <?php include(TEMPLATE_BACK . DS . "footer.php"); ?>