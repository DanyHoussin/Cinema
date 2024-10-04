<?php ob_start(); ?>

<?php
    foreach($requeteDirector-> fetchAll() as $director) { ?>
    <p><?= $director["firstName"]." ".$director["lastName"] ?></p>
    <?php
    }
    foreach($requeteFilm-> fetchAll() as $film) { ?>
    <p><?= $film["title"]." ".$film["releaseDate"] ?></p>
    <?php } ?>

<?php

$title = "Detail du réalisateur";
$title_secondaire = "Detail du réalisateur";
$contenu = ob_get_clean();
require "view/template.php";