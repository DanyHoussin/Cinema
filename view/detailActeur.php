<?php ob_start(); ?>

<?php
    foreach($requete-> fetchAll() as $actor) { ?>
    <p><?= $actor["firstName"]." ".$actor["lastName"] ?></p>
<?php } ?>

<?php

$title = "Detail de l'acteur";
$title_secondaire = "Detail de l'acteur";
$contenu = ob_get_clean();
require "view/template.php";