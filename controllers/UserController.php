<?php

class UserController extends AbstractController {

    /**
    * Insert a new message in the database and display the messaging page
    * From given params (sender_id is the id of the connected user, date is the current date )
    * @param string $messageText
    * @param int $receiver_id
    * @return void
    */

    public function addMessage() : void 
    {
        $messageText = $_POST["messageText"];
        $receiverId = $_POST["receiverId"];
        $id = $_SESSION['user']->getId();
        
        if (empty($messageText) || empty($receiverId) || empty($id)){
            throw new Exception ("La requête n'a pas pu aboutir."); 
        }

        if ($id == Utils::request("contactid")){
            throw new Exception ("Le message ne peut être envoyer. L'expéditeur et le destinataire sont identiques."); 
        }

        $newMessage = new Messaging ([
            'message' => $messageText,
            'receiverId'=> $receiverId,
            'senderId' => $id
        ]);

        $userManager = new UserManager();
        $result = $userManager->addMessage($newMessage);

        if (!$result) {
            throw new Exception ("message non envoyé !");
        }
 

        Utils::redirect('messaging', ['contactid' => $receiverId]);
        /*$m = new UserController();
        $messaging = $m->showMessaging();*/

    }
   
    /**
     * Insert a new user
     * @param : string $pseudo, string $email, string $password
     * @return void
     */

    public function addUser() : void 
    {
        $pseudo = $_POST["pseudo"];
        $email = $_POST["email"];
        $password = $_POST["password"];

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
 
         Utils::redirect('userinfo');
    }

    /**
     * User connection
     * @return void
     */
    public function connectUser() : void 
    {
        $email = $_POST["email"];
        $password = $_POST["password"];

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
        $messageCount = 3;
 
        $view = new View();
        $view->render("userinfo", $this->getParams(['user' => $user, 'books' => $books, 'dateInterval' => $dateInterval]));

    }

     /**
     * Displays login page
     * @return void
     */

    public function showConnection() : void 
    {
        $view = new View();
        $view->render("connection", $this->getParams([]));
    }

     /**
     * Displays messaging page
     * @return void
     */

    public function showMessaging() : void
    {
        $id = $_SESSION['user']->getId();
        $contactId = Utils::request("contactid");

        if (empty($id)) {
            throw new Exception("Préciser l'id de l'utilisateur à afficher");
        }

        $userManager = new UserManager();
        $conversations = $userManager->getConversations($id);
        $user = $userManager->getUserInfo($id);

        $view = new View();


        if (isset($contactId)){
            $messaging = $userManager->getMessaging($id, $contactId);
            $view->render("messaging", $this->getParams(['conversations' => $conversations, 'messaging' => $messaging, 'user' => $user]));
        } else {  
            $view->render("messaging", $this->getParams(['conversations' => $conversations, 'user' => $user]));
        }
    }

    /**
     * Displays registration page
     * @return void
     */

    public function showRegistration() : void 
    {
        $view = new View();
        $view->render("registration", $this->getParams([]));
    }
     
    /**
     * Displays user profil page
     * @param int $id
     * @return void
     */

    public function showUserProfil() : void
    {
        $id = Utils::request("id");
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

        $view = new View();
        $view->render("userprofil", $this->getParams(['user' => $user, 'books' => $userBooks, 'dateInterval' => $dateInterval]));
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

        
        $u = new UserController;
        $userinfo = $u->editUserInfo();
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
        $view->render("connection",$this->getParams([]));
    }

}

