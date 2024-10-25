<?php
    /**
     * messaging html page 
     */
?>

<div class="messaging">
    <section class="contacts">
        <h1>Messagerie</h1>
            <div class="contact-list">
                <?php foreach ($messaging as $message) {?>
                    <?php if($message->getSenderId() == $_SESSION['user']->getId()){
                        $contactId = $message->getReceiverId();
                    } else {
                        $contactId = $message->getSenderId();
                    } ?>
                    <div class="contact-card">
                        <a href="index.php?action=messaging&contact=<?= $contactId ?>">
                            <div class="contact-avatar">
                                <img src="./images/<?= $message->getAvatarUrl() ?>">
                            </div>
                            <div class="contact-card-content">
                                <div class="contact-card-pseudo-date">
                                    <p>
                                        <?= $message->getPseudo() ?>
                                        <?= $message->getDate()->format("H-m") ?>
                                    </p>
                                </div>
                                <div class="contact-card-text">
                                    <p>
                                        <?= $message->getMessage() ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
    </section>
    <section class="conversation">
        <div class="conversation-avatar-pseudo">
            <div class="conversation-avatar">
                <img src="./images/<?= $message->getAvatarUrl() ?>">
            </div>
            <div class="conversation-pseudo">
                <?= $message->getPseudo() ?>
            </div>
        </div>
        <div class="messages">
            <div class="messages-history">
                <?php foreach($messaging as $message){ ?>
                    <div class="message">
                    <?php if($message->getReceiverId() == $contactId || $message->getSenderId() == $contactId){ ?>
                        <?php if($_SESSION['user']->getId() == $message->getReceiverId()){ ?>
                            <div class="message-receiver">
                                <div class="message-avatar-date">
                                    <img src="./images/<?= $message->getAvatarUrl() ?>">
                                    <?= $message->getDate()->format("d.m h:i") ?>
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
                <form method="get" name="addmessage"> 
                    <label for="messageText"></label>
                    <input type="hidden" name="action" value="addmessage">
                    <input type="hidden" name="receiverId" value="<?= $contactId ?>">
                    <input class="white-fieldset" type="text" name="messageText" id="messageText" size="30" maxlength="1500" placeholder="Tapez votre message ici" required>
                    <input class="green-button" type="submit" value="Envoyer">
                </form>
            </div>
        </div>
    </section>
</div>