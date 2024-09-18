<?php

require_once 'config/config.php';
require_once 'config/autoload.php';

// Gets orders form the user
// If no order, display homepage
$action = Utils::request('action', 'home');

// Try catch global to manage errors
try {
        switch ($action) {
        case 'home':
            $bookController = new BookController();
            $bookController->showHome();
            break;

        case 'gallery':
            $bookController = new BookController();
            $bookController->showGallery();
            break;

        case 'registration':
            $userController = new UserController();
            $userController->showRegistration();
            break;
    


        default:
            throw new Exception("La page demandée n'existe pas.");
    }
} catch (Exception $e) {
    $errorView = new View('Erreur');
    $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
}
