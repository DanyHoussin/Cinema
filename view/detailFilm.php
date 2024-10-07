<?php ob_start(); ?>

<?php
    foreach($requeteFilm-> fetchAll() as $film) { ?>
    <img src="<?= $film["poster"]?>" alt="poster">
    <p>Title : <?= $film["title"]?></p>
    <p>Date of release : <?= $film["releaseDate"]?></p>
    <p>Time (in minutes) : <?= $film["timeFilm"]?></p>
    <p>Synopsis : <?= $film["synopsis"]?></p>
    <p>Rate : <?= $film["rate"]?></p>
    <p>Director : <?= $film["firstName"]." ".$film["lastName"]?></p>
    <p>Actor :</p>
    <?php
    foreach($requeteActor-> fetchAll() as $actor) { ?>
    <p><?= $actor["firstName"]." ".$actor["lastName"]." dans le role de ".$actor["characterName"] ?><a href="index.php?action=detailActeur&id=<?= $actor["id_actor"] ?>">SEE</a> </p>
    <?php } ?>
    <a href="index.php?action=modifierFilm&id=<?= $film["id_film"] ?>">EDIT</a> 
    <?php } ?>
        

<?php

$title = "Detail du Film";
$title_secondaire = "Detail du Film";
$contenu = ob_get_clean();
require "view/template.php";