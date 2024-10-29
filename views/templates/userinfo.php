<?php
    /**
     * Display user information page
     * 
     */
?>

<div class="userinfo">
    <h1>Mon compte</h1>
    <section class="user_personnal_info">
        <div class="visitcard">
            <img src="./images/<?= $user->getAvatarUrl() ?>" alt="">
            <a class="standard-link" href="index.php?action=userinfo&modif=1" alt="Modifier avatar du user">modifier</a>
            <?php if(isset($_GET['modif']) && $_GET['modif'] == 1){ ?>
                <form method="get" action="">
                    <label for="avatar"></label> 
                    <select name="avatar" id="avatar">
                        <?php $scandir = scandir("C:/xampp/htdocs/tests/Projet6/BookExchange/images");
                        foreach($scandir as $fichier){
                        echo "<option>$fichier</option>";
                        }?>
                    </select>
                    <input type="hidden" name="action" value="updateuseravatar">
                    <input type="hidden" name="" value="">
                    <input class="registrate-button" type="submit" value="Valider">
                </form>
            <?php } ?>
            
            
            
            
            <p class="pseudo"><?= $user->getPseudo() ?></p>
            <p class="member-until">Membre depuis <?= $dateInterval ?> </p>
            <p class="bibliotheque">BIBLIOTHEQUE</p>
            <p class="user-book-number">
                <svg width="11" height="14" viewBox="0 0 11 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.46556 0.160154L7.2112 0.00251429C6.65202 -0.0365878 6.16701 0.385024 6.12791 0.944207L5.32192 12.4705C5.28281 13.0296 5.70442 13.5147 6.26361 13.5538L8.51796 13.7114C9.07715 13.7505 9.56215 13.3289 9.60125 12.7697L10.4072 1.24345C10.4464 0.684262 10.0247 0.199256 9.46556 0.160154ZM6.84113 0.99408C6.85269 0.828798 6.99605 0.70418 7.16133 0.715737L9.41568 0.873377C9.58096 0.884935 9.70558 1.02829 9.69403 1.19357L8.88803 12.7198C8.87647 12.8851 8.73312 13.0097 8.56783 12.9982L6.31348 12.8405C6.1482 12.829 6.02358 12.6856 6.03514 12.5203L6.84113 0.99408Z" fill="#292929"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.27482 0.0648067H1.01496C0.454414 0.0648067 0 0.519224 0 1.07977V12.6342C0 13.1947 0.454416 13.6491 1.01496 13.6491H3.27482C3.83537 13.6491 4.28979 13.1947 4.28979 12.6342V1.07977C4.28979 0.519221 3.83537 0.0648067 3.27482 0.0648067ZM0.714965 1.07977C0.714965 0.914086 0.849279 0.779771 1.01496 0.779771H3.27482C3.44051 0.779771 3.57482 0.914086 3.57482 1.07977V12.6342C3.57482 12.7999 3.44051 12.9342 3.27482 12.9342H1.01496C0.849279 12.9342 0.714965 12.7999 0.714965 12.6342V1.07977Z" fill="#292929"/>
                </svg>
                <?= $user->getBookCount() ?> livres
            </p>
        </div>    
        <div class="modif-card">
            <div class="modif">
                <h2>Vos informations personnelles</h2>
                <form class="modif-form" method="get" action="#">
                    <div>
                        <label for="email"><p>Adresse email</p></label>   
                        <input class="blue-fieldset" type="text" name="email" id="email" required size="30" maxlength="120" value="<?= $user->getEmail() ?>">
                        <label for="password"><p>Mot de passe</p></label>   
                        <input class="blue-fieldset" type="text" name="password" id="password" required size="30" maxlength="120" placeholder="***********">
                        <label for="pseudo"><p>Pseudo</p></label>   
                        <input class="blue-fieldset" type="text" name="pseudo" id="pseudo" required size="30" maxlength="120" value="<?= $user->getPseudo() ?>">
                    </div>
                    <div class="submit-button">
                        <input type="hidden" name="action" value="updateuserinfo">
                        <input class="grey-button grey-button-text" type="submit" value="Enregistrer">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="book-list">
        <div class="book-list-title">
            <div class="list-title">PHOTO</div>
            <div class="list-title">TITRE</div>
            <div class="list-title">AUTEUR</div>
            <div class="list-title">DESCRITPION</div>
            <div class="list-title">DISPONIBILITE</div>
            <div class="list-title">ACTION</div>
        </div>
        <div class="lines"> 
            <?php foreach($books as $key=>$book) { 
                if ($key%2==0) {
                    echo "<div class=\"line evenline\">";
                } else {
                    echo "<div class=\"line oddline\">";
                } ?>           
                    <div class="book-image"> <img src="./images/<?= $book->getImage() ?>"> </div>
                    <div class="book-title"> <?= $book->getTitle() ?> </div>
                    <div class="book-author"> <?= $book->getAuthor() ?> </div>
                    <div class="book-description"> <?= $book->getDescription() ?> </div>
                    <div class="book-status">
                        <?php
                            if ($book->getStatus() == 1) {
                                echo "<div  class=\"status status-on\">disponible</div>";
                            } else {
                                echo "<div class=\"status status-off\">non dispo.</div>";
                            }
                        ?>
                    </div>
                    <div class="book-action">
                        <a href="index.php?action=editbook&id=<?= $book->getId() ?>">Editer</a>
                        <a href="index.php?action=deletebook&id=<?= $book->getId() ?>" <?= Utils::askConfirmation("Êtes-vous sûr de vouloir supprimer ce livre ?") ?>>Supprimer</a>
                    </div>
            <?php } ?>
        </div>
    </section>
</div>