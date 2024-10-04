<?php

namespace Controller;
use Model\Connect;
$pdo = Connect::seConnecter();

class FilmController {
    
    public function ajouterFilmTraitement() {
        
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT *
            FROM director
            INNER JOIN person
            ON director.id_person = person.id_person
            ");
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
                      (:title, :releaseDate, :timeFilm, :synopsis, :rate, :poster, :id_director)");
                    
                    $stmt->bindParam(':title', $title);
                    $stmt->bindParam(':releaseDate', $releaseDate);
                    $stmt->bindParam(':timeFilm', $timeFilm);
                    $stmt->bindParam(':synopsis',$synopsis);
                    $stmt->bindParam(':rate', $rate);
                    $stmt->bindParam(':poster', $poster);
                    $stmt->bindParam(':id_director', $id_director);
            
                    $stmt->execute();
                        header("Location: index.php?action=ajouterFilm");
                    } else {
                        $_SESSION["error"] = "Erreur : veuillez fournir les informations demandées";
                        header("Location: index.php?action=ajouterFilm");
                    }
    }
    
}

    }

