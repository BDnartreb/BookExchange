<?php
    /**
     * messaging html page 
     */
?>

<div class="messaging">
    <section class="inbox">
        <h1>Messagerie</h1>
        <?php if ($_SESSION) {?>
            <div class="message-list">
                <?php foreach ($messaging as $message) {?>
                    <div class="message-card">
                        <div class="circle-avatar">
                            <img src="./images/<?= $message->getAvatarUrl() ?>">
                        </div>
                        <div class="message-text">
                            <div class="pseudo-time">
                                <?= $message->getPseudo() ?>
                                <!-- $message->getMessageDate() ?>-->
                            </div>
                            <div class="message-content">
                                <?= $message->getMessage() ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </section>
    <section class="current-message">
        <div >
            <div class="circle-avatar">
                <img src="./images/<?= $user->getAvatarUrl() ?>">
            </div>
            <div class="pseudo">
                message en cours<?= $user->getPseudo() ?>
            </div>
        </div>
        <div class="current-conversation">
            <?php foreach($messaging as $message){ ?>
                <img src="./images/<?= $message->getAvatarUrl() ?>">
                <?= $message->getMessageDate() ?>
            <?php } ?>
        </div>
        <div>
            <input class="new-message" type="text" name="message" id="message" size="30" maxlength="1500" placeholder="Tapez votre message ici" required>
            <form class="registration-form" method="get" action="#">
            
            <input class="registrate-button" type="submit" value="<?= $article->getId() ?>">

            <!--<textarea name="content" id="content" required></textarea>-->

            <input type="hidden" name="action" value="sendMessage">
            <input type="hidden" name="idArticle" value="<?= $article->getId() ?>">

            <button class="submit">Ajouter un commentaire</button>
        </div>




        </div>
    </section>
</div>