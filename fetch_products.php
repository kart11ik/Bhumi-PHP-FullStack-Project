<?php
include 'dbconnection.php';

$category_id = $_POST['category_id'] ?? 'all';

// Build the query based on the selected category
if ($category_id === 'all') {
    $query = "SELECT * FROM products";
} else {
    $query = "SELECT * FROM products WHERE category_id = " . intval($category_id);
}

$result = mysqli_query($conn, $query);

// Generate filtered products
while ($product = mysqli_fetch_assoc($result)) { ?>
    <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="product">
            <a href="product-single.php?id=<?= $product['id']; ?>" class="img-prod">
                <img class="img-fluid" src="uploads/<?= htmlspecialchars($product['image']); ?>" 
                     alt="<?= htmlspecialchars($product['name']); ?>">
                <div class="overlay"></div>
            </a>
            <div class="text py-3 pb-4 px-3 text-center">
                <h3><a href="product-single.php?id=<?= $product['id']; ?>"><?= htmlspecialchars($product['name']); ?></a></h3>
                <p><?= htmlspecialchars($product['description']); ?></p>
                <div class="d-flex">
                    <div class="pricing">
                        <p class="price"><span>$<?= number_format($product['price'], 2); ?></span></p>
                    </div>
                </div>
                <div class="bottom-area d-flex px-3">
                    <div class="m-auto d-flex">
                        <a href="product-single.php?id=<?= $product['id']; ?>" 
                           class="buy-now d-flex justify-content-center align-items-center mx-1">
                            <span><i class="ion-ios-cart"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
