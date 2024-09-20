<section class="inbox">
    <h1>Messagerie</h1>
    <div class="message-list">
        <?php foreach ($messages as $message) {?>
            <div class="message-card">
                <div class="circle-avatar">
                    <img src="./images/<?= $messaging->getAvatarUrl() ?>">
                </div>
                <div class="message-text">
                    <div class="pseudo-time">
                        <?= $messaging->getPseudo() ?>
                        <?= $messaging->getDate() ?>
                    </div>
                    <div class="message-content">
                        <?= $messaging->getMessage() ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
<section class="current-message">
    <div >
        <div class="circle-avatar">
            <img src="./images/<?= $messaging->getAvatarUrl() ?>">
        </div>
        <div class="pseudo">
            <?= $messaging->getPseudo() ?>
        </div>
    </div>
    <div class="current-conversation">
        <?php foreach($messages as $message){ ?>
            <img src="./images/<?= $messaging->getAvatarUrl() ?>">
            <img src="./images/<?= $messaging->getDate() ?>">
        <?php } ?>
    </div>
    <div>
        <input class="new-message" type="text" name="message" id="" size="30" maxlength="1500" placeholder="Tapez votre message ici">
        <form class="registration-form" method="get" action="#">
        
        <input class="registrate-button" type="submit" value="Envoyer">
    </div>


</section>