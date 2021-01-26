<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>

<?php 
	if($_SERVER["REQUEST_METHOD"] == 'POST') {
		if(isset($_SESSION[$cart_key])){
			$name = $_POST['name'];
			$address = $_POST['address'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$totalprice = 0; 
			$order_id = time();
			$datecreate = date('Y-m-d H:i:s');
			$status = "Waiting";
			foreach ($_SESSION[$cart_key] as $value) { 
				$id = $value['product_id'];
				$price = $value['product_price'];
				$quantity = $value['Amount'];
				$totalprice += $price * $quantity;
				$sql = "INSERT INTO `orderdetail`(`product_id`, `orderdetail_quantity`, `orderdetail_price`, `order_id`) VALUES ('$id','$quantity','$price','$order_id')";
				$query = mysqli_query($connection,$sql);

			}
			$sql = "INSERT INTO `orders`(`order_id`, `datecreate`, `order_address`, `order_name`, `order_phone`, `order_email`, `total_price`, `status`) VALUES ('$order_id','$datecreate','$address','$name','$phone','$email','$totalprice','$status')";
			$query = mysqli_query($connection,$sql);
		}
	} 
			// Save cart -> order

?>



<!DOCTYPE html>
<html lang="en">

<head>
	<title>Checkout</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Sublime project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="styles/checkout.css">
	<link rel="stylesheet" type="text/css" href="styles/checkout_responsive.css">
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
											<li><a href="cart.php">Shopping Cart</a></li>
											<li>Checkout</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Checkout -->

		<div class="checkout">
			<div class="container">
				<form action="" id="checkout_form" class="checkout_form" method="POST">
					<div class="row">

						<!-- Billing Info -->
						<div class="col-lg-6">
							<div class="billing checkout_section">
								<div class="section_title">Thông tin của bạn</div>
								<div class="section_subtitle">Vui lòng nhập đầy đủ thông tin</div>
								<div class="checkout_form_container">

									<div>
										<!-- Name -->
										<label for="checkout_address">Họ tên*</label>
										<input type="text" id="name" class="checkout_input" required="required"
											name="name">
									</div>
									<div>
										<!-- Address -->
										<label for="checkout_address">Địa chỉ*</label>
										<input type="text" id="checkout_address" class="checkout_input"
											required="required" name="address">
									</div>
									<div>
										<!-- Phone no -->
										<label for="checkout_phone">Số điện thoại*</label>
										<input type="phone" id="checkout_phone" class="checkout_input"
											required="required" name="phone">
									</div>
									<div>
										<!-- Email -->
										<label for="checkout_email">Email*</label>
										<input type="phone" id="checkout_email" class="checkout_input"
											required="required" name="email">
									</div>
									<div class="checkout_extra">
										<div>
											<input type="checkbox" id="checkbox_terms" name="regular_checkbox"
												class="regular_checkbox" checked="checked">
											<label for="checkbox_terms"><img src="images/check.png" alt=""></label>
											<span class="checkbox_title">Điều khoản và điều kiện</span>
										</div>
									</div>

								</div>
							</div>
						</div>

						<!-- Order Info -->

						<div class="col-lg-6">
							<div class="order checkout_section">
								<div class="section_title">Đơn hàng của bạn</div>
								<div class="section_subtitle">Thông tin đơn hàng</div>

								<!-- Order details -->
								<div class="order_list_container">
									<div
										class="order_list_bar d-flex flex-row align-items-center justify-content-start">
										<div class="order_list_title">Sản phẩm</div>
										
										<div class="order_list_value ml-auto">Giá</div>
									</div>
									<ul>


										<ul class="order_list">
											<?PHP 
								$subtotal = 0;
								foreach ($_SESSION[$cart_key] as $value) {
								$subtotal+=$value['product_price']*$value['Amount'] 
								?>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<div class="order_list_title"><?php echo $value['product_title']?></div>
												
												<div class="order_list_value ml-auto">
													$<?php echo $value['product_price']*$value['Amount'] ?></div>
											</li>
											<?PHP } ?>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<div class="order_list_title">Phí giao hàng</div>
												<div class="order_list_value ml-auto">Free</div>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<div class="order_list_title">Tổng</div>
												<div class="order_list_value ml-auto">$<?php echo $subtotal ?></div>
											</li>
										</ul>
								</div>

								<!-- Payment Options -->
								<div class="payment">
									<div class="payment_options">
										<label class="payment_option clearfix">SHIP CODE
											<input type="radio" name="radio">
											<span class="checkmark"></span>
										</label>
									</div>
								</div>
								<!-- Order Text -->
								<div class="order_text">Đồng ý với điều khoản và điều kiện.</div>
								<div class="button order_button">
									<button type="submit" class="btn " style="width: 100%;height: 100%; margin: 0;">Đặt hàng</button>
								</div>
							</div>

						</div>
					</div>
			</div>
			</form>
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
	<script src="js/checkout.js"></script>
</body>

</html>