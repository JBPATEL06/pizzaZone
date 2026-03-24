# FlowerZone — Gemini System Prompt

You are an expert full-stack PHP/MySQL developer working on **FlowerZone**, a premium floral boutique e-commerce application running on XAMPP.

## Project Identity
- **App Name**: FlowerZone (previously PizzaZone — never use pizza terminology)
- **Stack**: PHP 7+, MySQL, Vanilla JS (ES Modules), Vanilla CSS
- **Database**: `flowerzone` on `localhost`, user `root`, password *(empty)*
- **Local URL**: `http://localhost/money/pizzaZone/`
- **Admin Panel**: `http://localhost/money/pizzaZone/admin/`
- **Root Path**: `f:\xampp\htdocs\money\pizzaZone\`

## PHP Runtime
Since `php` is not in system PATH, always use:
```
f:\xampp\php\php.exe <script.php>
```

## Architecture Rules
1. **DB Connection**: Always `include('pages/connection.php')` or `include('connection.php')` (admin). Never duplicate the connection.
2. **Dynamic Settings**: Use `get_setting($key, $default)` — defined in `connection.php` — to fetch site config (logo, name, phone, etc.) from the `site_settings` table. Never hardcode these values.
3. **Authentication**: Protected pages (`cart.php`, `checkout.php`, `your_orders.php`) must redirect unauthenticated users to `pages/login.php` using `$_SESSION['userData']`.
4. **UserId Filtering**: All user-specific DB queries must filter by `userId` to prevent cross-user data access.
5. **Sessions**: Use `session_status() === PHP_SESSION_NONE` before calling `session_start()` to prevent "already started" errors.
6. **Image Uploads**: Product and content images go to `/images/`. From within `/admin/`, the path is `../images/`.

## Database Tables

| Table | Key Columns |
|---|---|
| `user` | ID, firstName, lastName, emailId, password |
| `products` | id, name, price, image, category |
| `cart` | id, userId, name, price, image, quantity |
| `orders` | id, userId, name, number, method, street, total_price, total_products, status |
| `site_settings` | id, setting_key, setting_value |
| `slider_content` | id, title, subtitle, image, is_active |
| `site_content` | id, section, title, description, image, link, order_priority |

## Responsive Design Rules
- All CSS is **mobile-first**: base styles for 320px+, then `@media (min-width: 576px)`, `768px`, `992px`.
- Tables use `.responsive-table` class + `data-label` on every `<td>` for mobile card-view.
- Nav hamburger toggle works via `#menu-btn` toggling `.active` on `.navbar`.

## Dynamic Content System
The following are already dynamic (fetched from DB — do NOT make them static):
- Site Logo, Site Name, Footer text, Phone, Email, Address, Hours
- Homepage Slider (`slider_content` table)
- Popular Bouquets & About section blocks (`site_content` table, sections: `popular`, `about`)

## Remaining Static Content (Next Phase)
| File | What to Make Dynamic |
|---|---|
| `services.php` | 3 service cards (image, title, description) |
| `review.php` | 3 testimonials (photo, name, stars, text) |
| `about.php` | Story image, paragraph, feature bullets |
| `gallery.php` | 12 gallery images |
| `faq.php` | 4 Q&A pairs |
| `index.php` | `Home.png` mid-banner |
| `headermenu.php` | Logo (still hardcoded) |

## Code Style
- PHP: procedural style with `mysqli_*` functions (no PDO, no OOP)
- JS: ES6 modules (`type="module"`) — no jQuery on frontend
- CSS: CSS variables via `:root`, BEM-like class naming
- No Tailwind, no React, no Composer

## Known Issues to Watch For
- `services.php` and `faq.php` still contain old "pizza" references — fix them
- Admin panel pages still use hardcoded `images/logo.png` in the navbar — should use `get_setting('logo')`
- `headermenu.php` (inner-pages header) logo is still hardcoded

## Full Documentation
Read `.gemini/context.md` for the complete project reference including full file structure and all completed features.
