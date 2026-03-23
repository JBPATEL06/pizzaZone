/**
 * FlowerZone UI Rendering
 * Handles DOM updates, component rendering, and event binding.
 */

import state from './state.js';
import products from './products.js';
import { addToCart, removeFromCart } from './cart.js';

export const renderProducts = (containerId) => {
    const container = document.getElementById(containerId);
    if (!container) return;

    container.innerHTML = products.map(product => `
        <div class="box">
            <img src="images/${product.image}" alt="${product.name}">
            <h3>${product.name}</h3>
            <p>${product.description}</p>
            <div class="price">₹${product.price}/-</div>
            <div class="variant">Variant: ${product.variant}</div>
            <button class="btn" onclick="app.handleAddToCart(${product.id})">Add to Collection</button>
        </div>
    `).join('');
};

export const renderCart = (containerId) => {
    const container = document.getElementById(containerId);
    if (!container) return;

    if (state.cart.length === 0) {
        container.innerHTML = '<p class="empty">Your floral order is empty.</p>';
        return;
    }

    container.innerHTML = `
        <div class="cart-items">
            ${state.cart.map(item => `
                <div class="cart-item">
                    <img src="images/${item.image}" alt="${item.name}">
                    <div class="details">
                        <h4>${item.name}</h4>
                        <div class="price">₹${item.price} x ${item.quantity}</div>
                    </div>
                    <button class="remove-btn" onclick="app.handleRemoveFromCart(${item.id})">&times;</button>
                </div>
            `).join('')}
        </div>
        <div class="cart-total">
            Total: <span>₹${state.total}/-</span>
        </div>
        <a href="checkout.php" class="btn">Proceed to Checkout</a>
    `;
};

export const toggleMenu = () => {
    const navbar = document.querySelector('.header .flex .navbar');
    const menuBtn = document.querySelector('#menu-btn');
    if (navbar && menuBtn) {
        navbar.classList.toggle('active');
        menuBtn.classList.toggle('fa-times');
    }
};

export const closeUIElements = () => {
    const navbar = document.querySelector('.header .flex .navbar');
    const menuBtn = document.querySelector('#menu-btn');
    if (navbar && menuBtn) {
        navbar.classList.remove('active');
        menuBtn.classList.remove('fa-times');
    }
};
