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

    public function listActeurs() {
        
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT *
            FROM actor
            INNER JOIN person
            ON actor.id_person = person.id_person
            ");
            require "view/listActeurs.php";
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

    public function detailFilm($id) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT * 
        FROM film
        WHERE id_film = :id");
        $requete-> execute(["id" => $id]);
        require "view/detailFilm.php";
    }
}