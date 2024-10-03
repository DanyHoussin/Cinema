<?php
session_start();
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "cinema_dany";

$pdo = new mysqli($servername, $username, $password, $dbname);

if(isset($_POST['submit'])){
    
    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $synopsis = filter_input(INPUT_POST, "synopsis", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if($title && $synopsis){
        $title = $_POST['title'];
        $releaseDate = $_POST['releaseDate'];
        $timeFilm = $_POST['timeFilm'];
        $synopsis = $_POST['synopsis'];
        $rate = $_POST['rate'];
        $poster = $_POST['poster'];
        $id_director = $_POST['director'];

        $stmt = $pdo->prepare("
        INSERT INTO film (title, releaseDate, timeFilm, synopsis, rate, poster, id_director)
         VALUES 
          (?, ?, ?, ?, ?, ?, ?)");
        
        $stmt->bind_param('sssssss', $title, $releaseDate, $timeFilm, $synopsis, $rate, $poster, $id_director);
    
        $stmt->execute();
            header("Location: index.php?action=ajouterFilm");
        }

    } else {
        $_SESSION["error"] = "Erreur : veuillez fournir les informations demandées";
        header("Location: index.php?action=ajouterFilm");
    }

