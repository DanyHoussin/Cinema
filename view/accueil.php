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
                    <p class="title inria-sans-bold"><?= $film["title"] ?></p>
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
    <?php foreach($requeteFilmList->fetchAll() as $film) { ?>
                <div class="posterList">
                    <div class="posterFilmList">
                        <img src="<?= $film["poster"] ?>">
                    </div>
                    <div class="infoFilmList">
                        <p class="title inria-sans-bold"><?= $film["title"] ?></p>
                        <p class="releaseDate">Date of Release : <?= $film["releaseDate"] ?></p>
                        <p class="director inria-sans-light-italic">Director : <?= $film["firstName"]." ".$film["lastName"]?></p>
                        <p class="synopsis"><?= $film["synopsis"] ?></p>
                        <a class="linkToDetail inria-sans-regular" href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>">LOOK <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>       
            <?php } ?>
        <a class="buttonMore" href="index.php?action=listFilms">More movies</a>
    </div>
</section>
<section class="latestActor">
    <h2 class="inria-sans-bold">Lastest Actors Uploaded</h2>
    <div class="LastActorsList">
    <?php foreach($requeteActorList->fetchAll() as $actor) { ?>
                <div class="actorsList">
                    <div class="profilPhotoList">
                        <img src="<?= $actor["profilPhoto"] ?>">
                    </div>
                    <div class="infoActorList">
                        <p class="name inria-sans-bold"><?= $actor["firstName"]." ". $actor["lastName"] ?></p>
                        <p class="dateBirth"><?= $actor["dateBirth"] ?></p>
                        <a class="linkToDetail inria-sans-regular" href="index.php?action=detailActeur&id=<?= $actor["id_actor"] ?>">LOOK <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>       
            <?php } ?>
            <a class="buttonMore" href="index.php?action=listActeurs">More actors</a>
    </div>
</section>

<?php
$title = "Accueil";
$title_secondaire = "Accueil";
$contenu = ob_get_clean();
require "view/template.php";
?>