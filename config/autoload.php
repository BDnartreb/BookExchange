<?php

/** test 15
 * Autoload system to declare require_once automatically
 * PHP uses this function to search classes called in models, controllers, views, services files 
 * If found a requice_once for the class is declared automatically.
 */
spl_autoload_register(function($className) {
    if (file_exists('services/' . $className . '.php')) {
        require_once 'services/' . $className . '.php';
    }

    if (file_exists('models/' . $className . '.php')) {
        require_once 'models/' . $className . '.php';
    }

    if (file_exists('controllers/' . $className . '.php')) {
        require_once 'controllers/' . $className . '.php';
    }

    if (file_exists('views/' . $className . '.php')) {
        require_once 'views/' . $className . '.php';
    }
    
});