<?php ob_start(); ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> films</p>

<a href="index.php?action=ajouterFilm">Ajouter un Film</a>
<a href="">Edit casting</a>
<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>TITLE</th>
            <th>DATE OF RELEASE</th>
            <th>POSTER</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete-> fetchAll() as $film) { ?>
            <tr>
                <td><?= $film["title"] ?></td>
                <td><?= $film["releaseDate"] ?></td>
                <td><img src="<?= $film["poster"]?>" alt="poster"></td>
                <td><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>">MORE</a></td>
                <td><a href="index.php?action=modifierFilm&id=<?= $film["id_film"] ?>">EDIT</a></td>
                <td><a href="index.php?action=supprimerFilm&id=<?= $film["id_film"] ?>">DELETE</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>

<?php

$title = "Liste des films";
$title_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";