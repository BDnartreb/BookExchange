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
            throw new Exception("L'utilisateur demandé n'existe pas.");
        }

        if (!password_verify($password, $user->getPassword())) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            throw new Exception("Le mot de passe est incorrect : $hash");
        }

        // create a user session
        $_SESSION['user'] = $user;
        $_SESSION['id'] = $user->getId();

        Utils::redirect("home");
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
        $id = Utils::request("id");
        $userManager = new UserManager();
        $user = $userManager->getUserInfo($id);

        $books = new BookManager();
        $userBooks = $books->getBooksByUser($id);
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
        $id = $_SESSION['id'];
        if (empty($id)) {
            throw new Exception("Préciser l'id de l'utilisateur à afficher");
        }
        $userManager = new UserManager();
        $user = $userManager->getUserInfo($id);

       /* $registrationDate = $user->getRegistrationDate();
        var_dump($registrationDate);
        $diff=date_diff($registrationDate, DATE_FORMAT('2024-10-09 00:00:00'));
        var_dump($diff);*/
        //var_dump($id);
        $books = new BookManager();
        $userBooks = $books->getBooksByUser($id);

        $view = new View("Profile");
        $view->render("userprofil", ['user' => $user, 'books' => $userBooks]);
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

