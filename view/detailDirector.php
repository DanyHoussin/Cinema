<?php ob_start(); ?>

<?php
    foreach($requeteDirector-> fetchAll() as $director) { ?>
    <img class="profilPhoto" src="<?= $director["profilPhoto"] ?>">
    <p><?= $director["firstName"]." ".$director["lastName"] ?></p>
    <p><?= $director["gender"] ?><p>
    <p><?= $director["dateBirth"] ?><p>
    <?php
    }
    foreach($requeteFilm-> fetchAll() as $film) { ?>
    <p><?= $film["title"]." ".$film["releaseDate"] ?><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>">SEE</a></p>
    <?php } ?>

<?php

$title = "Detail du réalisateur";
$title_secondaire = "Detail du réalisateur";
$contenu = ob_get_clean();
require "view/template.php";