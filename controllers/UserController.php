<?php



class UserController {

    /**
     * Displays user profil page
     * @return void
     */

    public function showUserProfil() : void
    {
        $userManager = new UserManager();
        $user = $userManager->getUserProfil();

        $view = new View("Profile");
        $view->render("userprofil", ['user' => $user]);
    }

    /**
     * Displays user information page
     * @return void
     */

    public function showUserInfo() : void 
    {
        $userManager = new UserManager();
        $user = $userManager->getUserInfo();

        $view = new View("UserInfo");
        $view->render("userinfo", ['user' => $user]);
    }

    /**
     * Displays registration page
     * @return void
     */

     public function showRegistration() : void 
     {
 
         $view = new View("Inscription");
         $view->render("registration", []);
     }

}

