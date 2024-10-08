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
                    $_SESSION["error"] = "Succès : Ajout réussi !";
                    header("Location: index.php?action=ajouterFilm");
                } else {
                    $_SESSION["error"] = "Erreur : veuillez fournir les informations demandées";
                    header("Location: index.php?action=ajouterFilm");
                }
            }
    }

    public function modifierFilm($id) {
        $pdo = Connect::seConnecter();
        $requeteFilm = $pdo->prepare("
        SELECT DISTINCT film.id_film, title, releaseDate, timeFilm, synopsis, rate, poster, director.id_director, firstName, lastName
        FROM film
        INNER JOIN director
        ON film.id_director = director.id_director
        INNER JOIN person
        ON director.id_person = person.id_person
        WHERE film.id_film = :id");
        $requeteFilm-> execute(["id" => $id]);
        $requeteDirector = $pdo->query("
        SELECT *
        FROM director
        INNER JOIN person
        ON director.id_person = person.id_person
        ");
        require "view/modifierFilm.php";
    }

    public function modifierFilmTraitement($id) {
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
                    UPDATE film
                    SET title = :title,
                        releaseDate = :releaseDate,
                        timeFilm = :timeFilm, 
                        synopsis = :synopsis,
                        rate = :rate,
                        poster = :poster,
                        id_director = :id_director
                    WHERE film.id_film = :id
                    ");
                    
                    $stmt->bindParam(':title', $title);
                    $stmt->bindParam(':releaseDate', $releaseDate);
                    $stmt->bindParam(':timeFilm', $timeFilm);
                    $stmt->bindParam(':synopsis',$synopsis);
                    $stmt->bindParam(':rate', $rate);
                    $stmt->bindParam(':poster', $poster);
                    $stmt->bindParam(':id_director', $id_director);
                    $stmt->bindParam(':id', $id);
                    $stmt->execute();
                    $_SESSION["error"] = "Succès : modification réussi !";
                    header("Location: index.php?action=detailFilm&id=$id");
                } else {
                    $_SESSION["error"] = "Erreur : veuillez fournir les informations demandées";
                    header("Location: index.php?action=modifierFilm&id=$id");
                }
            }
    }


    public function supprimerFilm($id) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            DELETE FROM film
            WHERE film.id_film = :id
            ");
        $requete-> execute(["id" => $id]);
        header("Location: index.php?action=listFilms");
    }

    public function editCasting() {
        
        $pdo = Connect::seConnecter();
        $requeteFilm = $pdo->query("
            SELECT *
            FROM film
            ");
        $requeteActor = $pdo->query("
            SELECT *
            FROM actor
            INNER JOIN person
            ON actor.id_person = person.id_person
            ");
        require "view/editCasting.php";
    }

    public function editCastingTraitement() {
        
        $pdo = Connect::seConnecter();
        $requeteActor = $pdo->query("
        SELECT *
        FROM actor
        INNER JOIN person
        ON actor.id_person = person.id_person
        ");
            if(isset($_POST['submit'])){
                
                $role = filter_input(INPUT_POST, "role", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                if($role){
                    $id_film = $_POST['film'];
                    $id_actor = $_POST['actor'];
                    $role = $_POST['role'];

                    $stmtr = $pdo->prepare("
                    INSERT INTO rolefilm (characterName)
                     VALUES 
                      (:characterName)");
                    
                    $stmtr->bindParam(':characterName', $role);
                    $stmtr->execute();
                    $id_role = $pdo->lastInsertId();
                    var_dump($id_actor);
            
                    $stmtacting = $pdo->prepare("
                    INSERT INTO acting (id_film, id_actor, id_role)
                     VALUES 
                      (:id_film, :id_actor, :id_role)");
                    
                    $stmtacting->bindParam(':id_film', $id_film);
                    $stmtacting->bindParam(':id_actor', $id_actor);
                    $stmtacting->bindParam(':id_role', $id_role);
                    $stmtacting->execute();
                    $_SESSION["error"] = "Succès : Ajout réussi !";
                    header("Location: index.php?action=editCasting");
                } else {
                    $_SESSION["error"] = "Erreur : veuillez fournir les informations demandées";
                    header("Location: index.php?action=editCasting");
                }
            }
    }

}

