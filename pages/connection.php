<?php
$conn = mysqli_connect("localhost", "root", "", "flowerzone");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Helper function to get site settings
if (!function_exists('get_setting')) {
    function get_setting($key, $default = "") {
        global $conn;
        $key = mysqli_real_escape_string($conn, $key);
        $query = mysqli_query($conn, "SELECT setting_value FROM `site_settings` WHERE setting_key = '$key'");
        if ($query && mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            return $row['setting_value'];
        }
        return $default;
    }
}
?>