<?php
    
    // Session started by default in case of need. 
    session_start();

    // Constants needed to connect to the data base  

    define('TEMPLATE_VIEW_PATH', './views/templates/');
    define('MAIN_VIEW_PATH', TEMPLATE_VIEW_PATH . 'main.php');
    define('MAINSESSION_VIEW_PATH', TEMPLATE_VIEW_PATH . 'mainsession.php');

    define('DB_HOST', 'localhost');
    define('DB_NAME', 'bookexchange');
    define('DB_USER', 'root');
    define('DB_PASS', '');

