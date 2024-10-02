<?php

namespace Controller;
use Model\Connect;

class CinemaController {

    /**
     * Lister les films
     */
    
     public function accueil() {
        
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT *
            FROM acting
            INNER JOIN film
            ON acting.id_film = film.id_film
            INNER JOIN actor
            ON acting.id_actor = actor.id_actor
            INNER JOIN person
            ON actor.id_person = person.id_person
            INNER JOIN director
            ON film.id_director = director.id_director
            INNER JOIN typeoffilm
            ON film.id_film = typeoffilm.id_film
            INNER JOIN genre
            ON typeoffilm.id_genre = genre.id_genre
            INNER JOIN rolefilm
            ON acting.id_role = rolefilm.id_role
        ");

        require "view/accueil.php";
    }

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

        public function listDirectors() {
        
            $pdo = Connect::seConnecter();
            $requete = $pdo->query("
                SELECT *
                FROM director
                INNER JOIN person
                ON director.id_person = person.id_person
                ");
                require "view/listDirectors.php";
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