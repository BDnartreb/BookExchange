<?php
    /**
     * Display all the available books
     * 
     */
?>

<section class="gallery">
    <div>
        <h1>Nos livres à l'échange</h1>
        <form class="search" method="get" action="#">
            <input class="search-button" type="submit" value="search">
            <input class="book-search" type="text" name="book" id="book" placeholder="Rechercher un livre" size="30" maxlength="120">
        </form>
    </div>
    <div class="book-cards">
        <?php foreach($books as $book) { ?>
            <article class="book-card">
                <img src="./images/<?= $book->getImage() ?>">
                <div class="card-txt">
                    <h3>Titre<?= $book->getTitle() ?></h3>
                    <h4>Auteur<?= $book->getAuthor() ?></h4>
                    <p>Vendu par : <?= $book->getPseudo() ?></p>
                </div>
            </article>
        <?php } ?>
    </div>

</div>

</section>