<?php ob_start(); ?>
<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> acteurs</p>

<a href="index.php?action=ajouterActeur">Ajouter un(e) acteur/actrice</a>

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
                <td><a href="index.php?action=detailActeur&id=<?= $actor["id_actor"] ?>">MORE</a></td>
            </tr>
        <?php } ?> 
    </tbody>
</table>
</div>

<?php

$title = "Liste des acteurs";
$title_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";