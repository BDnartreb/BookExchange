<?php

/**
 * Classes that manages users.
 */
class UserManager extends AbstractEntityManager 
{
    /**
     * Registrate
     * @return : array
     */
    public function registrate() : array
    {
        /*$sql = "INSERT INTO `user` (`pseudo`, `email`,`password`, `registration_date`, `avatar_url`) VALUES
('BB', 'BB@home.fr', '', '2024-09-17 11:31:37', ''),

INSERT INTO user FROM book LEFT JOIN user ON book.id_user = user.id WHERE book.status='1'";
        //$sql = "SELECT * FROM book WHERE id =1";
        
        $result = $this->db->query($sql);
        $users = [];

        while ($bookArray = $result->fetch()) {
            $book = new Book($bookArray);
            $books[] = $book;
        }
        return $books;*/
    }

    /**
     * Gets user information and number of books from user and book tables of the bookexchange database
     * @param : int $id 
     * @return User|null
     */
    public function getUserInfo(int $id) : ?User
    {
        $sql="SELECT user.*, COUNT(DISTINCT book.id_user) as bookCount FROM user LEFT JOIN book ON user.id = book.id_user WHERE user.id = :id";

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
//        $sql="SELECT * FROM messaging LEFT JOIN user WHERE user.id = :id AND messaging.id_user = user.id";
        
        $result = $this->db->query($sql);
        $messaging = [];

        while ($message = $result->fetch()) {
            $messages = new Messaging($message);
            $messaging[] = $messages;
        }
        return $messaging;

    }

}