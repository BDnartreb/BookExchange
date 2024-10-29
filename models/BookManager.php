<?php

/**
 * Classes that manages books.
 */
class BookManager extends AbstractEntityManager 
{

    /**
     * Deletes a book
     * @param int $bookId : id of the book to delete
     * @return bool $result->rowCount() >0
     */

     public function deleteBook(int $bookId) : bool
     {
         $sql="DELETE FROM book WHERE id = :id";
         $result = $this->db->query($sql, ["id" => $bookId]);
 
         return $result->rowCount() <0;
     }




    /**
     * Gets books.
     * @param int $limit
     * @return : array
     */
    public function getBooks(int $limit) : array
    {
        $sql = "SELECT book.id, title, author, image, description, status, user.id AS idUser, pseudo
        FROM book LEFT JOIN user ON book.id_user = user.id WHERE book.status='1' ORDER BY book.id ASC LIMIT $limit";
        
        $result = $this->db->query($sql);
        $books = [];

        while ($bookArray = $result->fetch()) {
            $book = new Book($bookArray);
            $books[] = $book;
        }
        return $books;
    }

    /**
     * Gets all the books sold by a user.
     * @param int $id
     * @return : array $userBooks
     */
    public function getBooksByUser(int $id) : array
    {
        $sql = "SELECT * FROM book WHERE id_user = :id";
        $result = $this->db->query($sql, ['id' => $id]);

        $books = [];

        while ($bookArray = $result->fetch()) {
            $books = new Book($bookArray);
            $userBooks[] = $books;
        } // A MUTUALITER AVEC GETBOOKS DANS UNE METHODE

        return $userBooks;
    }

    /**
     * Gets a book from its id
     * @param int $id : id of the book
     * @return Book|null : Book or null if the book doesn't exist
     */
    public function getBook(int $id) : ?Book
    {
        $sql = "SELECT book.*, user.pseudo, user.avatar_url FROM book LEFT JOIN user ON book.id_user = user.id WHERE book.id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        $book = $result->fetch();
        if ($book) {
            return new Book($book);
        }
        return null;
    }

    /**
     * Gets a book from its title or its author
     * @param int $id : id of the book
     * @return Book|null : Book or null if the book doesn't exist
     */
    public function searchBook(string $search) : ?Book
    {
        $sql = "SELECT book.*, user.pseudo, user.avatar_url FROM book LEFT JOIN user ON book.id_user = user.id WHERE book.title = :title";
        $result = $this->db->query($sql, ['title' => $search]);
        $book = $result->fetch();
        if ($book) {
            return new Book($book);
        }

        $sql = "SELECT book.*, user.pseudo, user.avatar_url FROM book LEFT JOIN user ON book.id_user = user.id WHERE book.author = :author";
        $result = $this->db->query($sql, ['author' => $search]);
        $book = $result->fetch();
        if ($book) {
            return new Book($book);
        }

        return null;
    }

    

   
    /**
     * Update book information
     * @param int $id
     * @param string $title
     * @param string $author
     * @param string $description
     * @param bool $status
     * @return void
     */
    public function updateBook(int $id, string $title, string $author, string $description, bool $status) : void
    {
        $sql = "UPDATE book SET title = :title, author = :author, description = :description, status = :status WHERE id = :id";
        $this->db->query($sql, [
            'title' => $title,
            'author' => $author,
            'description' => $description,
            'status' => $status,
            'id' => $id
        ]);
    }

    /**
     * Update book image
     * @param int $id : id of the book
     * @param string $image : image of the book to update
     * @return void
     */
    public function updateBookImage(int $id, string $image) : void
    {
        $sql = "UPDATE book SET image = :image WHERE id = :id";
        $this->db->query($sql, [
            'id' => $id,
            'image' => $image
        ]);
    }


}