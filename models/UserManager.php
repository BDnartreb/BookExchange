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
        $sql = "INSERT INTO `user` (`pseudo`, `email`,`password`, `registration_date`, `avatar_url`) VALUES
('BB', 'BB@home.fr', '', '2024-09-17 11:31:37', ''),

INSERT INTO user FROM book LEFT JOIN user ON book.id_user = user.id WHERE book.status='1'";
        //$sql = "SELECT * FROM book WHERE id =1";
        
        $result = $this->db->query($sql);
        $users = [];

        while ($bookArray = $result->fetch()) {
            $book = new Book($bookArray);
            $books[] = $book;
        }
        return $books;
    }

    


}