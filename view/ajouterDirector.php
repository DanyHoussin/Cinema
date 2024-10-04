
<h1>Ajouter un réalisateur</h1>

<!-- Fichier à atteindre lorsque qu'on soumet le formulaire avec la méthode http -->
<form action="index.php?action=ajouterDirectorTraitement" method="post">
    <p>
        <label>
            Prénom du Realisateur :
            <input type="text" name="firstName" class="form-control" maxlength="255">
        </label>
    </p>
    <p>
        <label>
            Nom du Realisateur :
            <input type="text"  name="lastName" class="form-control" maxlength="255">
        </label>
    </p>
    <p>
        <label>
            Genre du Realisateur :
            <input type="text" name="gender" class="form-control">
        </label>
    </p>
    <p>
        <label>
            Date de naissance du Realisateur :
            <input type="date" name="dateBirth" class="form-control">
        </label>
    </p>
    <p>
        <label>
            Photo de profil (lien) :
            <input type="text" name="profilPhoto" class="form-control">
        </label>
    </p>
    <p>
        <input type="submit" class="btn btn-success" name="submit" value="Ajouter">
    </p>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<?php 

if(!isset($_SESSION['message']) || empty($_SESSION['message'])){
    echo "";
} else {
    echo "<p class='success'>".$_SESSION["message"]."</p>"; 
    unset($_SESSION["message"]);
}

if(!isset($_SESSION['error']) || empty($_SESSION['error'])){
    echo "";
} else {
    echo "<p class='error'>".$_SESSION["error"]."</p>";  
    unset($_SESSION["error"]);
}


$title = "Ajouter un(e) Realisateur";
$title_secondaire = "Ajouter un(e) Realisateur";
$contenu = ob_get_clean();
require "view/template.php";
?>
