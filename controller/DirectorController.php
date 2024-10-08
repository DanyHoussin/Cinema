<?php

namespace Controller;
use Model\Connect;
$pdo = Connect::seConnecter();

class DirectorController {
    
    public function ajouterDirectorTraitement() {
        
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT *
            FROM director
            INNER JOIN person
            ON director.id_person = person.id_person
            ");
            if(isset($_POST['submit'])){
                
                $firstName = filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $lastName = filter_input(INPUT_POST, "lastName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $gender = filter_input(INPUT_POST, "gender", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
                if($firstName && $lastName && $gender){
                    $firstName = $_POST['firstName'];
                    $lastName = $_POST['lastName'];
                    $gender = $_POST['gender'];
                    $dateBirth = $_POST['dateBirth'];
                    $profilPhoto = $_POST['profilPhoto'];
                
                    $stmt = $pdo->prepare("
                    INSERT INTO person (firstName, lastName, gender, dateBirth, profilPhoto)
                     VALUES 
                      (:firstName, :lastName, :gender, :dateBirth, :profilPhoto)");
                    
                    $stmt->bindParam(':firstName', $firstName);
                    $stmt->bindParam(':lastName', $lastName);
                    $stmt->bindParam(':gender', $gender);
                    $stmt->bindParam(':dateBirth',$dateBirth);
                    $stmt->bindParam(':profilPhoto', $profilPhoto);
            
            
                    $stmt->execute();
                    $last_id = $pdo->lastInsertId();
                        $stmta = $pdo->prepare("
                        INSERT INTO director (director.id_person) 
                        VALUES (:id_person)");
                        $stmta->bindParam(":id_person", $id_person);
                
                        $id_person = $last_id;
                        $stmta->execute();
                        $_SESSION["message"] = "Réalisateur ajouté avec succes";
                        header("Location: index.php?action=ajouterDirector");
                    } else {
                        $_SESSION["error"] = "Erreur : veuillez fournir le prénom, nom, genre et date de naissance";
                        header("Location: index.php?action=ajouterDirector");
                    }
            }
    
     }

     public function modifierDirector($id) {
        $pdo = Connect::seConnecter();
        $requeteDirector = $pdo->prepare("
        SELECT *
        FROM director
        INNER JOIN person
        ON director.id_person = person.id_person
        WHERE director.id_director = :id");
        $requeteDirector-> execute(["id" => $id]);
        require "view/modifierDirector.php";
    }

    public function modifierDirectorTraitement($id) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT *
            FROM director
            INNER JOIN person
            ON director.id_person = person.id_person
            ");
            if(isset($_POST['submit'])){
                
                $firstName = filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $lastName = filter_input(INPUT_POST, "lastName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $gender = filter_input(INPUT_POST, "gender", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
                if($firstName && $lastName && $gender){
                    $firstName = $_POST['firstName'];
                    $lastName = $_POST['lastName'];
                    $gender = $_POST['gender'];
                    $dateBirth = $_POST['dateBirth'];
                    $profilPhoto = $_POST['profilPhoto'];

            
                    $stmt = $pdo->prepare("
                    UPDATE person
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
}

