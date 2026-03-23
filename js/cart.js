/**
 * FlowerZone Cart Logic
 * Product-agnostic cart operations and business logic.
 */

import state from './state.js';

export const addToCart = (product, quantity = 1) => {
    if (quantity <= 0) return;

    const existingItem = state.cart.find(item => item.id === product.id);
    if (existingItem) {
        existingItem.quantity += quantity;
    } else {
        state.cart.push({ ...product, quantity });
    }
    updateTotal();
};

export const removeFromCart = (productId) => {
    state.cart = state.cart.filter(item => item.id !== productId);
    updateTotal();
};

export const updateQuantity = (productId, quantity) => {
    const item = state.cart.find(item => item.id === productId);
    if (item && quantity > 0) {
        item.quantity = quantity;
        updateTotal();
    }
};

export const updateTotal = () => {
    state.total = state.cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
};

export const clearCart = () => {
    state.cart = [];
    state.total = 0;
};
