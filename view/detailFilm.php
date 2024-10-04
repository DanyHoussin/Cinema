<?php ob_start(); ?>

<?php
    foreach($requeteFilm-> fetchAll() as $film) { ?>
    <p><?= $film["title"]?></p>
    <img src="<?= $film["poster"]?>" alt="poster">
    <p><?= $film["releaseDate"]?></p>
    <p><?= $film["timeFilm"]?></p>
    <p><?= $film["synopsis"]?></p>
    <p><?= $film["rate"]?></p>
    <p>Director : <?= $film["firstName"]." ".$film["lastName"]?></p>
    <p>Actor :</p>
    <?php
    }
    foreach($requeteActor-> fetchAll() as $actor) { ?>
    <p><?= $actor["firstName"]." ".$actor["lastName"]." dans le role de ".$actor["characterName"] ?></p>
    <?php } ?>


<?php

$title = "Detail du Film";
$title_secondaire = "Detail du Film";
$contenu = ob_get_clean();
require "view/template.php";