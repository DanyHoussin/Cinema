<p> <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="public/css/style.css">
    <title>Cinema</title>
</head>



<?php

use controller\CinemaController;
use controller\ActeurController;
use controller\DirectorController;
use controller\FilmController;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$ctrlCinema = new CinemaController();
$ctrlActeur = new ActeurController();
$ctrlDirector = new DirectorController();
$ctrlFilm = new FilmController();

$id = (isset($_GET["id"])) ? $_GET["id"] : null;

if(isset($_GET["action"])){
    switch ($_GET["action"]) {

        case "accueil" : $ctrlCinema->accueil(); break;
        case "ajouterActeur" : $ctrlCinema->ajouterActeur(); break;
        case "ajouterActeurTraitement" : $ctrlActeur->ajouterActeurTraitement(); break;
        case "ajouterDirector" : $ctrlCinema->ajouterDirector(); break;
        case "ajouterDirectorTraitement" : $ctrlDirector->ajouterDirectorTraitement(); break;
        case "ajouterFilm" : $ctrlCinema->ajouterFilm(); break;
        case "ajouterFilmTraitement" : $ctrlFilm->ajouterFilmTraitement(); break;
        case "detailActeur" : $ctrlCinema->detailActeur($id); break;
        case "detailDirector" : $ctrlCinema->detailDirector($id); break;
        case "detailFilm" : $ctrlCinema->detailFilm($id); break;
        case "modifierFilm" : $ctrlFilm->modifierFilm($id); break;
        case "modifierFilmTraitement" : $ctrlFilm->modifierFilmTraitement($id); break;
        case "modifierActor" : $ctrlActeur->modifierActor($id); break;
        case "modifierActorTraitement" : $ctrlActeur->modifierActorTraitement($id); break;
        case "modifierDirector" : $ctrlDirector->modifierDirector($id); break;
        case "modifierDirectorTraitement" : $ctrlDirector->modifierDirectorTraitement($id); break;
        case "supprimerFilm" : $ctrlFilm->supprimerFilm($id); break;
        case "editCasting" : $ctrlFilm->editCasting(); break;
        case "editCastingTraitement" : $ctrlFilm->editCastingTraitement(); break;
        case "listActeurs" : $ctrlCinema->listActeurs(); break;
        case "listDirectors" : $ctrlCinema->listDirectors(); break;
        case "listFilms" : $ctrlCinema->listFilms(); break;

    }
} else {
    header("Location: index.php?action=accueil");
}

?>
