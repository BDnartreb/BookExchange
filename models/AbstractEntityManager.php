<?php

/**
 * Abstract class that represent a manager. Gets automatically the database manager. 
 * Used for prepared request
 */
abstract class AbstractEntityManager {
    
    protected $db;

    /**
     * Gets automatically the DBManager instance. 
     */
    public function __construct() 
    {
        $this->db = DBManager::getInstance();
    }


    /**
     * Gets the number of books owned by the connected user. Displayed in the nav part of the template "main".
     * @return int|null $bookCount
     */


     /*
    private ?int $bookCount;

    public function BookCount() : ?int
    {
        if($_SESSION){
            $id = $_SESSION['user']->getId();
            $sql="SELECT COUNT(book.id_user) as bookCount FROM user LEFT JOIN book ON user.id = book.id_user WHERE user.id = :id";
            $result = $this->db->query($sql, ['id' => $id]);
              
            if($result) {
                $bookCount = $result->fetch();
                return $bookCount;
                var_dump("bookCount");
                var_dump($bookCount);
            } else {
                return null;
            }
        }   

    }

    /**
     * Setter for bookCount
     * @param : int $bookCount
     */
/*
     public function setBookCount(?int $bookCount) : void
     {
         $this->bookCount = $bookCount;
     }
 */
     /**
      * Getter for bookCount
      * @return int|null $bookCount
      */
 /*
      public function getBookCount() : ?int
      {
         return $this->bookCount;
      }


*/

}