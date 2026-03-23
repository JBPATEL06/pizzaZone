/**
 * FlowerZone Main Script
 * Orchestrates modules and initializes the application.
 */

import state from './state.js';
import products from './products.js';
import * as cartLogic from './cart.js';
import * as uiLayer from './ui.js';

// Global application object for access from HTML (legacy compatibility)
window.app = {
    handleAddToCart: (productId) => {
        const product = products.find(p => p.id === productId);
        if (product) {
            cartLogic.addToCart(product);
            uiLayer.renderCart('cart-container');
            showToast(`${product.name} added to collection!`);
        }
    },
    handleRemoveFromCart: (productId) => {
        cartLogic.removeFromCart(productId);
        uiLayer.renderCart('cart-container');
    }
};

const showToast = (message) => {
    const toast = document.createElement('div');
    toast.className = 'toast';
    toast.textContent = message;
    document.body.appendChild(toast);
    setTimeout(() => toast.classList.add('show'), 10);
    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => toast.remove(), 300);
    }, 3000);
};

// Initialize Application
document.addEventListener('DOMContentLoaded', () => {
    state.products = products;
    
    // UI Events
    const menuBtn = document.querySelector('#menu-btn');
    if (menuBtn) {
        menuBtn.onclick = uiLayer.toggleMenu;
    }

    window.onscroll = uiLayer.closeUIElements;

    // Initial Renders
    if (document.getElementById('product-container')) {
        uiLayer.renderProducts('product-container');
    }

    if (document.getElementById('cart-container')) {
        uiLayer.renderCart('cart-container');
    }
});

// Accordion Logic (FAQ)
const accordion = document.querySelectorAll('.faq .accordion-container .accordion');
accordion.forEach(acco => {
    acco.onclick = () => {
        accordion.forEach(remove => remove.classList.remove('active'));
        acco.classList.add('active');
    };
});