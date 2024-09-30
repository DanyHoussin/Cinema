<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> acteurs</p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>NAME</th>
            <th>DATE OF BIRTH</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete-> fetchAll() as $actor) { ?>
            <tr>
                <td><?= $actor["firstName"]." ".$actor["lastName"] ?></td>
                <td><?= $actor["birthDate"] ?></td>
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