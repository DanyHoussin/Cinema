<?php ob_start(); ?>
<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> réalisateurs</p>

<a href="index.php?action=ajouterDirector">Ajouter un réalisateur</a>


<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>NAME</th>
            <th>DATE OF BIRTH</th>
            <th>GENDER</th>
            <th>PROFIL PHOTO</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete-> fetchAll() as $actor) { ?>
            <tr>
                <td><?= $actor["firstName"]." ".$actor["lastName"] ?></td>
                <td><?= $actor["dateBirth"] ?></td>
                <td><?= $actor["gender"] ?></td>
                <td><img src="<?= $actor["profilPhoto"] ?>"></td>
            </tr>
        <?php } ?> 
    </tbody>
</table>
</div>

<?php

$title = "Liste des réalisateurs";
$title_secondaire = "Liste des réalisateurs";
$contenu = ob_get_clean();
require "view/template.php";