<?php ob_start(); ?>

<section class="home">
    <p>Page d'accueil et affiche</p>
    <div class="affiche">
        <article>
            <img class="affichePoster">
            <
        </article>
    </div>
</section>
<section class="latestMovies">
    <p>Les derniers films ajoutés</p>
</section>
<section class="latestActor">
    <p>Les derniers acteurs/actrices ajouté(e)s</p>
</section>

<?php
$title = "Accueil";
$title_secondaire = "Accueil";
$contenu = ob_get_clean();
require "view/template.php";
?>