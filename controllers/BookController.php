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
     * Search a book by its title
     * @param : string $search (id of the book)
     * @return void
     */
    public function searchBook() : void
    {
        $idBook = Utils::request("id");
        $search = $_GET['book'];

        if (empty($search)) {
            throw new Exception("Le livre à afficher n'est pas précisé");
        }        

        $bookManager = new BookManager();
        $book = $bookManager->searchBook($search);

        if (empty($book)) {
            throw new Exception("Aucun livre correspondant à vos critères n'a été trouvé");
        } 

        $view = new View("Book");
        $view->render("book", ['book' => $book]);
    }




    /**
     * Edit book information for modification
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
     * Update book
     * @return void
     */

     public function updateBook() : void 
     {
        $id = Utils::request("id");
        $title = Utils::request("title");
        $author = Utils::request("author");
        $description = Utils::request("description");
        $status = Utils::request("status");
        if ($status == "notavailable"){
            $status = 0;
        } else if ($status == "available"){
            $status = 1;
        }

        $bookManager = new BookManager();
        $bookImage = $bookManager->updateBook($id, $title, $author, $description, $status);

        $b = new BookManager();
        $book = $b->getBook($id);

        $view = new View();
        $view->render("editbook", ['book' => $book]);
     }

    /**
     * Update book image
     * @param : int $id
     * @param : string $image
     * @return void
     */

     public function updateBookImage() : void 
     {
        $id = Utils::request("id");
        $image = Utils::request("image");
        $bookManager = new BookManager();
        $bookImage = $bookManager->updateBookImage($id, $image);

        $b = new BookManager();
        $book = $b->getBook($id);

        $view = new View();
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

