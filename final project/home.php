<?php
# Read session start file
include('session-cart.php');

# Open database connection
require('connect_db.php');

echo '<div class="container">
        <div class="row">';

# Retrieve items from 'products' database table
$q = "SELECT * FROM products";
$r = mysqli_query($link, $q);

if (mysqli_num_rows($r) > 0) {
    # Display body section
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        echo '
        <div class="col-md-3 d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
                <img src="' . $row['item_img'] . '" class="card-img-top" alt="T-Shirt">
                <div class="card-body">
                    <h5 class="card-title text-center">' . $row['item_name'] . '</h5>
                    <p class="card-text">' . $row['item_desc'] . '</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <p class="text-center">&pound' . $row['item_price'] . '</p>
                    </li>
                    <li class="list-group-item">
                        <a class="btn btn-dark btn-lg btn-block" href="added.php?id=' . $row['item_id'] . '">Add to cart</a>
                    </li>
                </ul>
            </div>
        </div>';
    }
}

echo '  </div>
      </div>';

# Close database connection
mysqli_close($link);
?>
    