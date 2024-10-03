
<?php session_start();?>
<h1>Ajouter un film</h1>

<!-- Fichier à atteindre lorsque qu'on soumet le formulaire avec la méthode http -->
<form action="index.php?action=ajouterFilmTraitement" method="post">
    <p>
        <label>
            Titre du film :
            <input type="text" name="title" class="form-control">
        </label>
    </p>
    <p>
        <label>
            Date de sortie du film :
            <input type="date"  name="releaseDate" class="form-control">
        </label>
    </p>
    <p>
        <label>
            Durée du film (en minutes) :
            <input type="number" name="timeFilm" class="form-control" min="1" max="999" step="1" value="1">
        </label>
    </p>
    <p>
        <label>
            Synopsis du film :
            <input type="text" name="synopsis" class="form-control">
        </label>
    </p>
    <p>
        <label>
            Note (sur 5) :
            <input type="number" name="rate" class="form-control" min="0" max="5" step="0.1" value="0">
        </label>
    </p>
    <p>
        <label>
            Affiche du film (lien) :
            <input type="text" name="poster" class="form-control">
        </label>
    </p>
    <p>
        <label>
            Réalisateur :
            <select name="director" class="form-control">
                <?php
                foreach($requete-> fetchAll() as $director) { ?>
                    <option value="<?= $director["id_director"] ?>"><?= $director["firstName"]." ".$director["lastName"] ?></option>
                <?php } ?> <br>
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


$title = "Ajouter un Film";
$title_secondaire = "Ajouter un Film";
$contenu = ob_get_clean();
require "view/template.php";
?>
