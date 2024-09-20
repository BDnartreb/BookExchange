<?php
    /**
     * Home page 
     */

?>
 <section class="welcome">
    <div>
        <h1>Rejoignez nos lecteurs passionnés</h1>
        <p>Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture. Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres.</p>
        <a class="link-button" href="index.php?action=registration">Découvrir</a>
        <!--<a class="link-button" href="#welcomeanchor">Découvrir</a>-->
    </div>
    <div>
        <img src="./images/HomePicture1.png">
    </div>
</section>
<section class="gallery">
    <div>
        <h2>Les derniers livres ajoutés</h2>
    </div>
    <div class="book-cards">
        <?php foreach($books as $book) { ?>
            <article class="book-card">
                <img src="./images/<?= $book->getImage() ?>">
                <div class="card-txt">
                    <h3><?= $book->getTitle() ?></h3>
                    <h4><?= $book->getAuthor() ?></h4>
                    <p>Vendu par : <?= $book->getPseudo() ?></p>
                </div>
            </article>
        <?php } ?>
    </div>
    <div>
        <a class="link-button" href="index.php?action=gallery">Voir tous les livres</a>
    </div>
</section>
<section class="instructions">
<div>
        <h2 id="welcomeanchor">Comment ça marche ?</h2>
        <p> Echanger des livres avec TomTroc c'est simple et amusant ! Suivez ces étapes pour commencer :</p>
    </div>
    <div class="steps">
        <article class="step">
            <p>Inscrivez-vous gratuitement sur notre plateforme.</p>
            <p>Ajoutez les livres que vous souhaitez échanger à votre profil.</p>
            <p>Parcourez les livres disponibles chez d'autres membres.</p>
            <p>Proposez un échange et discutez avec d'autres passionnés de lecture.</p>
        </article>
    </div>
    <div>
        <a class="link-button" href="index.php?action=gallery">Voir tous les livres</a>
    </div>
    <div>
        <img src="./images/HomePicture2-Desk.png" class="home-picture-2">
    </div>
</section>
<section class="values">
    <div>
        <h2>Nos valeurs</h2>
        <p>Chez Tom Troc, nous mettons l'accent sur le partage, la découverte et la communauté.
            Nos valeurs sont ancrées dans notre passion pour les livres et notre désir de créer des liens entre les lecteurs.
            Nous croyons en la puissance des histoires pour rassembler les gens et inspirer des conversations enrichissantes.
        </p>
        <p>Notre association a été fondée avec unne conviction profonde : chaque livre métite d'être lu et partagé
        </p>
        <p>Nous sommes passionnés par la création d'une plateforme conviviale qui permet aux lestuers de se connnecter, 
            de partager leurs découvertes littéraires et d'échanger des livres qui attendent patiemment sur les étagères.
        </p>
    </div>
    <div class="signature" >
        <p>L'équipe Tom Troc</p>
        <img src=""> 
        <svg width="122" height="104" viewBox="0 0 122 104" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1 96.2224V96.2224C2.29696 95.8216 6.2879 96.4842 7.64535 96.4785C34.2391 96.3656 77.2911 74.6923 96.4064 56.0062C109.127 40.7664 119.928 7.80529 85.8057 2.24352C65.0283 -1.1431 50.1873 26.7966 62.0601 33.1465C66.0177 35.2631 78.258 25.6112 65.0283 12.4034C51.7986 -0.804455 39.7279 0.126873 35.3463 2.24352C15.417 7.74679 2.27208 42.7137 71.8127 87.7558C96.4064 103.685 121 102.996 121 102.996" stroke="#00AC66" stroke-width="2" stroke-linecap="round"/>
</svg>

    </div>
</section>

</div>