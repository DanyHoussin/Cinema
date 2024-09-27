<?php ob_start(); ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> films</p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>TITLE</th>
            <th>DATE OF RELEASE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete-> fetchAll() as $film) { ?>
            <tr>
                <td><?= $film["releaseDate"] ?></td>
                <td><?= $film["title"] ?></td>
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