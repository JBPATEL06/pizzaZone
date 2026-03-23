# FlowerZone - Project Context

## Overview
FlowerZone is a premium, minimal, and slightly futuristic flower-selling web application. It was refactored from a legacy pizza-delivery system (PizzaZone) to demonstrate a scalable, clean, and product-agnostic architecture.

## Architecture Explanation
The project follows a modular structure where concerns are separated into distinct layers:
- **Data Layer**: Managed via MySQL (`flowerzone.sql`) and defined on the client-side in `js/products.js`.
- **Business Logic Layer**: Handles cart operations, pricing, and state management in `js/cart.js` and `js/state.js`.
- **UI Rendering Layer**: Manages DOM updates and interactive elements in `js/ui.js` and `js/script.js`.

## State Structure
The application uses a single structured state object to maintain consistency:
```javascript
const state = {
    products: [], // List of available bouquets
    cart: [],     // Items currently in the floral order
    total: 0      // Total price of the current order
};
```

## Folder Structure
- `/css`: Stylesheets for different sections (premium aesthetic).
- `/images`: Product and UI assets (kept from original for layout consistency).
- `/js`: Modular JavaScript logic.
    - `state.js`: Central state initialization.
    - `products.js`: Product data definitions.
    - `cart.js`: Cart operation logic.
    - `ui.js`: DOM rendering and UI updates.
    - `script.js`: Main entry point and global event listeners.
- `/pages`: Modular PHP components (header, footer, login).
- `/flowerzone.sql`: Database schema and seed data.

## Naming Conventions
To maintain a professional and premium brand voice, the following mappings were applied:
- **Pizza** → **Bouquet**
- **Toppings** → **AddOns**
- **Size** → **Variant**
- **Menu** → **Collection**
- **Order** → **Floral Order**
- **orderPizza** → **addToCart**

## Security Layer
To protect customer data, a session-based authentication guard is implemented on all sensitive pages:
- **Pages Protected**: `cart.php`, `checkout.php`, `your_orders.php`, `delete_orders.php`.
- **Logic**: Users attempting to access these pages without a valid `$_SESSION['userData']` are automatically redirected to `pages/login.php`.
- **Data Privacy**: SQL queries for the cart and orders are now strictly filtered by the authenticated `userId`. This prevents data leakage and ensures users can only see and manage their own floral arrangements.
- **Input Integrity**: Critical calculations like order totals are now handled with numerical precision, avoiding early string formatting that could lead to logic errors.

## Rebranding Logic
The transition focused on high-end floral terminology. Instead of "Tandoori Paneer", we now offer "Orchid Elegance". Descriptions have been updated to reflect a luxury shopping experience while keeping the original layout and image assets for structural integrity.

## Design Aesthetic
The application features a **Premium, Minimal, and Slightly Futuristic** visual identity:
- **Color Palette**: Sage Green (#8a9a5b) for growth, Dusty Rose (#d4a5a5) for elegance, and a clean off-white (#faf9f6) background.
- **Typography**: The modern, highly readable **Inter** font is used throughout for a sophisticated feel.
- **Interactions**: Glassmorphism (blur effects) on the header, smooth 0.4s cubic-bezier transitions, and subtle hover animations on all interactive cards.
- **Atmosphere**: A spacious, breathable layout that prioritizes the beauty of the bouquets through high-contrast imagery and generous padding.

## Future Improvement Suggestions
1. **Dynamic Image Management**: Integrate an admin dashboard to easily upload and manage floral imagery.
2. **Enhanced Filtering**: Add categories for different occasions (e.g., Weddings, Birthdays, Anniversaries).
3. **Advanced Personalization**: Allow customers to include custom gift messages and choose specific delivery time slots.
4. **Integration with Payment Gateways**: Implement formal checkout flows with Stripe or PayPal.
