<?php ob_start(); ?>

<section class="home">
    <div class="affiche">
        <article class="affichePoster">
            <?php if($film = $requeteAffiche->fetch()) { ?>
                <div class="poster">
                    <img src="<?= $film["poster"] ?>">
                </div>
                <div class="infoAffiche">
                    <p class="">Director : <?= $film["firstName"]." ".$film["lastName"] ?></p>
                    <p class="synopsis"><?= $film["synopsis"] ?></p>
                    <div class="viewButton">
                        <a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>">VIEW</a>
                    </div>
                </div>
                <?php } ?>
        </article>
    </div>
        <div class="welcomeBack">
            <h2>Welcome back !</h2>
            <h2>What film did you watch ?...</h2>
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