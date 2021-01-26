<?php require_once("../../resources/config.php"); ?>
<?php include(TEMPLATE_BACK . DS . "header.php"); ?>

<?PHP 
    if($_SERVER["REQUEST_METHOD"] == 'GET'){
        $order_id = $_GET['id'];
        $sql = "SELECT * FROM `orderdetail` WHERE order_id = ".($_GET['id'])."";
			$query = mysqli_query($connection,$sql);
    }
?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Data Tables</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce
                                sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tables</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
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
                    <!-- ============================================================== -->
                    <!-- data table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Order Tables </h5>
                              
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Orders ID</th>
                                                <th>Product ID</th>
                                                <th>Price</th>
                                                <th>Quantity</th>                                                
                                            </tr>
                                        </thead>
                                         
                                        <tbody>
                                        <?PHP while( $row = fetch_array($query)){ ?>
                                            <tr>
                                                <td>  <?php echo $row['order_id'] ?> </td>
                                                <td> <?php echo $row['product_id'] ?> </td>
                                                <td> <?php echo $row['orderdetail_price'] ?> </td>
                                                <td> <?php echo $row['orderdetail_quantity'] ?></td>                         
                                            </tr>
                                        <?PHP } ?>             
                                        </tbody>
                                      
                                        <tfoot>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end data table  -->
                    <!-- ============================================================== -->
                </div>
              
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
          <?php include(TEMPLATE_BACK . DS . "footer.php"); ?>