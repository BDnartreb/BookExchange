<?php

class UserController {

    /**
     * User connection
     * @return void
     */
    public function connectUser() : void 
    {
        $email = Utils::request("email");
        $password = Utils::request("password");

        if (empty($email) || empty($password)) {
            throw new Exception("Tous les champs sont obligatoires.");
        }

        $userManager = new UserManager();
        $user = $userManager->getUserByEmail($email, $password);

        if (!$user) {
            throw new Exception("Le nom d'utilisteur et le mot de passe ne correspondent pas.");
        }

        // gets information for the user session
        $_SESSION['user'] = $user;
        
        Utils::redirect("home");
    }

    /**
     * Displays registration page
     * @return void
     */

     public function showRegistration() : void 
     {
        $view = new View();
        $view->render("registration");
     }

    /**
     * Displays login page
     * @return void
     */

     public function showConnection() : void 
     {
        $view = new View("Connexion");
        $view->render("connection", []);
     }

    /**
     * Edit user information page for modification
     * @param : int $id
     * @return void
     */

    public function editUserInfo() : void 
    {
        $id = $_SESSION['user']->getId();
        $userManager = new UserManager();
        $user = $userManager->getUserInfo($id);
        $userBooks = new BookManager();
        $books = $userBooks->getBooksByUser($id);

        $registrationDate = $user->getRegistrationDate();
        $interval = new UserManager();
        $dateInterval = $interval->DateInterval($registrationDate);

        $view = new View("User");
        $view->render("userinfo", ['user' => $user, 'books' => $books, 'dateInterval' => $dateInterval]);
    }

    /**
     * Insert a new user
     * @param : string $pseudo, string $email, string $password
     * @return void
     */

     public function addUser() : void 
     {
        $pseudo = Utils::request("pseudo");
        $email = Utils::request("email");
        $password = Utils::request("password");

        //encripts the password to store it into the database
        $hash = password_hash($password, PASSWORD_DEFAULT);

        if (empty($pseudo) || empty($email) || empty($hash)){
            throw new Exception ("Tous les champs sont obligatoires. Votre demande d'inscription n'a malheureusement pas pu être prise en compte."); 
        }

        $user = new User([
            'pseudo' => $pseudo,
            'email'=> $email,
            'password' => $hash,
        ]);

        $userManager = new UserManager();
        $result = $userManager->addUser($user);

        if (!$result) {
            throw new Exception ("user non créé !");
        }
 
         Utils::redirect('connection');
      }

        /**
     * Update user information
     * @param : int $id
     * @return void
     */

     public function updateUserInfo() : void 
     {
        $id = $_SESSION['user']->getId();
        $email = Utils::request("email");
        $password = Utils::request("password");
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $pseudo = Utils::request("pseudo");
        $userManager = new UserManager();
        $user = $userManager->updateUserInfo($id, $email, $hash, $pseudo);

        $view = new View();
        $view->render("home");
     }

    /**
     * Update user information
     * @param : int $id
     * @return void
     */

     public function updateUserAvatar() : void 
     {
        $id = $_SESSION['user']->getId();
        $avatar = $_GET['avatar'];
        $userManager = new UserManager();
        $updateAvatar = $userManager->updateUserAvatar($id, $avatar);

        $u = new UserManager();
        $user = $u->getUserInfo($id);

        $view = new View();
        $view->render("userinfo", ['user' => $user]);
     }

    /**
     * Displays user profil page
     * @param int $id
     * @return void
     */

     public function showUserProfil() : void
     {
        //$id = Utils::request("id");
        $id = $_SESSION['user']->getId();
        if (empty($id)) {
            throw new Exception("Préciser l'id de l'utilisateur à afficher");
        }
        $userManager = new UserManager();
        $user = $userManager->getUserInfo($id);

        $registrationDate = $user->getRegistrationDate();
        $interval = new UserManager();
        $dateInterval = $interval->DateInterval($registrationDate);

        $books = new BookManager();
        $userBooks = $books->getBooksByUser($id);

        $view = new View("Profile");
        $view->render("userprofil", ['user' => $user, 'books' => $userBooks, 'dateInterval' => $dateInterval]);
     }

     /**
     * Displays messaging page
     * @return void
     */

     public function showMessaging() : void
     {
        $id = $_SESSION['user']->getId();

        if (empty($id)) {
            throw new Exception("Préciser l'id de l'utilisateur à afficher");
        }

        $userManager = new UserManager();
        $messaging = $userManager->getMessaging($id);
        $user = $userManager->getUserInfo($id);

        //$view = new View("Messagerie");
        $view = new View();
        $view->render("messaging", ['messaging' => $messaging, 'user' => $user]);
     }

     /**
     * Insert a new message in the database and display the messaging page
     * From given params (sender_id is the id of the connected user, date is the current date )
     * @param string $messageText
     * @param int $receiver_id
     * @return void
     */

     public function addMessage() : void 
     {
        $messageText = Utils::request("message");
        $receiverId = Utils::request("receiver_id");
 
        if (empty($pseudo) || empty($email) || empty($hash)){
            throw new Exception ("Tous les champs sont obligatoires. Votre demande d'inscription n'a malheureusement pas pu être prise en compte."); 
        }

        $newMessage = new Messaging([
            'message' => $messageText,
            'receiverId'=> $receiverId,
            'senderId' => $_SESSION['user']->getId()
        ]);

        $userManager = new UserManager();
        $result = $userManager->addMessage($newMessage);

        if (!$result) {
            throw new Exception ("message non envoyé !");
        }
 
        $m = new UserController();
        $messaging = $m->showMessaging();

      }
}

