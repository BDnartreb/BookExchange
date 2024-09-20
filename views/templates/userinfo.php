<?php
    /**
     * Display user information page
     * 
     */
?>

<section class="userinfo">
    <h1>Mon compte</h1>
    <div class="user_personnal_info">
        <div class="user-visitcard">
            <img src="" alt=""><!--avatarUrl-->
            <p>modifier</p>
            <h2>AJOUTER Pseudo</h2>
            <p>Membre depuis AJOUTER DUREE </p>
            <p>BIBLIOTHEQUE</p>
            <p>icone_livres AJOUTER NOMBRE livres</p>
        </div>
        <div class="modif-info">
            <h2>Vos informations personnelles</h2>
            <p>Adresse email</p>
            <form class="" method="get" action="#">
            <input class="" type="text" name="email" id="" size="30" maxlength="120">
            <p>Mot de passe</p>
            <form class="" method="get" action="#">
            <input class="" type="text" name="password" id="" size="30" maxlength="120">
            <p>Pseudo</p>
            <form class="" method="get" action="#">
            <input class="" type="text" name="pseudo" id="" size="30" maxlength="120">
        
            <input class="registrate-button" type="submit" value="Enregistrer">

            </form>
        </div>
    </div>
    <div class="user-books">
        <div class="user-book-image">PHOTO</div>
        <div class="user-book-title">TITRE</div>
        <div class="user-book-author">AUTEUR</div>
        <div class="user-book-description">DESCRITPION</div>
        <div class="user-book-available">DISPONIBILITE</div>
        <div class="user-book-action">ACTION</div>

        <?php foreach($books as $key=>$book) { 
            if ($key%2==0) {
                echo "<div class=\"user-books evenline\">";
            } else {
                echo "<div class=\"user-books\">";
            } ?>           
                <div <?= $book->getAvatarUrl() ?> ></div>
                <div <?= $book->getTitle() ?> ></div>
                <div <?= $book->getAuthor() ?> ></div>
                <div <?= $book->getDescription() ?> ></div>
                <?php
                    if ($book->getStatus() == 1) {
                        echo "<div class=\"status status-on\">disponible</div>";
                    } else {
                        echo "<div class=\"status status-off\">non dispo.</div>";
                    }
                ?>
                <div>
                    <a href="index.php?action=editbook">Editer</a>
                    <a href="index.php?action=home">Supprimer</a>
                </div>
            </div>
        <?php } ?>

    </div>


</div>

</section>