<?php ob_start(); ?>

<section class="home">
    Page d'accueil
</section>
<section class="latestMovies">
    Les derniers films ajoutés
</section>
<section class="latestActor">
    Les derniers acteurs/actrices ajouté(e)s
</section>

<?php
$title = "Accueil";
$title_secondaire = "Accueil";
$contenu = ob_get_clean();
require "view/template.php";
?>