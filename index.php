<?php

require_once 'config/autoload.php';
require_once 'config/config.php';


// Gets orders form the user
// If no order, display homepage
$action = Utils::request('action', 'home');

// Try catch global to manage errors
try {
        switch ($action) {

        case 'adduser':
            $userController = new UserController();
            $userController->addUser();
            break;

        case 'book':
            $bookController = new BookController();
            $bookController->showBook();
            break;

        case 'connection':
            $userController = new UserController();
            $userController->showConnection();
            break;

        case 'connectuser':
            $userController = new UserController();
            $userController->connectUser();
            break;

        case 'deletebook':
            $bookController = new BookController();
            $bookController->deleteBook();
            break;

        case 'editbook':
            $bookController = new BookController();
            $bookController->editBook();
            break;
    
        case 'gallery':
            $bookController = new BookController();
            $bookController->showGallery();
            break;

        case 'home':
            $bookController = new BookController();
            $bookController->showHome();
            break;

        case 'messaging':
            $userController = new UserController();
            $userController->showMessaging();
            break;

        case 'registration':
            $userController = new UserController();
            $userController->showRegistration();
            break;

        case 'searchbook':
            $userController = new BookController();
            $userController->searchBook();
            break;

        case 'updatebook':
            $userController = new BookController();
            $userController->updateBook();
            break;

        case 'updatebookimage':
            $userController = new BookController();
            $userController->updateBookImage();
            break;
        
        case 'updateuseravatar':
            $userController = new UserController();
            $userController->updateUserAvatar();
            break;
                    
        case 'updateuserinfo':
            $userController = new UserController();
            $userController->updateUserInfo();
            break;
    




        case 'userinfo':
            $userController = new UserController();
            $userController->editUserInfo();
            break;

        case 'userprofil':
            $userController = new UserController();
            $userController->showUserProfil();
            break;


        default:
            throw new Exception("La page demandée n'existe pas.");
    }
} catch (Exception $e) {
    $errorView = new View('Erreur');
    $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
}
