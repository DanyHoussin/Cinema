<?php ob_start(); ?>

<?php
    foreach($requete-> fetchAll() as $director) { ?>
    <p><?= $director["firstName"]." ".$director["lastName"] ?></p>
<?php } ?>

<?php

$title = "Detail du réalisateur";
$title_secondaire = "Detail du réalisateur";
$contenu = ob_get_clean();
require "view/template.php";