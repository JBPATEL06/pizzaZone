/**
 * FlowerZone State Management
 * Centralized state object for the application.
 */

const state = {
    products: [],
    cart: [],
    total: 0,
    user: null, // To be populated from session/data
    isLoaded: false
};

export default state;
