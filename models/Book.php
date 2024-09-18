<?php

/**
 * Book is defined by fields : 
 * title, author, image, description, status, user_id, pseudo
 */
 class Book extends AbstractEntity 
 {
    private string $title = "";
    private string $author = "";
    private string $image = "";
    private string $description = "";
    private bool $status;
    private int $userId;
    private string $pseudo;
    

    
    /**
     * Setter for title
     * @param string $title
     */
    public function setTitle(string $title) : void 
    {
        $this->title = $title;
    }

    /**
     * Getter for title
     * @return string
     */
    public function getTitle() : string 
    {
        return $this->title;
    }

    /**
     * Setter for author
     * @param string $author
     */
    public function setAuthor(string $author) : void 
    {
        $this->author = $author;
    }

     /**
     * Getter for author
     * @return string $author
     */
    public function getAuthor() : string 
    {
        return $this->author;
    }
    

    /**
     * Setter fo image
     * @param : string $image
     */

    public function setImage(string $image) : void
    {
        $this->image = $image;
    }

    /**
     * Getter for image
     * @return string $image
     */

     public function getImage() : string
     {
        return $this->image;
     }

    /**
    * Setter for description
    * @param string $description  
    */

    public function setDescription($description) : void
    {
        $this->description = $description;
    }

    /**
     * Getter for description
     * Return the first $length caracters of the description
     * @param int $length : number of caracters to return
     * if $length not defined (or equals -1), return $description
     * if $description > $length, return $length first caracters finishing by "..."
     * @return string
     */
    public function getDescription(int $length = -1) : string 
    {
        if ($length > 0) {
            // using mb_substr and not substr to avoid cutting a caracter (for multibyte caracter as accents).
            $content = mb_substr($this->description, 0, $length);
            if (strlen($this->description) > $length) {
                $description .= "...";
            }
            return $description;
        }
        return $this->description;
    }
    /**
    * Setter for status
    * @param bool $status
    */
    
    public function setStatus($status) : void
    {
        $this->status = $status;
    }

    /**
    * Getter for status
    * @return bool $status 
    */
    public function getStatus() : bool
    {
        return $this->status;
    }

    /**
    * Setter for userId
    * @param int $userId
    */
    public function setUserId($userId) : void
    {
        $this->userId = $userId;
    }
    /**
    * Getter for userId
    * @return int $userId
    */
    public function getUserId() : int
    {
        return $this->userId;
    }     

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
 }


