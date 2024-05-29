<?php 
# DISPLAY SHOPPING CART PAGE

# Set page title and display header section
include('session-cart.php');

# Check if form has been submitted for update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # Update changed quantity field values
    foreach ($_POST['qty'] as $item_id => $item_qty) {
        # Ensure values are integers
        $id = (int) $item_id;
        $qty = (int) $item_qty;

        # Change quantity or delete if zero
        if ($qty == 0) {
            unset($_SESSION['cart'][$id]);
        } elseif ($qty > 0) {
            $_SESSION['cart'][$id]['quantity'] = $qty;
        }
    }
}

# Initialize grand total variable
$total = 0;

# Display the cart if not empty
if (!empty($_SESSION['cart'])) {
    # Connect to the database
    require('connect_db.php');

    # Retrieve all items in the cart from the 'products' database table
    $q = "SELECT * FROM products WHERE item_id IN (";
    foreach ($_SESSION['cart'] as $id => $value) {
        $q .= $id . ',';
    }
    $q = substr($q, 0, -1) . ') ORDER BY item_id ASC';
    $r = mysqli_query($link, $q);

    # Display body section with form and table
    echo '
    <section class="h-100 h-custom" style="background-color: #d3d3d3;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                        </div>
                                        <hr class="my-4">
                                        <form action="cart.php" method="post">
    ';

    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        $subtotal = $_SESSION['cart'][$row['item_id']]['quantity'] * $_SESSION['cart'][$row['item_id']]['price'];
        $total += $subtotal;

        echo '
        <div class="row mb-4 d-flex justify-content-between align-items-center">
            <div class="col-md-2 col-lg-2 col-xl-2">
                <img src="' . $row['item_img'] . '" class="img-fluid rounded-3" alt="' . $row['item_name'] . '">
            </div>
            <div class="col-md-3 col-lg-3 col-xl-3">
                <h6 class="text-muted">Category</h6>
                <h6 class="text-black mb-0">' . $row['item_name'] . '</h6>
            </div>
            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                <input type="number" min="0" class="form-control form-control-sm" name="qty[' . $row['item_id'] . ']" value="' . $_SESSION['cart'][$row['item_id']]['quantity'] . '">
            </div>
            <div class="col-md-3 col-lg-2 col-xl-2">
                <h6 class="text-muted">@ &pound ' . number_format($row['item_price'], 2) . '</h6>
            </div>
            <div class="col-md-3 col-lg-2 col-xl-2">
                <h6 class="mb-0">&pound ' . number_format($subtotal, 2) . '</h6>
            </div>
        </div>
        ';
    }

    mysqli_close($link);

    echo '
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-grey">
                                    <div class="p-5">
                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                        <hr class="my-4">
                                        <h5 class="text-uppercase">Total price</h5>
                                        <h5>&pound ' . number_format($total, 2) . '</h5>
                                        <input type="submit" name="submit" class="btn btn-dark btn-block mt-4" value="Update Cart">
                                        <a href="checkout.php?total=' . $total . '" class="btn btn-primary btn-block mt-2">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </form>
    ';
} else {
    echo '<p>Your cart is currently empty.</p>';
}

include('footer.php');
?>