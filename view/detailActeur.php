<?php ob_start(); ?>

<?php
    foreach($requeteActor-> fetchAll() as $actor) { ?>
    <p><?= $actor["firstName"]." ".$actor["lastName"] ?></p>
    <?php
    }
    foreach($requeteFilm-> fetchAll() as $film) { ?>
    <p><?= $film["title"]." ".$film["releaseDate"]." ".$film["characterName"] ?></p>
    <?php } ?>

<?php

$title = "Detail de l'acteur";
$title_secondaire = "Detail de l'acteur";
$contenu = ob_get_clean();
require "view/template.php";