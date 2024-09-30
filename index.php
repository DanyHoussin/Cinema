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
<body>
    <div id="wrapper">
        <header>
            <div>
                Logo
            </div>
            <ul>
                <li>Home</li>
                <li>News</li>
                <li>About</li>
            </ul>
        </header>
        <main>
            <section class="home">

            </section>
            <section class="latestMovies">

            </section>
            <section class="latestActor">
            
            </section>
        </main>
    </div>
</body>


<?php

use controller\CinemaController;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$ctrlCinema = new CinemaController();

$id = (isset($_GET["id"])) ? $_GET["id"] : null;

if(isset($_GET["action"])){
    switch ($_GET["action"]) {

        case "detailActeur" : $ctrlCinema->detailActeur($id); break;
        case "detailFilm" : $ctrlCinema->detailFilm($id); break;
        case "listActeurs" : $ctrlCinema->listActeurs(); break;
        case "listFilms" : $ctrlCinema->listFilms(); break;

    }
}

?>
