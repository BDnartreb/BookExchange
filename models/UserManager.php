<?php

/**
 * Classes that manages users.
 */
class UserManager extends AbstractEntityManager 
{

    /**
     * Create a new Message in the database
     * @param : array $newMessage
     * @return bool $result //check the increase of rows in the database to validate the insert
     */
    public function addMessage($newMessage) : bool
    {
        $sql="INSERT INTO messaging (`message`, `sender_id`, `receiver_id`, `date`) VALUES (:message, :senderId, :receiverId, NOW())";

        $result=$this->db->query($sql, [
            'message' => $newMessage->getMessage(),
            'senderId' => $newMessage->getSenderId(),
            'receiverId' => $newMessage->getReceiverId()
        ]);
        return $result->rowCount() >0;
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
      * Calculates the interval between a date and the current date
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
     * Gets conversations of the connected user
     * @param int $id : id of the connected user
     * @return array $conversations
     */

    public function getConversations(int $id) : array
    {
        $sql="SELECT id, message, sender_id, receiver_id, receiver_read, MAX(date) as date, pseudo, avatar_url
        FROM (
        SELECT m1.id, m1.message, m1.sender_id, m1.receiver_id, m1.receiver_read, MAX(m1.date) as date, user.pseudo, user.avatar_url 
        FROM messaging m1 LEFT JOIN user ON m1.sender_id = user.id 
        WHERE receiver_id = :id GROUP BY m1.sender_id
        UNION 
        SELECT m2.id, m2.message, m2.sender_id, m2.receiver_id, m2.receiver_read, MAX(m2.date) as date, user.pseudo, user.avatar_url 
        FROM messaging m2 LEFT JOIN user ON m2.receiver_id = user.id 
        WHERE sender_id = :id GROUP BY m2.receiver_id
        ) a GROUP BY pseudo ORDER BY MAX(date) DESC";

        $result = $this->db->query($sql, ['id' => $id]);
        $conversations = [];
     
        while ($conversation = $result->fetch()) {
            $c = new Messaging($conversation);
            $conversations[] = $c;
        }
        return $conversations;
    }

    /**
      * Gets the count of unread messages of the connected user
      * @param int $id : of the connected user
      * @return int $messageCount
      */

    public function getMessageCount() : ?int
    {
        $id = $_SESSION['user']->getId();
        $sql = "SELECT COUNT(receiver_read) as count FROM messaging WHERE receiver_id = :id AND receiver_read=0";
        $result = $this->db->query($sql, ['id' => $id]);
        $count = $result->fetch();
        $messageCount = $count['count'];
        return $messageCount;

    }

        /**
      * Gets messages of the current conversation
      * @param int $id : id of the connected user
      * @param int $contactId : id of the contact
      * @return array : $messaging
      */

    public function getMessaging(int $id, int $contactId) : array
    {
        $sql="SELECT messaging.*, user.pseudo, user.avatar_url 
        FROM messaging LEFT JOIN user ON user.id = sender_id WHERE sender_id = :id AND receiver_id = :contactid
        UNION 
        SELECT messaging.*, user.pseudo, user.avatar_url 
        FROM messaging LEFT JOIN user ON user.id = sender_id WHERE receiver_id = :id AND sender_id = :contactid
        ORDER BY date ASC";

        $result = $this->db->query($sql, ['id' => $id, 'contactid' => $contactId]);
        $messaging = [];

        while ($message = $result->fetch()) {
            $messages = new Messaging($message);
            $messaging[] = $messages;
        }

        $sql2="UPDATE messaging SET receiver_read = 1 WHERE sender_id = :id AND receiver_id = :contactid";
        $result = $this->db->query($sql2, ['id' => $id, 'contactid' => $contactId]);

        $sql3="UPDATE messaging SET receiver_read = 1 WHERE receiver_id = :id AND sender_id = :contactid";
        $result = $this->db->query($sql3, ['id' => $id, 'contactid' => $contactId]);

        return $messaging;
    }

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
     * Update User avatar
     * @param : int $id
     * @param : string $avatar
     * @return void
     */
    public function updateUserAvatar(int $id, string $avatar) : void
    {
        $sql="UPDATE user SET avatar_url = :avatar WHERE id = :id";

        $result=$this->db->query($sql, [
            'id' => $id,
            'avatar' => $avatar
        ]);
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



    



}