<?php

namespace Controller;
use Model\Connect;

class CinemaController {

    /**
     * Page d'accueil
     */
    public function accueil() {
        
        $pdo = Connect::seConnecter();
        $requeteAffiche = $pdo->query("
        SELECT *
        FROM acting
        INNER JOIN film
        ON acting.id_film = film.id_film
        INNER JOIN director
        ON film.id_director = director.id_director
        INNER JOIN person
        ON director.id_person = person.id_person
        INNER JOIN typeoffilm
        ON film.id_film = typeoffilm.id_film
        INNER JOIN genre
        ON typeoffilm.id_genre = genre.id_genre
        INNER JOIN rolefilm
        ON acting.id_role = rolefilm.id_role
        WHERE film.id_film = 3
        ");
        
        require "view/accueil.php";
    }
    

    /**
     * Ajouter un film
     */
    public function ajouterActeur() {
        
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT *
            FROM actor
            INNER JOIN person
            ON actor.id_person = person.id_person
            ");
            require "view/ajouterActeur.php";
    }

    public function ajouterActeurTraitement() {
        
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT *
            FROM actor
            INNER JOIN person
            ON actor.id_person = person.id_person
            ");
            require "view/ajouterActeurTraitement.php";
    }
        /**
     * Ajouter un film
     */
    public function ajouterDirector() {
        
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT *
            FROM director
            INNER JOIN person
            ON director.id_person = person.id_person
            ");
            require "view/ajouterDirector.php";
    }

    public function ajouterDirectorTraitement() {
        
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT *
            FROM director
            INNER JOIN person
            ON director.id_person = person.id_person
            ");
            require "ajouterDirectorTraitement.php";
    }

    public function ajouterFilm() {
        
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT *
            FROM director
            INNER JOIN person
            ON director.id_person = person.id_person
            ");
            require "view/ajouterFilm.php";
    }

    public function ajouterFilmTraitement() {
        
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT *
            FROM director
            INNER JOIN person
            ON director.id_person = person.id_person
            ");
            require "view/ajouterFilmTraitement.php";
    }

    /**
     * Lister les films
     */
    public function listFilms() {
        
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT *
            FROM film
            ORDER BY releaseDate DESC
        ");

        require "view/listFilms.php";
    }

    /**
     * Lister les acteurs
     */
    public function listActeurs() {
        
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT *
            FROM actor
            INNER JOIN person
            ON actor.id_person = person.id_person
            ORDER BY lastName
            ");
            require "view/listActeurs.php";
    }

    /**
     * Lister les réalisateurs
     */
    public function listDirectors() {
    
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT *
            FROM director
            INNER JOIN person
            ON director.id_person = person.id_person
            ORDER BY lastName
            ");
        require "view/listDirectors.php";
    }

    /**
     * Détail d'un acteur
     */
    public function detailActeur($id) {
        $pdo = Connect::seConnecter();
        $requeteActor = $pdo->prepare("
        SELECT * 
        FROM actor
        INNER JOIN person
        ON actor.id_person = person.id_person
        WHERE id_actor = :id");
        $requeteActor-> execute(["id" => $id]);
        $requeteFilm = $pdo->prepare("
        SELECT DISTINCT film.id_film, title, releaseDate, timeFilm, synopsis, rate, poster, id_director, characterName
        FROM acting
        INNER JOIN film
        ON acting.id_film = film.id_film
        INNER JOIN rolefilm
        ON acting.id_role = rolefilm.id_role
        INNER JOIN actor
        ON acting.id_actor = actor.id_actor
        WHERE acting.id_actor = :id");
        $requeteFilm-> execute(["id" => $id]);

        require "view/detailActeur.php";
    }

    public function detailDirector($id) {
        $pdo = Connect::seConnecter();
        $requeteDirector = $pdo->prepare("
        SELECT * 
        FROM director
        INNER JOIN person
        ON director.id_person = person.id_person
        WHERE id_director = :id");
        $requeteDirector-> execute(["id" => $id]);
        $requeteFilm = $pdo->prepare("
        SELECT DISTINCT film.id_film, title, releaseDate, timeFilm, synopsis, rate, poster
        FROM film
        INNER JOIN director
        ON film.id_director = director.id_director
        WHERE film.id_director = :id");
        $requeteFilm-> execute(["id" => $id]);
        require "view/detailDirector.php";
    }

    /**
     * Détail d'un film
     */
    public function detailFilm($id) {
        $pdo = Connect::seConnecter();
        $requeteFilm = $pdo->prepare("
        SELECT DISTINCT film.id_film, title, releaseDate, timeFilm, synopsis, rate, poster, firstName, lastName
        FROM film
        INNER JOIN acting
        ON film.id_film = acting.id_film
        INNER JOIN rolefilm
        ON acting.id_role = rolefilm.id_role
        INNER JOIN director
        ON film.id_director = director.id_director
        INNER JOIN person
        ON director.id_person = person.id_person
        WHERE film.id_film = :id");
        $requeteFilm-> execute(["id" => $id]);
        $requeteActor = $pdo->prepare("
        SELECT DISTINCT film.id_film, firstName, lastName, characterName
        FROM acting
        INNER JOIN film
        ON acting.id_film = film.id_film
        INNER JOIN rolefilm
        ON acting.id_role = rolefilm.id_role
        INNER JOIN actor
        ON acting.id_actor = actor.id_actor
        INNER JOIN person
        ON actor.id_person = person.id_person
        WHERE film.id_film = :id");
        $requeteActor-> execute(["id" => $id]);
        require "view/detailFilm.php";
    }
}