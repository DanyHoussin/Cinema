<?php

namespace Controller;
use Model\Connect;
$pdo = Connect::seConnecter();
session_start();
class ActeurController {
    
    public function ajouterActeurTraitement() {
        
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT *
        FROM actor
        INNER JOIN person
        ON actor.id_person = person.id_person
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
                    INSERT INTO actor (actor.id_person) 
                    VALUES (:id_person)");
                    $stmta->bindParam(":id_person", $id_person);
            
                    $id_person = $last_id;
                    $stmta->execute();
                    $_SESSION["message"] = "Acteur/Actrice ajouté(e) avec succes";
                    header("Location: index.php?action=ajouterActeur");
                } else {
                    $_SESSION["error"] = "Erreur : veuillez fournir le prénom, nom, genre et date de naissance";
                    header("Location: index.php?action=ajouterActeur");
                }
        
            }
    }
    
}
