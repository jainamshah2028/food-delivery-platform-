<?php
/**
 * db.php — Secure database connection helper
 * Include this at the top of any PHP file that needs a DB connection.
 * Usage: require_once("db.php");  → gives you $conn
 */

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'project');

function get_db_connection() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) {
        // Don't expose error details to the browser
        error_log("DB connection failed: " . $conn->connect_error);
        die("A database error occurred. Please try again later.");
    }
    $conn->set_charset("utf8");
    return $conn;
}

/**
 * Safe integer from GET/POST/SESSION — prevents SQL injection for numeric IDs
 */
function safe_int($val) {
    return intval($val);
}

/**
 * Safe string — escapes for use in queries (prefer prepared statements instead)
 */
function safe_str($conn, $val) {
    return $conn->real_escape_string(trim($val));
}

/**
 * Output-safe string — escapes for HTML output, prevents XSS
 */
function h($val) {
    return htmlspecialchars($val, ENT_QUOTES, 'UTF-8');
}

/**
 * Redirect and exit
 */
function redirect($url) {
    header("Location: $url");
    exit;
}

$conn = get_db_connection();
