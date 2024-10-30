<?php
    
    // Session started by default in case of need. 
    session_start();

     // View paths
    define('TEMPLATE_VIEW_PATH', './views/templates/');
    define('MAIN_VIEW_PATH', TEMPLATE_VIEW_PATH . 'main.php');

    // Database connection parameters 
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'bookexchange');
    define('DB_USER', 'root');
    define('DB_PASS', '');

