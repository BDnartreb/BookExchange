<?php



class UserController {

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
        $id=1;
        $userManager = new UserManager();
        $user = $userManager->getUserInfo($id);

        $view = new View("UserInfo");
        $view->render("userinfo", ['user' => $user]);
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
        $idUser = Utils::request("id");
        if (empty($idUser)) {
            throw new Exception("Préciser l'id de l'utilisateur à afficher");
        }

         $userManager = new UserManager();
         $user = $userManager->getUserInfo($idUser);
 
         $view = new View("Profile");
         $view->render("userprofil", ['user' => $user]);
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

