<?php
    /**
     * messaging html page 
     */
?>

<div class="messaging">
    <section class="conversations">
        <h1>Messagerie</h1>
            <div class="conversations-list">         
                <?php foreach ($conversations as $conversation) {?>
                    <div class="conversations-card">
                        <a href="index.php?action=messaging&contactid=<?= $conversation->getSenderId() ?>">
                            <div class="conversations-avatar">
                                <img src="./images/<?= $conversation->getAvatarUrl() ?>">
                            </div>
                            <div class="conversations-card-content">
                                <div class="conversations-card-pseudo-date">
                                    <p class="conversations-card-pseudo"><?= $conversation->getPseudo() ?></p>
                                    <p class="conversations-card-date"><?= $conversation->getDate()->format("H.m") ?></p>
                                </div>
                                <div class="conversations-card-text">
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
    <section class="current-conversation">
        <div class="current-conversation-avatar-pseudo">
            <?php if(isset($messaging)){ ?>
                <?php foreach($messaging as $message){
                    if ($message->getSenderId() !== $user->getId()){ ?>
                        <div class="current-conversation-avatar">
                            <img src="./images/<?= $message->getAvatarUrl() ?>">
                        </div>
                        <div class="current-conversation-pseudo">
                            <?php echo $message->getPseudo(); ?>
                        </div>
                    <?php break;
                    }
                } ?>
            <?php } ?>
        </div>
        <div class="messages">
            <div class="messages-history">
            <?php if(isset($messaging)){ ?>
                <?php foreach($messaging as $message){ ?>
                    <div class="message">
                        <?php if($_SESSION['user']->getId() == $message->getReceiverId()){ ?>
                            <div class="message-receiver">
                                <div class="message-avatar-date">
                                    <img src="./images/<?= $message->getAvatarUrl() ?>">
                                    <p><?= $message->getDate()->format("d.m h:i") ?></p>
                                </div>
                                <div class="white-fieldset">
                                    <?= $message->getMessage() ?>
                                </div>
                            </div>
                        <?php } else if($_SESSION['user']->getId() == $message->getSenderId()){ ?>
                            <div class="message-sender">
                                <div class="message-date">
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
            <div class="new-message">
                <form method="post" name="addmessage"> 
                    <label for="messageText"></label>
                    <input type="hidden" name="action" value="addmessage">
                    <input type="hidden" name="receiverId" value="<?= Utils::request("contactid") ?>">
                    
                    <input class="white-fieldset" type="text" name="messageText" id="messageText" size="30" maxlength="1500" placeholder="Tapez votre message ici" required>
                    <input class="green-button" type="submit" value="Envoyer">
                </form>
            </div>
        </div>
       
    </section>
</div>