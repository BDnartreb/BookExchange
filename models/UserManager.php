<?php

/**
 * Classes that manages users.
 */
class UserManager extends AbstractEntityManager 
{
     /**
      * Get a user by his email (as login) to validate the connection
      * @param string $email
      * @param string $password
      * @return ?User
      */
    public function getUserByEmail(string $email, string $password) : ?User 
    {
        $sql = "SELECT * FROM user WHERE email = :email";
        $result = $this->db->query($sql, ['email' => $email]);
        $user = $result->fetch();
        if ($user && password_verify($password, $user['password'])){
            return new User($user);
        }
        return null;
    }

    /**
     * Gets user information and number of books from user and book tables of the bookexchange database
     * @param : int $id 
     * @return User|null
     */
    public function getUserInfo(int $id) : ?User
    {
        $sql="SELECT user.*, COUNT(book.id_user) as bookCount FROM user LEFT JOIN book ON user.id = book.id_user WHERE user.id = :id";

        $result = $this->db->query($sql, ['id' => $id]);
        $userInfo = $result->fetch();

        if ($userInfo){
            return new User($userInfo);
        } else {
            return null;
        }
    }

    /**
     * Create a new User in the database
     * @param : array $user
     * @return bool $result //check the increase of rows in the database to validate the insert
     */
    public function addUser($user) : bool
    {
        $sql="INSERT INTO user (`pseudo`, `email`, `password`, `registration_date`) VALUES (:pseudo, :email, :password, NOW())";

        $result=$this->db->query($sql, [
            'pseudo' => $user->getPseudo(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword()
        ]);
        return $result->rowCount() >0;
    }

    /**
     * Update User Information
     * Gets user information and number of books from user and book tables of the bookexchange database
     * @param : int $id 
     * @return void
     */
    public function updateUserInfo(int $id) : void
    {
        $sql="UPDATE";

    }

    public function getMessaging(int $id) : ?Messaging
    {
        $sql="SELECT * FROM messaging LEFT JOIN user WHERE user.id = :id AND messaging.id_user = user.id";
        
        $result = $this->db->query($sql, ['id' => $id]);
        $messaging = [];

        while ($message = $result->fetch()) {
            $messages = new Messaging($message);
            $messaging[] = $messages;
        }
        return $messaging;

    }

}