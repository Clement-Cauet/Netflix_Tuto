<?php

class Movie {

    private $db;

    private $id;
    private $title;
    private $description;
    private $author;
    private $gender;
    private $date;
    private $score;

    /**
     * Movie constructor
     * @param Database $db
     */

    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * Getters and setters
     */

    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function getGender() {
        return $this->gender;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getScore() {
        return $this->score;
    }

    public function setScore($score) {
        $this->score = $score;
    }

    /**
     * Get all information about a movie
     */

    public function getMovieById() {
        $row = $this->db->getMovieById($this->id);

        $this->setId($row["id"]);
        $this->setTitle($row["title"]);
        $this->setDescription($row["description"]);
        $this->setAuthor($row["author"]);
        $this->setDate($row["date"]);
        $this->setScore($row["score"]);

        return $this;
    }

    /**
     * Create, update and delete a movie
     */

    public function createMovie($title, $description, $author, $gender, $date, $score) {
        $this->db->createMovie($title, $description, $author, $gender, $date, $score);
    }

    public function updateMovie($title, $description, $author, $gender, $date, $score) {
        $this->db->updateMovie($title, $description, $author, $gender, $date, $score);
    }

    public function deleteMovie() {
        $this->db->deleteMovie($this->id);
    }
}

?>