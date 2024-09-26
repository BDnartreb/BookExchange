<?php

/**
 * Book is defined by fields : 
 * title, author, image, description, status, user_id, pseudo
 */
 class User extends AbstractEntity 
 {
    private string $message;
    private int $senderId;
    private int $receiverId;
    private bool $receiverRead;
    private DateTime $messageDate;
    
    
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
    public function getsenderId() : int 
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
     * Convert date in string format in DateTime format
     * @param string|DateTime $messageDate
     * @param DateTime $format : format of conversion (mysql format) if string
     */
    public function setMessageDate(string|DateTime $messageDate, string $format = 'Y-m-d H:i:s') : void 
    {
        if (is_string($messageDate)) {
            $messageDate = DateTime::createFromFormat($format, $messageDate);
        }
        $this->messageDate = $messageDate;
    }


    /**
     * Getter for message date
     * @return DateTime $messageDate
     */
    Public function getMessageDate() : DateTime
    {
        return $this->messageDate;
    }

    

}

