<?php

namespace Controller;
use Model\Connect;

class CinemaController {

    /**
     * Lister les films
     */
    public function listFilms() {
        
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT title, releaseDate
            FROM film
        ");

        require "view/listFilms.php";
    }

    public function detailActeur($id) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT * 
        FROM actor
        INNER JOIN person
        ON actor.id_person = person.id_person
        WHERE id_actor = :id");
        $requete-> execute(["id" => $id]);
        require "view/detailActeur.php";
    }
}