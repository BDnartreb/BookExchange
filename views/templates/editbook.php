<?php
    /**
     * To modify book information
     * 
     */
?>
<div>
    <a href="index.php?action=userinfo"><- retour</a>
    <h1>Modifier les informations</h1>
    <section class="editbook">
            <div class="editbook-picture">
                <p>Photo</p> 
                <img src="./images/<?= $book->getImage() ?>" alt="">
                <a href="index.php?action=editbook&id=<?= $book->getId() ?>&modif=1" alt="Modifier la photo du livre">Modifier la photo</a>
                <?php if(isset($_GET['modif']) && $_GET['modif'] == 1) { ?>
                    <form method="get" action="">
                    <label for="image"></label> 
                        <select name="image" id="image">
                            <?php $scandir = scandir("C:/xampp/htdocs/tests/Projet6/BookExchange/images");
                            foreach($scandir as $fichier){
                            echo "<option>$fichier</option>";
                            }?>
                        </select>
                        <input type="hidden" name="action" value="updatebookimage">
                        <input type="hidden" name="id" value="<?= $book->getId() ?>">
                        <input class="registrate-button" type="submit" value="Valider">
                    </form>
                <?php } ?>
            </div>
            <div class="editbook-form">
                <form method="get" action="#">
                <label for="title"><p>Titre</p></label>
                <input class="blue-fieldset" type="text" name="title" id="title" size="30" maxlength="120" value="<?= $book->getTitle() ?>">
                
                <label for="author"><p>Auteur</p></label>
                <input class="blue-fieldset" type="text" name="author" id="author" size="30" maxlength="120" value="<?= $book->getAuthor() ?>">
                        
                <label for="description"><p>Commentaire</p></label>
                <input class="blue-fieldset" type="text" name="description" id="description" size="30" maxlength="120" value="<?= $book->getDescription() ?>">
                
                <label for="status"><p>Disponibilité</p></label>
                    <select class="blue-fieldset" name="status" id="status">
                        <?php if($book->getStatus() == 1){ ?>
                            <option value="available" selected>Disponible</option>
                            <option value="notavailable">Non Disponible</option>
                        <?php } else { ?>
                            <option value="available">disponible</option>
                            <option value="notavailable" selected>non dispo.</option>
                        <?php } ?>
                    </select>
                    <input type="hidden" name="action" value="updatebook">
                    <input type="hidden" name="id" value="<?= $book->getId() ?>">
                    <input class="green-button" type="submit" value="Valider">
                </form>
            </div>
        </div>
    </section>
</div>