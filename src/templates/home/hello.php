<h1> Demander en amis ? </h1>


<?php foreach($params['notMyFriends'] as $key => $value): ?>
    <?= $value['nom']; ?> <?= $value['prenom']; ?> - <a href="?page=sendRequest&id=<?= $value['id'] ?>"> Demander en ami </a> <br />
<?php endforeach; ?>

<h2> Mes attentes </h2>

<?php foreach($params['myRequestFriends'] as $key => $value): ?>
    <?= $value['nom']; ?> <?= $value['prenom']; ?> - <a href="?page=cancelRequestFriend&id=<?= $value['id'] ?>"> Annuler la demande </a> <br />
<?php endforeach; ?>

<?php foreach($params['myRequestFriendReceived'] as $key => $value): ?>
    <?= $value['nom']; ?> <?= $value['prenom']; ?> - <a href="?page=acceptRequestFriend&id=<?= $value['id'] ?>"> Accepter la demande </a> <br />
<?php endforeach; ?>

<h2> Amis </h2>


<?php foreach($params['myFriends'] as $key => $value): ?>
    <?= $value['nom']; ?> <?= $value['prenom']; ?> <br />
<?php endforeach; ?>