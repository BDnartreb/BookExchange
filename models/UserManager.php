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
     * Update user email, password, pseudo
     * @param : int $id
     * @param : string $email
     * @param : string $password
     * @param : string $pseudo
     * @return void
     */
    public function updateUserInfo(int $id, string $email, string $password, string $pseudo) : void
    {
        $sql="UPDATE user SET email= :email, password = :password, pseudo= :pseudo WHERE id= :id";

        $result=$this->db->query($sql, [
            'id' => $id,
            'email' => $email,
            'password' => $password,
            'pseudo' => $pseudo
        ]);
    }

    /**
     * Update User avatar
     * @param : int $id
     * @param : string $avatar
     * @return void
     */
    public function updateUserAvatar(int $id, string $avatar) : void
    {
        var_dump($id);
        var_dump($avatar);
        $sql="UPDATE user SET avatar_url = :avatar WHERE id = :id";

        $result=$this->db->query($sql, [
            'id' => $id,
            'avatar_url' => $avatar
        ]);
    }

    public function getMessaging(int $id) : array
    {
        $sql="SELECT messaging.*, user.pseudo, user.avatar_url 
        FROM messaging LEFT JOIN user ON user.id = sender_id WHERE sender_id = :id
        UNION 
        SELECT messaging.*, user.pseudo, user.avatar_url 
        FROM messaging LEFT JOIN user ON user.id = sender_id WHERE receiver_id = :id";

        $result = $this->db->query($sql, ['id' => $id]);
        $messaging = [];

        while ($message = $result->fetch()) {
            $messages = new Messaging($message);
            $messaging[] = $messages;
        }
        return $messaging;
    }

     /**
      * Calculate the interval between a date and the current date
      * @param DateTime $startDate
      * @return DateTime $dateInterval
      */

    public function dateInterval($startDate) : string
    {
        //Date test
            /*$d = "2024-10-22 00:00:00";// change the date to test the function
            $format = 'Y-m-d H:i:s';
            $startDate = DateTime::createFromFormat($format, $d);
            var_dump($startDate);*/

        $date = new DateTime();
        $interval = $startDate->diff($date);
        $intervalInString = $interval->format('%Y%M%D');

        if ($intervalInString < 2) {
            $dateInterval = "1 jour";
        } else if ($intervalInString <=31) {
            $dateInterval = $interval->format('%d')." jours";
        } else if ($intervalInString < 10000) {
            $dateInterval = $interval->format('%m')." mois";
        } else if ($intervalInString > 10000) {
            $dateInterval = $interval->format('%y')." an et " . $interval->format('%m') ." mois";
        } else if ($intervalInString > 20000) {
            $dateInterval = $interval->format('%y')." ans";
        }

        return $dateInterval;
    }
    
        /**
     * Create a new Message in the database
     * @param : array $newMessage
     * @return bool $result //check the increase of rows in the database to validate the insert
     */
    public function addMessage($newMessage) : bool
    {
        $sql="INSERT INTO message (`message`, `sender_id`, `receiver_id`, `date`) VALUES (:message, :senderId, :receiverId, NOW())";

        $result=$this->db->query($sql, [
            'message' => $newMessage->getMessage(),
            'sender_id' => $newMessage->getSenderId(),
            'receiver_id' => $newMessage->getReceiverId()
        ]);
        return $result->rowCount() >0;
    }



}