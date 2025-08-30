<?php
include 'dbconnection.php';
session_start();
if (!isset($_SESSION['user_id'])) {
	header("Location: login.php");
	exit();
}
$fullname = $_SESSION['fullname']; // Get the user's full name

$sql = "SELECT * FROM categories ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

$left_category = $categories[0] ?? null;
$right_category = $categories[1] ?? null;
$last_category = $categories[2] ?? null;


$query = "SELECT name, image, price FROM products WHERE isFeatured = 1 LIMIT 4";
$result = $conn->query($query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>bhumi </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
		rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/aos.css">

	<link rel="stylesheet" href="css/ionicons.min.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">


	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body class="goto-here">
	<div class="py-1 bg-primary">
		<div class="container">
			<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
				<div class="col-lg-12 d-block">
					<div class="row d-flex">
						<div class="col-md pr-4 d-flex topper align-items-center">
							<div class="icon mr-2 d-flex justify-content-center align-items-center"><span
									class="icon-phone2"></span></div>
							<span class="text">+91 7356718496</span>
						</div>
						<div class="col-md pr-4 d-flex topper align-items-center">
							<div class="icon mr-2 d-flex justify-content-center align-items-center"><span
									class="icon-paper-plane"></span></div>
							<span class="text">bumi@email.com</span>
						</div>
						<div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
							<span class="text">1 day delivery &amp; Free Returns</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.php"><img src="images/BHUMI (2).png" alt="img"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
				aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="shop.php" class="nav-link">Products</a></li>
					
					<li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span
								class="icon-shopping_cart"></span>Cart</a></li>

								<li class="nav-item"><a href="order_success.php" class="nav-link">My orders</a></li>

								<li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
					
					<li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>

					<li class="nav-item active dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">
							<?= htmlspecialchars($fullname); ?> <!-- Display user's name -->
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdown04">
							<a class="dropdown-item" href="logout.php">Logout</a> <!-- Logout link -->
						</div>
						
					</li>

				</ul>
			</div>
		</div>

	</nav>
	<!-- END nav -->

	<section id="home-section" class="hero">
		<div class="home-slider owl-carousel">
			<div class="slider-item" style="background-image: url(images/bg_1.jpg);">
				<div class="overlay"></div>
				<div class="container">
					<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

						<div class="col-md-12 ftco-animate text-center">
							<h1 class="mb-2">We serve Fresh Vegestables &amp; Fruits</h1>
							<h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
							<p><a href="shop.php" class="btn btn-primary">View Details</a></p>
						</div>

					</div>
				</div>
			</div>

			<div class="slider-item" style="background-image: url(images/bg_2.jpg);">
				<div class="overlay"></div>
				<div class="container">
					<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

						<div class="col-sm-12 ftco-animate text-center">
							<h1 class="mb-2">100% Fresh &amp; Organic Foods</h1>
							<h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
							<p><a href="shop.php" class="btn btn-primary">View Details</a></p>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section">
		<div class="container">
			<div class="row no-gutters ftco-services">
				<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services mb-md-0 mb-4">
						<div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
							<span class="flaticon-shipped"></span>
						</div>
						<div class="media-body">
							<h3 class="heading">Free Shipping</h3>
							<span>On order over Rs 300/-</span>
						</div>
					</div>
				</div>
				<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services mb-md-0 mb-4">
						<div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
							<span class="flaticon-diet"></span>
						</div>
						<div class="media-body">
							<h3 class="heading">Always Fresh</h3>
							<span>Product well package</span>
						</div>
					</div>
				</div>
				<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services mb-md-0 mb-4">
						<div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
							<span class="flaticon-award"></span>
						</div>
						<div class="media-body">
							<h3 class="heading">Superior Quality</h3>
							<span>Quality Products</span>
						</div>
					</div>
				</div>
				<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services mb-md-0 mb-4">
						<div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
							<span class="flaticon-customer-service"></span>
						</div>
						<div class="media-body">
							<h3 class="heading">Support</h3>
							<span>24/7 Support</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section ftco-category ftco-no-pt">
		<div class="container">
			<h2 class="mb-4">Our categories</h2>


			<div class="row">

				<!-- Left Side: One Category -->
				<div class="col-md-4">
					<?php if ($left_category): ?>
						<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end"
							style="background-image: url(uploads/<?php echo htmlspecialchars($left_category['image']); ?>);">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a
										href="product_category_filter.php?category_id=<?php echo $left_category['id']; ?>">
										<?php echo htmlspecialchars($left_category['category_name']); ?>
									</a></h2>

							</div>
						</div>
					<?php else: ?>
						<p>No category found.</p>
					<?php endif; ?>
				</div>

				<br>


				<!-- Right Side: Another Category -->
				<div class="col-md-4">
					<?php if ($right_category): ?>
						<div class="category-wrap ftco-animate img d-flex align-items-end"
							style="background-image: url(uploads/<?php echo htmlspecialchars($right_category['image']); ?>);">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a
										href="product_category_filter.php?category_id=<?php echo $left_category['id']; ?>">
										<?php echo htmlspecialchars($right_category['category_name']); ?>
									</a></h2>

							</div>
						</div>
					<?php else: ?>
						<p>No category found.</p>
					<?php endif; ?>
				</div>

				<div class="col-md-4">
					<?php if ($right_category): ?>
						<div class="category-wrap ftco-animate img d-flex align-items-end"
							style="background-image: url(uploads/<?php echo htmlspecialchars($last_category['image']); ?>);">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a
										href="product_category_filter.php?category_id=<?php echo $left_category['id']; ?>">
										<?php echo htmlspecialchars($last_category['category_name']); ?>
									</a></h2>

							</div>
						</div>
					<?php else: ?>
						<p>No category found.</p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center mb-3 pb-3">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<span class="subheading">Featured Products</span>
					<h2 class="mb-4">Our Products</h2>
					<p>Bhumi Kudumbashree Products offer fresh, organic vegetables and fruits grown by local women
						farmers, ensuring quality, sustainability, and chemical-free produce.</p>

				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<?php
				include 'dbconnection.php';

				// Fetch only 4 featured products
				$query = "SELECT id, name, image, price FROM products WHERE isFeatured = 1 LIMIT 4";
				$result = $conn->query($query);

				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						?>
						<div class="col-md-6 col-lg-3 ftco-animate">
							<div class="product">
								<a href="product-single.php?id=<?php echo $row['id']; ?>" class="img-prod">
									<img class="img-fluid" src="uploads/<?php echo $row['image']; ?>"
										alt="<?php echo $row['name']; ?>">
									<div class="overlay"></div>
								</a>
								<div class="text py-3 pb-4 px-3 text-center">
									<h3><a
											href="product-single.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a>
									</h3>
									<div class="d-flex">
										<div class="pricing">
											<p class="price"><span>Rs <?php echo number_format($row['price'], 2); ?></span></p>
										</div>
									</div>
									<div class="bottom-area d-flex px-3">
										<div class="m-auto d-flex">

											<a href="product-single.php?id=<?php echo $row['id']; ?>"
												class="buy-now d-flex justify-content-center align-items-center mx-1">
												<span><i class="ion-ios-cart"></i></span>
											</a>

										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
					}
				} else {
					echo "<p class='text-center'>No featured products available.</p>";
				}
				?>
			</div> <!-- Closing row div -->


		</div>
	</section>

	<?php
	$product_query = "SELECT id, name, image, price, description FROM products ORDER BY created_at ASC LIMIT 1";
	$product_result = mysqli_query($conn, $product_query);
	$product = mysqli_fetch_assoc($product_result);
	
	// Check if a product exists
	if ($product) {
		$product_name = $product['name'];
		$product_price = number_format($product['price'], 2);
		$product_desc = $product['description'];
		$product_image = !empty($product['image']) ? "images/{$product['image']}" : "images/default.jpg";
	} else {
		// Default values if no product is found
		$product_name = "No Product Available";
		$product_price = "0.00";
		$product_desc = "No Description Available";
		$product_image = "images/default.jpg";
	}
	?>

<section class="ftco-section img" style="background-image: url('<?= $product_image ?>');">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
                <span class="subheading">Best Price For You</span>
                <h2 class="mb-4">Deal of the Day</h2>
                <p><?= $product_desc ?></p>
                <h3><a href="#"><?= $product_name ?></a></h3>
                <span class="price"><a href="#">Now ₹<?= $product_price ?> only</a></span>
                <div id="timer" class="d-flex mt-5">
                    <div class="time pl-3" id="hours"></div>
                    <div class="time pl-3" id="minutes"></div>
                    <div class="time pl-3" id="seconds"></div>
                </div>
            </div>
        </div>
    </div>
</section>



	<hr>



	<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
		<div class="container py-4">
			<div class="row d-flex justify-content-center py-5">
				<div class="col-md-6">
					<h2 style="font-size: 22px;" class="mb-0">How is our service?</h2>
					<span>Visit to get updates about our latest shops and special offers</span>
				</div>
				<div class="col-md-6 d-flex align-items-center">

				</div>
			</div>
		</div>
	</section>
	<footer class="ftco-footer ftco-section">
		<div class="container">
			<div class="row">
				<div class="mouse">
					<a href="#" class="mouse-icon">
						<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
					</a>
				</div>
			</div>
			<div class="row mb-5">
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Bhumi</h2>
						<p>Bhumi is an organic vegetable and fruit buying website by Bhumi Kudumbasree, located in Kannur, Managattuparamba (PIN: 670331).</p>
						<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
							<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
				</div>
				<div class="col-md-4">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Help</h2>
						<div class="d-flex">
							<ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
								<li><a href="#" class="py-2 d-block">Shipping Information</a></li>
								<li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
								<li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
								<li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
							</ul>
							<ul class="list-unstyled">
								<li><a href="#" class="py-2 d-block">FAQs</a></li>
								<li><a href="contact.php" class="py-2 d-block">Contact</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Have a Questions?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon icon-map-marker"></span><span class="text">Bhumi Kudumbasree, Managattuparamba, Kannur, PIN: 670331</span></li>
								<li><a href="#"><span class="icon icon-phone"></span><span class="text">+91 9876543210</span></a></li>
								<li><a href="#"><span class="icon icon-envelope"></span><span class="text">support@bhumi.com</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<p>
						Copyright &copy;
						<script>document.write(new Date().getFullYear());</script> All rights reserved
					</p>
				</div>
			</div>
		</div>
	</footer>


	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
				stroke="#F96D00" />
		</svg></div>


	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/aos.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>

</body>

</html>