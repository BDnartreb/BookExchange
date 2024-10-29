<?php

/**
 * Book is defined by fields : 
 * title, author, image, description, status, user_id, pseudo
 */
 class Messaging extends AbstractEntity 
 {
    private string $message;
    private int $senderId;
    private int $receiverId;
    private bool $receiverRead;
    private DateTime $date;
    private ?string $avatarUrl;
    private ?string $pseudo;
    
    /**
     * Setter for message
     * @param string $message
     */
    public function setMessage($message) : void
    {
        $this->message = $message;
    }

    /**Getter for message
     * @return string $message
     */
    public function getMessage() : string
    {
        return $this->message;
    }
    /**
     * Setter for sender id
     * @param int $senderId
     */
    public function setSenderId(int $senderId) : void 
    {
        $this->senderId = $senderId;
    }

     /**
     * Getter for sender id
     * @return int $senderId
     */
    public function getSenderId() : int 
    {
        return $this->senderId;
    }
    

    /**
     * Setter for receiver id
     * @param : int $receiverId
     */
    public function setReceiverId($receiverId) : void
    {
        $this->receiverId = $receiverId;
    }

    /**
     * Getter for receiverId
     * @return int $receiverId
     */
    public function getReceiverId() : int
    {
        return $this->receiverId;
    }     

    /**
     * Setter for receiver read
     * @param : bool $receiverRead
     */
    public function setReceiverRead($receiverRead) : void
    {
        $this->receiverRead = $receiverRead;
    }

    /**
     * Getter for receiverRead
     * @return bool $receiverRead
     */
    public function getReceiverRead() : bool
    {
        return $this->receiverRead;
    }     

    /**
     * Setter for message date
     * Converts date from string format to DateTime format
     * @param string|DateTime $date
     * @param DateTime $format : format of conversion (mysql format) if string
     */
    public function setDate(string|DateTime $date, string $format = 'Y-m-d H:i:s') : void 
    {
        if (is_string($date)) {
            $date = DateTime::createFromFormat($format, $date);
        }
        $this->date = $date;
    }

    /**
     * Getter for message date
     * @return DateTime $date
     */
    public function getDate() : DateTime
    {
        return $this->date;
    }

    /**
     * Setter for avatar url
     * @param : string $avatarUrl
     */
    public function setAvatarUrl($avatarUrl) : void
    {
        $this->avatarUrl = $avatarUrl;
    }

    /**
     * Getter for avatar Url
     * @return string|null $avatarUrl
     */
    public function getAvatarUrl() : ?string
    {
        return $this->avatarUrl;
    }     
 
/**
     * Setter for pseudo
     * @param : string $pseudo
     */
    public function setPseudo($pseudo) : void
    {
        $this->pseudo = $pseudo;
    }

    /**
     * Getter for pseudo
     * @return string|null $pseudo
     */
    public function getPseudo() : ?string
    {
        return $this->pseudo;
    }  
}


