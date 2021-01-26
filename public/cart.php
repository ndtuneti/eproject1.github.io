<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>

<?php 
	

	if(isset($_GET['action']) && $_GET['action']=="clear"){ 
		if(isset($_SESSION[$cart_key]))
		{ 
			unset($_SESSION[$cart_key]);
		}

	}	

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // extract data
        $ids = $_POST['ids'];
        $amounts = $_POST['amounts'];
        $arr = $_SESSION[$cart_key];
        for($i = 0; $i < count($ids); $i++) {

            for($j = 0; $j < count($arr); $j++) {
                

                if($ids[$i] == $arr[$j]["product_id"]) {
                //     echo $ids[$i] . ' ';
                // echo $arr[$j]["Id"] . '<br/>';

                    // $existing = $arr[$j];
                    $arr[$j]['Amount'] = $amounts[$i];
                    break;
                }
            }

            // if($existing != null) {
            //     $existing['Amount'] = $amounts[$i];
            //     print_r($existing);
            // }
        }

        // set new value
        $_SESSION[$cart_key] = $arr;
    }
?>


<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>
<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Cart</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Sublime project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="styles/cart.css">
</head>

<body>

	<div class="super_container">

		<!-- Header -->



		<!-- Home -->

		<div class="home">
			<div class="home_container">
				<div class="home_background" style="background-image:url(images/cart.jpg)"></div>
				<div class="home_content_container">
					<div class="container">
						<div class="row">
							<div class="col">
								<div class="home_content">
									<div class="breadcrumbs">
										<ul>
											<li><a href="index.php">Home</a></li>
											<li><a href="categories1.php">Categories</a></li>
											<li>Shopping Cart</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<!-- Cart Info -->

		<div class="cart_info">
			<div class="container">
				<div class="row">
					<div class="col">
						<!-- Column Titles -->
						<div class="cart_info_columns clearfix">
							<div class="cart_info_col cart_info_col_product">Sản phẩm</div>
							<div class="cart_info_col cart_info_col_price">Giá</div>
							<div class="cart_info_col cart_info_col_quantity">Số lượng</div>
							<div class="cart_info_col cart_info_col_total">Tổng giá</div>
						</div>
					</div>
				</div>
				<form action="" method="POST">
				<div class="row cart_items_row">

					<div class="col">
						<?PHP 
					$totalprice = 0; 
					$finaltotal = 0;
					$subtotal = 0;
					foreach ($_SESSION[$cart_key] as $value) { 
						$totalprice = $value['product_price']*$value['Amount'];
						$subtotal +=$totalprice ; 
							?>
						<!-- Cart Item -->
						<div
							class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
							<!-- Name -->
							<div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
								<div class="cart_item_image">
									<div><img src="<?php echo $value['product_image']?>" alt="">
									</div>
								</div>
								<div class="cart_item_name_container">
									<div class="cart_item_name"><a href="#"><?php echo $value['product_title']?></a>
									</div>
									<!-- <div class="cart_item_edit"><a href="#">Edit Product</a></div> -->
								</div>
							</div>
							<!-- Price -->
							<div class="cart_item_price" id="cartItemPrice<?php echo $value['product_id']?>">
								$<?php echo $value['product_price']?></div>
							<!-- Quantity -->
							<div class="cart_item_quantity">
								<div class="product_quantity_container">
									<div class="product_quantity clearfix">
										<span>Qty</span>
										<input name="amounts[]" value="<?php echo $value['Amount']; ?>">
										<input name="ids[]" value="<?php echo $value['product_id']; ?>" type="hidden">
										<!-- <div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control">
												<a href="cart.php?id=<?php echo $value['product_id']?>&action=increase"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
											</div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control">
												<a href="cart.php?id=<?php echo $value['product_id']?>&action=decrease"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
											</div>
										</div> -->
									</div>
								</div>
							</div>

							<!-- Total -->
							<div class="cart_item_total">$
								<?php 
							if(isset($_SESSION[$cart_key])){
								echo $totalprice;
							} else
							echo 0;
						?>
							</div>

						</div>

						<?php } ?>
					</div>
				</div>


				<div class="row row_cart_buttons">

					<div class="col">
						<div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
							
							<div class="button continue_shopping_button">
								<a href="categories1.php">Tiếp tục</a>
							</div>
							<div class="cart_buttons_right ml-lg-auto row">
								<div class="button clear_cart_button">
									<a href="cart.php?action=clear">Xóa </a>
								</div>
								<div class="button update_cart_button">
									<button type="submit" style="width: 100%;height: 100%; margin: 0;" class="btn ">Cập nhật</button>
								</div>
								
							</div>
						</div>
					</div>
				</div>
				</form>
				<div class="row row_extra">
					<div class="col-lg-4">

						<!-- Delivery -->
						<div class="delivery">
							<div class="section_title">Chọn phương thức</div>
							<!-- <div class="section_subtitle">Select the one you want</div> -->
							<div class="delivery_options">
								<!-- <label class="delivery_option clearfix">Next day delivery
								<input type="radio" name="radio">
								<span class="checkmark"></span>
								<span class="delivery_price">$4.99</span>
							</label>
							<label class="delivery_option clearfix">Standard delivery
								<input type="radio" name="radio">
								<span class="checkmark"></span>
								<span class="delivery_price">$1.99</span>
							</label> -->
								<label class="delivery_option clearfix">Personal pickup
									<input type="radio" checked="checked" name="radio">
									<span class="checkmark"></span>
									<span class="delivery_price">Free</span>
								</label>
							</div>
						</div>

						<!-- Coupon Code -->
						<!-- <div class="coupon">
						<div class="section_title">Coupon code</div>
						<div class="section_subtitle">Enter your coupon code</div>
						<div class="coupon_form_container">
							<form action="#" id="coupon_form" class="coupon_form">
								<input type="text" class="coupon_input" required="required">
								<button class="button coupon_button"><span>Apply</span></button>
							</form>
						</div>
					</div> -->
					</div>

					<div class="col-lg-6 offset-lg-2">
						<div class="cart_total">
							<div class="section_title">Tổng giỏ hàng</div>
							<div class="section_subtitle">Thông tin cuối cùng</div>
							<div class="cart_total_container">
								<ul>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_total_title">Giá </div>
										<div class="cart_total_value ml-auto">
											$<?php 
											if(isset($_SESSION[$cart_key]) > 0){
												echo $subtotal;
											} else
											echo 0;
											?>
										</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_total_title">Phí giao hàng</div>
										<div class="cart_total_value ml-auto">Free</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_total_title">Tổng</div>
										<div class="cart_total_value ml-auto">
											$<?php 
											if(isset($_SESSION[$cart_key]) > 0){
												echo $subtotal;
											} else
											echo 0;
											?>
										</div>
									</li>
								</ul>
							</div>
							<div class="button checkout_button"><a href="checkout.php">Thanh toán</a></div>
						</div>
					</div>
				</div>
			</div>

		</div>

		<!-- Footer -->

		<div class="footer_overlay"></div>

	</div>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="styles/bootstrap4/popper.js"></script>
	<script src="styles/bootstrap4/bootstrap.min.js"></script>
	<script src="plugins/greensock/TweenMax.min.js"></script>
	<script src="plugins/greensock/TimelineMax.min.js"></script>
	<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
	<script src="plugins/greensock/animation.gsap.min.js"></script>
	<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="plugins/parallax-js-master/parallax.min.js"></script>
	<script src="js/cart.js"></script>
	<!-- <script>
		function onQuantityUpdated(e, id) {
			console.log(e)
			let value = parseFloat(e.target.value);
			let price = $("#cartItemPrice" + id).html();
			console.log(e.target.value, value, price)
			let newTotal = value * parseFloat(price.replace('$', ''));
			$("#cartItemTotal" + id).html('$' + newTotal);
		}
	</script> -->
</body>

</html>