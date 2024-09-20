<?php

/**
 * Book is defined by fields : 
 * title, author, image, description, status, user_id, pseudo
 */
 class User extends AbstractEntity 
 {
    private string $pseudo;
    private string $email;
    private string $password;
    private DateTime $registrationDate;
    private string $avatarUrl;
    private ?int $bookCount;
    
    /**
     * Setter for pseudo
     * @param string $pseudo
     */
    public function setPseudo($pseudo) : void
    {
        $this->pseudo = $pseudo;
    }

    /**Getter for pseudo
     * @return string $pseudo
     */
    public function getPseudo() : string
    {
        return $this->pseudo;
    }
    /**
     * Setter for email
     * @param string $email
     */
    public function setEmail(string $email) : void 
    {
        $this->email = $email;
    }

     /**
     * Getter for email
     * @return string $email
     */
    public function getEmail() : string 
    {
        return $this->email;
    }
    

    /**
     * Setter for password
     * @param : string $password
     */
    public function setPassword($password) : void
    {
        $this->password = $password;
    }

    /**
     * Getter for password
     * @return string $password
     */
    public function getPassword() : string
    {
        return $this->password;
    }     

    /**
     * Setter for date of registration
     * Convert date in string format in DateTime format
     * @param string|DateTime $registrationDate
     * @param string $format : format of conversion (mysql format) if string
     */
    public function setRegistrationDate(string|DateTime $registrationDate, string $format = 'Y-m-d H:i:s') : void 
    {
        if (is_string($registrationDate)) {
            $registrationDate = DateTime::createFromFormat($format, $registrationDate);
        }
        $this->registrationDate = $registrationDate;
    }


    /**
     * Getter for date of registration
     * @return DateTime $registrationDate
     */
    Public function getRegistrationDate() : DateTime
    {
        return $this->registrationDate;
    }

    /**
     * Setter for user profil avatar
     * @param : string $avatarUrl
     */
    public function setAvatarURL($avatarUrl) : void
    {
        $this->avatarUrl = $avatarUrl;
    }   
    
    /**
     * Getter for user profil avatar
     * @return string $avatarUrl
     */
    public function getAvatarUrl() : string
    {
        return $this->avatarUrl;

    }

    /**
     * Setter for bookCount
     * @param : int $bookCount
     */

    public function setBookCount(?int $bookCount) : void
    {
        $this->bookCount = $bookCount;
    }

    /**
     * Getter for bookCount
     * @return int $bookCount
     */

     public function getBookCount() : int
     {
        return $this->bookCount;
     }

    

}


