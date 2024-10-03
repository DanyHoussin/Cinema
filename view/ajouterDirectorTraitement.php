<?php
session_start();
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "cinema_dany";

$pdo = new mysqli($servername, $username, $password, $dbname);

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
          (?, ?, ?, ?, ?)");
        
        $stmt->bind_param('sssss', $firstName, $lastName, $gender, $dateBirth, $profilPhoto);
    
        $stmt->execute();
        $last_id = $pdo->insert_id;
            $stmta = $pdo->prepare("
            INSERT INTO director (director.id_person) 
            VALUES (?)");
            $stmta->bind_param("s", $id_person);
    
            $id_person = $last_id;
            $stmta->execute();
            $_SESSION["message"] = "Réalisateur ajouté avec succes";
            header("Location: index.php?action=ajouterDirector");
        }

    } else {
        $_SESSION["error"] = "Erreur : veuillez fournir le prénom, nom, genre et date de naissance";
        header("Location: index.php?action=ajouterDirector");
    }

