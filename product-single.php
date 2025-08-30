<?php
include 'session_check.php';
include 'dbconnection.php';

if (isset($_GET['id'])) {
	$product_id = intval($_GET['id']); // Sanitize input
	$query = "SELECT * FROM products WHERE id = $product_id";
	$result = $conn->query($query);

	if ($result->num_rows > 0) {
		$product = $result->fetch_assoc();
	} else {
		echo "<p>Product not found.</p>";
		exit();
	}
} else {
	echo "<p>Invalid product.</p>";
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>bhumi - Free Bootstrap 4 Template by Colorlib</title>
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
							<span class="text">+ 1235 2355 98</span>
						</div>
						<div class="col-md pr-4 d-flex topper align-items-center">
							<div class="icon mr-2 d-flex justify-content-center align-items-center"><span
									class="icon-paper-plane"></span></div>
							<span class="text">youremail@email.com</span>
						</div>
						<div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
							<span class="text">3-5 Business days delivery &amp; Free Returns</span>
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
					<li class="nav-item active dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">Shop</a>
						<div class="dropdown-menu" aria-labelledby="dropdown04">
							<a class="dropdown-item" href="shop.php">Shop</a>
							<a class="dropdown-item" href="wishlist.php">Wishlist</a>
							<a class="dropdown-item" href="product-single.php">Single Product</a>
							<a class="dropdown-item" href="cart.php">Cart</a>
							<a class="dropdown-item" href="checkout.php">Checkout</a>
						</div>
					</li>
					<li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
					<li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
					<li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
					<li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span
								class="icon-shopping_cart"></span>[0]</a></li>

					<li class="nav-item active dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">
							<?php echo $fullname; ?>
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdown04">
							<a class="dropdown-item" href="logout.php">Logout</a>
						</div>
					</li>
				</ul>
			</div>
		</div>

	</nav>
	<!-- END nav -->


	<?php

include 'dbconnection.php';

if (!isset($_SESSION['user_id'])) {
    echo "<p>Please log in to add products to your cart.</p>";
    exit();
}

$user_id = $_SESSION['user_id']; // Get logged-in user's ID

if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']); // Sanitize input
    $query = "SELECT * FROM products WHERE id = $product_id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "<p>Product not found.</p>";
        exit();
    }
} else {
    echo "<p>Invalid product.</p>";
    exit();
}

// Handle add to cart request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])) {
    $quantity = intval($_POST['quantity']);
    if ($quantity < 1) {
        $quantity = 1;
    }

    // Calculate total price
    $total_price = $product['price'] * $quantity;

    // Check if product already exists in cart
    $checkCart = "SELECT * FROM cartdb WHERE user_id = $user_id AND product_id = $product_id";
    $cartResult = $conn->query($checkCart);

    if ($cartResult->num_rows > 0) {
        // Update quantity and total price if product already in cart
        $updateCart = "UPDATE cartdb SET quantity = quantity + $quantity, total_price = price * (quantity + $quantity) 
                       WHERE user_id = $user_id AND product_id = $product_id";
        $conn->query($updateCart);
    } else {
        // Insert new cart entry with total_price
        $insertCart = "INSERT INTO cartdb (user_id, product_id, name, image, price, quantity, total_price) 
                       VALUES ($user_id, $product_id, '{$product['name']}', '{$product['image']}', {$product['price']}, $quantity, $total_price)";
        $conn->query($insertCart);
    }

    echo "<script>alert('Product added to cart!'); window.location.href='cart.php';</script>";
    exit();
}
?>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <!-- Product Image -->
            <div class="col-lg-6 mb-5 ftco-animate">
                <a href="uploads/<?php echo $product['image']; ?>" class="image-popup">
                    <img src="uploads/<?php echo $product['image']; ?>" class="img-fluid"
                        alt="<?php echo htmlspecialchars($product['name']); ?>">
                </a>
            </div>

            <!-- Product Details -->
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3><?php echo htmlspecialchars($product['name']); ?></h3>

                <p class="price"><span>Rs <span id="total-price"><?php echo number_format($product['price'], 2); ?></span></span></p>

                <p><?php echo htmlspecialchars($product['description']); ?></p>

				<p>The quantitiy is shown in kg</p>

                <form method="POST">
                    <div class="row mt-4">
                        <div class="input-group col-md-6 d-flex mb-3">
                            <span class="input-group-btn mr-2">
                                <button type="button" id="decrease" class="btn"><i class="ion-ios-remove"></i></button>
                            </span>
                            <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100" readonly>
                            <span class="input-group-btn ml-2">
                                <button type="button" id="increase" class="btn"><i class="ion-ios-add"></i></button>
                            </span>
                        </div>
                    </div>

                    <button type="submit" name="add_to_cart" class="btn btn-green">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let quantityInput = document.getElementById("quantity");
        let totalPriceElement = document.getElementById("total-price");
        let productPrice = <?php echo $product['price']; ?>; // Base price
        let quantity = 1;

        function updateTotalPrice() {
            let totalPrice = (productPrice * quantity).toFixed(2);
            totalPriceElement.textContent = totalPrice;
        }

        document.getElementById("increase").addEventListener("click", function () {
            if (quantity < 100) {
                quantity++;
                quantityInput.value = quantity;
                updateTotalPrice();
            }
        });

        document.getElementById("decrease").addEventListener("click", function () {
            if (quantity > 1) {
                quantity--;
                quantityInput.value = quantity;
                updateTotalPrice();
            }
        });

        updateTotalPrice();
    });
</script>






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

	<script>
		$(document).ready(function () {

			var quantitiy = 0;
			$('.quantity-right-plus').click(function (e) {

				// Stop acting like a button
				e.preventDefault();
				// Get the field name
				var quantity = parseInt($('#quantity').val());

				// If is not undefined

				$('#quantity').val(quantity + 1);


				// Increment

			});

			$('.quantity-left-minus').click(function (e) {
				// Stop acting like a button
				e.preventDefault();
				// Get the field name
				var quantity = parseInt($('#quantity').val());

				// If is not undefined

				// Increment
				if (quantity > 0) {
					$('#quantity').val(quantity - 1);
				}
			});

		});
	</script>

</body>

</html>