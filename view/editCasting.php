<?php ob_start(); ?>


<form action="index.php?action=editCastingTraitement" method="post">
    <p>
    <label>
            Film :
            <select name="film" class="form-control">
                <?php
                foreach($requeteFilm-> fetchAll() as $film) { ?>
                    <option value="<?= $film["id_film"] ?>"><?= $film["title"]?></option>
                <?php } ?> <br>
            </select>
        </label>
    </p>
    <p>
    <label>
            Acteur :
            <select name="actor" class="form-control">
                <?php
                foreach($requeteActor-> fetchAll() as $actor) { ?>
                    <option value="<?= $actor["id_actor"] ?>"><?= $actor["firstName"]." ".$actor["lastName"] ?></option>
                <?php } ?> <br>
            </select>
        </label>
    </p>
    <p>
        <label>
            Role :
            <input type="text" name="role" class="form-control">
        </label>
    </p>
    <p>
        <input type="submit" class="btn btn-success" name="submit" value="Ajouter">
    </p>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<?php

$title = "Edit casting";
$title_secondaire = "Edit casting";
$contenu = ob_get_clean();
require "view/template.php";