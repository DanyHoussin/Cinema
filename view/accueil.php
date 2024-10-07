<?php ob_start(); ?>

<section class="home">
    <div class="affiche">
        <div class="welcomeBack">
            <h2 class="inria-sans-bold">Welcome back !</h2>
            <h2 class="inria-sans-light-italic">What film did you watch ?...</h2>
        </div>
        <article class="affichePoster">
            <?php if($film = $requeteAffiche->fetch()) { ?>
                <div class="poster">
                    <img src="<?= $film["poster"] ?>">
                </div>
                <div class="infoAffiche">
                    <p class="">Director : <?= $film["firstName"]." ".$film["lastName"] ?></p>
                    <p class="synopsis"><?= $film["synopsis"] ?></p>
                    <div class="viewButton">
                        <a class="inria-sans-regular" href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>">WATCH <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                <?php } ?>
        </article>
    </div>
</section>
<section class="latestMovies">
    <h2 class="inria-sans-bold">Lastest Movies Uploaded</h2>
    <div class="LastFilmslist">
    <?php if($film = $requeteFilm->fetch()) { ?>
                <div class="poster">
                    <img src="<?= $film["poster"] ?>">
                </div>
               
                <?php } ?>
    </div>
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