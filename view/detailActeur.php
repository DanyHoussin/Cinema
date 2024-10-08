<?php ob_start(); ?>

<?php
    foreach($requeteActor-> fetchAll() as $actor) { ?>
    <img class="profilPhoto" src="<?= $actor["profilPhoto"] ?>">
    <p><?= $actor["firstName"]." ".$actor["lastName"] ?></p>
    <p><?= $actor["gender"] ?><p>
    <p><?= $actor["dateBirth"] ?><p>
    <?php
    }
    foreach($requeteFilm-> fetchAll() as $film) { ?>
    <p><?= $film["title"]." ".$film["releaseDate"]." dans le role de : ".$film["characterName"] ?><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>">SEE</a></p>
    <?php } ?>

<?php

$title = "Detail de l'acteur";
$title_secondaire = "Detail de l'acteur";
$contenu = ob_get_clean();
require "view/template.php";