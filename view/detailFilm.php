<?php ob_start(); ?>

<?php
    foreach($requete-> fetchAll() as $film) { ?>
    <p><?= $film["title"]." ".$film["releaseDate"] ?></p>
<?php } ?>

<?php

$title = "Detail du Film";
$title_secondaire = "Detail du Film";
$contenu = ob_get_clean();
require "view/template.php";