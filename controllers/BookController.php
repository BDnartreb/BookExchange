<?php



class BookController {

    /**
     * Displays homepage
     * @return void
     */

    public function showHome() : void
    {
        $bookManager = new BookManager();
        $books = $bookManager->getBooks();

        $view = new View("Accueil");
        $view->render("home", ['books' => $books]);
    }

    /**
     * Displays all available books in a gallery
     * @return void
     */

    public function showGallery() : void 
    {
        $bookManager = new BookManager();
        $books = $bookManager->getBooks();

        $view = new View("Gallery");
        $view->render("gallery", ['books' => $books]);
    }

/**
 * Displays information about a book
 * @return void
 */
/*public function book() : void
{

}
*/


}

