<?php

/**
 * Classes that manages books.
 */
class BookManager extends AbstractEntityManager 
{
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
       //var_dump($id);
        /*$sql = "SELECT * FROM book WHERE id_user = :id";
        $result = $this->db->query($sql, ['id_user' => $id]);*/
        $sql = "SELECT * FROM book WHERE id_user = 25";
        $result = $this->db->query($sql);

        $books = [];

        while ($bookArray = $result->fetch()) {
            $books = new Book($bookArray);
            $userBooks[] = $books;
        }

        return $userBooks;
    }

/*SUPPR IF NOT USED!!!!!!!*/
     /**
     * Compares params with a predefined list to protect from XSS attacks
     * @param : ordered params, array of authorised values, error message
     * @return array : default value (first of the list) or ordered and validated value.
     */

    function white_list(&$value, $allowed, $message) {
        if ($value === null) {
            return $allowed[0];
        }
        $key = array_search($value, $allowed, true);
        if ($key === false) { 
            throw new InvalidArgumentException($message); 
        } else {
            return $value;
        }
    }

    /**
     * Gets a book from his id
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
     * Update book information
     * @param Book $book : the book to update
     * @return void
     */
    public function updateBook(Book $book) : void
    {
        $sql = "UPDATE book SET title = :title, author = :author, image = :image, description = :description, status = :status, id_user = :id_user";
        $this->db->query($sql, [
            'title' => $article->getTitle(),
            'author' => $article->getAuthor(),
            'image' => $image->getImage(),
            'description' => $description->getDescription(),
            'status' => $status->getStatus(),
            'id_user' => $article->getUserId()
        ]);
    }

        /**
     * Delete book information
     * @param int $id : id of the book to delete
     * @return void
     */
    public function deleteBook(int $id) : void
    {
        $sql = "DELETE";

    }

}