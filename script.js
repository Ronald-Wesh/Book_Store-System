let cart = {};
let cartTotal = 0;

function addToCart(id, title, price) {
    if (cart[id]) {
        cart[id].quantity++;
    } else {
        cart[id] = {
            title: title,
            price: price,
            quantity: 1
        };
    }
    updateCartDisplay();
}

function updateCartDisplay() {
    const cartItemsDiv = document.getElementById('cart-items');
    const cartTotalSpan = document.getElementById('cart-total');
    const checkoutButton = document.getElementById('checkout-button');

    cartItemsDiv.innerHTML = ''; // Clear current cart display
    cartTotal = 0;

    if (Object.keys(cart).length === 0) {
        cartItemsDiv.innerHTML = '<p>Your cart is empty.</p>';
        checkoutButton.disabled = true;
    } else {
        for (const id in cart) {
            const item = cart[id];
            const itemTotal = item.price * item.quantity;
            cartTotal += itemTotal;

            const itemDiv = document.createElement('div');
            itemDiv.innerHTML = `
                <span>${item.title} x ${item.quantity}</span>
                <span>$${itemTotal.toFixed(2)}</span>
            `;
            cartItemsDiv.appendChild(itemDiv);
        }
        checkoutButton.disabled = false;
    }

    cartTotalSpan.textContent = cartTotal.toFixed(2);
}

function checkout() {
    if (confirm('Proceed to checkout?')) {
        alert('Thank you for your purchase! (This is a simplified checkout)');
        cart = {}; // Clear cart after "checkout"
        updateCartDisplay();
        // In a real system, you'd send this data to the server to process the order
        // and update stock levels in the database.
    }
}

// Initial cart display
updateCartDisplay();