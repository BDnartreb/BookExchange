<?php



class BookController {

    /**
     * Displays homepage
     * @return void
     */

    public function showHome() : void
    {
        $limit=4;
        $bookManager = new BookManager();
        $books = $bookManager->getBooks($limit);

        $view = new View("Accueil");
        $view->render("home", ['books' => $books]);
    }

    /**
     * Displays all available books in a gallery
     * @return void
     */

    public function showGallery() : void 
    {
        $limit=16;
        $bookManager = new BookManager();
        $books = $bookManager->getBooks($limit);

        $view = new View("Gallery");
        $view->render("gallery", ['books' => $books]);
    }

    /**
     * Displays information about a book
     * @param : int $id (id of the book)
     * @return void
     */
    public function showBook() : void
    {
        $idBook = Utils::request("id");
        if (empty($idBook)) {
            throw new Exception("Le livre à afficher n'est pas précisé");
        }
        $bookManager = new BookManager();
        $book = $bookManager->getBook($idBook);

        $view = new View("Book");
        $view->render("book", ['book' => $book]);
    }

    /**
     * Edit book information for modification
     * @param : int $id (id of the book)
     * @return void
     */
    public function editBook() : void
    {
        $id = Utils::request("id");
        if (empty($id)) {
            throw new Exception("Le livre à afficher n'est pas précisé");
        }
        $bookManager = new BookManager();
        $book = $bookManager->getBook($id);

        $view = new View("EditBook");
        $view->render("editbook", ['book' => $book]);
    }
    
    /**
     * Delete book information for modification
     * @return void
     */
    /*public function deleteBook() : void
    {
        $idBook = Utils::request("id");
        if (empty($idBook)) {
            throw new Exception("Le livre à supprimer n'est pas précisé");
        }
        //Delete the book
        $bookManager = new BookManager()->deleteBook($idBook);
        
        //Get user info pour display userinfo page
        $userInfo = new UserController()->edituserinfo();

        return $userInfo;

    }
    */

}

