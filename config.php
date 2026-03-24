<?php

// Database Configuration
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'flowerzone';

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set charset
$conn->set_charset("utf8mb4");

// Site Configuration
define('SITE_NAME', 'flowerZone');
define('SITE_URL', 'http://localhost/money/pizzaZone/');
define('ADMIN_URL', 'http://localhost/money/pizzaZone/admin/');

// File Upload Configuration
define('UPLOAD_PATH', 'uploads/');
define('ADMIN_UPLOAD_PATH', 'admin/uploads/');
define('MAX_FILE_SIZE', 5 * 1024 * 1024); // 5MB
define('ALLOWED_EXTENSIONS', ['jpg', 'jpeg', 'png', 'gif', 'webp']);

// Session Configuration
ini_set('session.gc_maxlifetime', 86400); // 24 hours
session_set_cookie_params(86400);

// Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Timezone
date_default_timezone_set('Asia/Kolkata');

// Helper Functions
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function format_price($price) {
    return '₹' . number_format($price, 2);
}

function is_admin() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin';
}

function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function redirect($url) {
    header("Location: $url");
    exit();
}

function upload_file($file, $upload_path) {
    if (!isset($file['error']) || is_array($file['error'])) {
        return ['success' => false, 'message' => 'Invalid file upload'];
    }

    switch ($file['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            return ['success' => false, 'message' => 'File too large'];
        case UPLOAD_ERR_PARTIAL:
            return ['success' => false, 'message' => 'File upload was interrupted'];
        case UPLOAD_ERR_NO_FILE:
            return ['success' => false, 'message' => 'No file uploaded'];
        default:
            return ['success' => false, 'message' => 'Unknown upload error'];
    }

    if ($file['size'] > MAX_FILE_SIZE) {
        return ['success' => false, 'message' => 'File size exceeds maximum limit'];
    }

    $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($file_extension, ALLOWED_EXTENSIONS)) {
        return ['success' => false, 'message' => 'Invalid file type'];
    }

    $new_filename = uniqid() . '.' . $file_extension;
    $upload_full_path = $upload_path . $new_filename;

    if (!is_dir($upload_path)) {
        mkdir($upload_path, 0755, true);
    }

    if (move_uploaded_file($file['tmp_name'], $upload_full_path)) {
        return ['success' => true, 'filename' => $new_filename, 'message' => 'File uploaded successfully'];
    } else {
        return ['success' => false, 'message' => 'Failed to move uploaded file'];
    }
}

function delete_file($filename, $upload_path) {
    $file_path = $upload_path . $filename;
    if (file_exists($file_path)) {
        return unlink($file_path);
    }
    return true;
}

// Cart Functions
function get_cart_count() {
    if (isset($_SESSION['cart'])) {
        return array_sum($_SESSION['cart']);
    }
    return 0;
}

function get_cart_total() {
    global $conn;
    $total = 0;
    
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $product_ids = array_keys($_SESSION['cart']);
        $ids_string = implode(',', array_map('intval', $product_ids));
        
        $sql = "SELECT id, price FROM flowers WHERE id IN ($ids_string)";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $total += $row['price'] * $_SESSION['cart'][$row['id']];
            }
        }
    }
    
    return $total;
}

// Email Configuration (for future use)
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', '');
define('SMTP_PASSWORD', '');
define('FROM_EMAIL', 'noreply@flowerzone.com');
define('FROM_NAME', 'flowerZone');

?>
