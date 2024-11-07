<?php
    /**
     * messaging html page 
     */
?>

<div class="messaging">
    <section class="conversations" role="region" aria-label="liste des conversations">
        <h1>Messagerie</h1>
            <div class="conversations-list">         
                <?php foreach ($conversations as $conversation) { ?>
                    <?php if($conversation->getSenderId() != $_SESSION['user']->getId()) {
                        $contactId = $conversation->getSenderId();
                    } else {
                        $contactId = $conversation->getReceiverId();
                    } ?>

                    <?php if(Utils::request("contactid") == $contactId) { ?>
                        <div class="conversations-card-white">
                    <?php } else { ?>
                        <div class="conversations-card">
                    <?php } ?>
                        <a href="index.php?action=messaging&contactid=<?= $contactId ?>" alt="affichage de la conversation sélectionnée">
                            <div class="conversations-avatar">
                                <img src="./images/<?= $conversation->getAvatarUrl() ?>" alt="avatar du corespondant">
                            </div>
                            <div class="conversations-card-content">
                                <div class="conversations-card-pseudo-date" aria-label="pseudo du correspondant, date du message">
                                    <p class="conversations-card-pseudo"><?= $conversation->getPseudo() ?></p>
                                    <p class="conversations-card-date"><?= $conversation->getDate()->format("H:i") ?></p>
                                </div>
                                    <?php if ($conversation->getReceiverRead() === false) { ?>
                                        <div class="conversations-card-text-bold" aria-label="contenu du message">
                                    <?php } else { ?>
                                        <div class="conversations-card-text" aria-label="contenu du message">
                                    <?php } ?>
                                        <p class="overflow-ellipsis">
                                            <?= $conversation->getMessage() ?>
                                        </p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
    </section>
    <section class="current-conversation" role="region" aria-label="conversation selectionnée">
        <div class="current-conversation-avatar-pseudo" aria-label="avatar, pseudo du correspondant et messages de la conversation">
            <?php if(isset($messaging)){ ?>
                <?php foreach($messaging as $message){
                    if ($message->getSenderId() == Utils::request("contactid"))
                { ?>
                        <div class="current-conversation-avatar" aria-label="avatar et pseudo du correspondant">
                            <img src="./images/<?= $message->getAvatarUrl() ?>" alt="avatar du correspondant">
                        </div>
                        <div class="current-conversation-pseudo" aria-label="pseudo du correspondant">
                            <?php echo $message->getPseudo(); ?>
                        </div>
                    <?php break;
                    }
                } ?>
            <?php } ?>
        </div>
        <div class="messages" aria-label="messages de la conversation sélectionnée">
            <div class="messages-history">
            <?php if(isset($messaging)){ ?>
                <?php foreach($messaging as $message){ ?>
                    <div class="message" aria-label="messages">
                        <?php if($_SESSION['user']->getId() == $message->getReceiverId()){ ?>
                            <div class="message-receiver" aria-label="votre message">
                                <div class="message-avatar-date" aria-label="date du message">
                                    <img src="./images/<?= $message->getAvatarUrl() ?>" alt="avatar du correspondant">
                                    <p><?= $message->getDate()->format("d.m H:i") ?></p>
                                </div>
                                <div class="white-fieldset" aria-label="messages de la conversation sélectionnée">
                                    <?= $message->getMessage() ?>
                                </div>
                            </div>
                        <?php } else if($_SESSION['user']->getId() == $message->getSenderId()){ ?>
                            <div class="message-sender" aria-label="message du correspondant">
                                <div class="message-date" aria-label="date du message">
                                    <?= $message->getDate()->format("d.m h:i") ?>
                                </div>
                                <div class="blue-fieldset">
                                    <?= $message->getMessage() ?>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    </div>
                <?php } ?> 
            </div>
            <div class="new-message" aria-label="envoyer un nouveau message">
                <form class="new-message-form" method="post" name="addmessage" role="form">
                    
                        <label for="addmessage"></label>
                        <input type="hidden" name="addmessage" value="addmessage">
                        <input type="hidden" name="receiverId" value="<?= Utils::request("contactid") ?>">
                        <input class="white-fieldset" type="text" name="addmessage" id="addmessage" size="30" maxlength="1500" placeholder="Tapez votre message ici" required>
                        <input class="green-button" type="submit" value="Envoyer">
                    
                </form>
            </div>
        </div>   
    </section>
</div>