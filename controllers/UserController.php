<?php



class UserController {

    /**
     * Check if the user is connected
     * @return void
     */
    private function checkIfUserIsConnected() : void
    {
        if (!isset($_SESSION['user'])) {
            Utils::redirect("connection");
        }
    }


        /**
     * Displays registration page
     * @return void
     */

     public function showRegistration() : void 
     {
 
         $view = new View("Inscription");
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
        //$id = Utils::request("id");
        $id=1;
        $userManager = new UserManager();
        $user = $userManager->getUserInfo($id);

        $books = new BookManager();
        $userBooks = $books->getBooksByUser($id);
        var_dump($userBooks);
        $view = new View("User");
        $view->render("userinfo", ['user' => $user, 'userBooks' => $userBooks]);
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

        if (empty($pseudo) || empty($email) || empty($password)){
            throw new Exception ("Tous les champs sont obligatoires. Votre demande d'inscription n'a malheureusement pas pu être prise en compte."); 
        }

        $user = new User([
            'pseudo' => $pseudo,
            'email'=> $email,
            'password' => $password,
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
        // get id
         $userManager = new UserManager();
         $user = $userManager->updateUserInfo($id);
 
         $view = new View("UserInfo");
         $view->render("userinfo", ['user' => $user]);
     }

     
    /**
     * Displays user profil page
     * @return void
     */

     public function showUserProfil() : void
     {
        /*$idUser = Utils::request("id");
        if (empty($idUser)) {
            throw new Exception("Préciser l'id de l'utilisateur à afficher");
        }*/
        $idUser = 1;
         $userManager = new UserManager();
         $user = $userManager->getUserInfo($idUser);
 
         $view = new View("Profile");
         $view->render("userprofil", ['user' => $user, 'book' => $userbooks]);
     }

    /**
     * Displays messaging page
     * @return void
     */

     public function showMessaging() : void
     {
         $userManager = new UserManager();
         $user = $userManager->getMessaging();
 
         $view = new View("Messagerie");
         $view->render("messaging", ['messaging' => $messaging]);
     }
}

