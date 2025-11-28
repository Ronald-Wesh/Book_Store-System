<?php
include 'config.php';

// Handle adding a book to the cart (simple example, client-side only for this basic version)
// In a real system, this would involve server-side cart management and user sessions.

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Bookstore</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Our Books</h1>
        <div id="book-list">
            <?php
            $sql = "SELECT id, title, author, price, stock FROM books";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='book-item'>";
                    echo "<h2>" . htmlspecialchars($row["title"]) . "</h2>";
                    echo "<p>Author: " . htmlspecialchars($row["author"]) . "</p>";
                    echo "<p>Price: $" . htmlspecialchars(number_format($row["price"], 2)) . "</p>";
                    echo "<p>Stock: " . htmlspecialchars($row["stock"]) . "</p>";
                    echo "<button onclick='addToCart(" . $row["id"] . ", \"" . addslashes($row["title"]) . "\", " . $row["price"] . ")' ";
                    echo ($row["stock"] > 0) ? "" : "disabled title='Out of Stock'";
                    echo ">Add to Cart</button>";
                    echo "</div>";
                }
            } else {
                echo "<p>No books found.</p>";
            }
            $conn->close();
            ?>
        </div>

        <hr>

        <h2>Your Cart</h2>
        <div id="cart-items">
            <p>Your cart is empty.</p>
        </div>
        <p>Total: $<span id="cart-total">0.00</span></p>
        <button id="checkout-button" onclick="checkout()" disabled>Checkout</button>
    </div>

    <script src="script.js"></script>
</body>
</html>