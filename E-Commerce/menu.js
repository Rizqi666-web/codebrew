const cart = document.getElementById('cart');
const cartContent = document.querySelector('.cart-content');

function isCartEmpty() {
    const cartItems = cartContent.children;
    return cartItems.length === 0;
}

function showCartOrderHeader() {
    if (isCartEmpty()) {
        cart.style.display = 'block';
    }
}

// Example: Call this function when someone adds an item to the cart
function addItemToCart(item) {
    // Add the item to the cart content
    cartContent.appendChild(item);

    // Show the cart order header if it's the first item added
    showCartOrderHeader();
}
