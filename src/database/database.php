<?php

class Database {

    private $db;

    public function __construct($host, $login, $mdp, $dbname) {
        $this->db = mysqli_connect($host, $login, $mdp, $dbname);
        if (!$this->db) {
            throw new Exception("Failed to connect to MySQL: " . mysqli_connect_error());
        }

    }

    /**
     * Get all movies from the database
     */

    public function getMovies() {
        $query  = 
        "SELECT movie.id, movie.title, movie.description, author.name AS author, gender.name AS gender, movie.date, movie.score 
        FROM movie 
        INNER JOIN gender ON gender.id = movie.gender_id 
        INNER JOIN author ON author.id = movie.author_id";
        $result = mysqli_query($this->db, $query);
        $resultArray = [];

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $movie = new Movie($this->db);
                $movie->setId($row["id"]);
                $movie->setTitle($row["title"]);
                $movie->setDescription($row["description"]);
                $movie->setAuthor($row["author"]);
                $movie->setGender($row["gender"]);
                $movie->setDate($row["date"]);
                $movie->setScore($row["score"]);

                $resultArray[] = $movie;
            }
        } else {
            echo "Erreur : " . mysqli_error($this->db);
        }
        
        return $resultArray;
    }

    /**
     * Get a movie by its ID
     * @param int $id
     */

    public function getMovieById($id) {
        $query  = "SELECT * FROM movie WHERE id = $id";
        $result = mysqli_query($this->db, $query);

        return mysqli_fetch_assoc($result);
    }

    /**
     * Create a new movie
     * @param string $title
     * @param string $author
     * @param string $gender
     * @param string $date
     * @param int $score
     */

    public function createMovie($title, $description, $author, $gender, $date, $score) {
        $query  = "INSERT INTO movie (title, description, author_id, gender_id, date, score) VALUES ('$title', '$description', '$author', '$gender', '$date', '$score')";
        $result = mysqli_query($this->db, $query);
    }

    /**
     * Update a movie
     * @param string $title
     * @param string $author
     * @param string $gender
     * @param string $date
     * @param int $score
     * @param int $id
     */

    public function updateMovie($title, $description, $author, $gender, $date, $score, $id) {
        $query  = "UPDATE movie SET title = '$title', description = '$description', author_id = '$author', gender_id = '$gender', date = '$date', score = '$score' WHERE id = $id";
        $result = mysqli_query($this->db, $query);
    }

    /**
     * Delete a movie
     */

    public function deleteMovie($id) {
        $query  = "DELETE FROM movie WHERE id = $id";
        $result = mysqli_query($this->db, $query);
    }

    ///////////////////////////////

    /**
     * Get all users from the database
     */

    public function getUsers() {
        $query  = "SELECT * FROM user";
        $result = mysqli_query($this->db, $query);

        $resultArray = [];

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $user = new User($this->db);
                $user->setId($row["id"]);
                $user->setName($row["name"]);
                $user->setPassword($row["password"]);
                $user->setAdmin($row["admin"]);

                $resultArray[] = $user;
            }
        } else {
            echo "Erreur : " . mysqli_error($this->db);
        }
        
        return $resultArray;
    }

    /**
     * Get a user by its ID
     * @param int $id
     */

    public function getUserById($id) {
        $query  = "SELECT * FROM user WHERE id = $id";
        $result = mysqli_query($this->db, $query);

        return mysqli_fetch_assoc($result);
    }

    /**
     * Create a new user
     * @param string $name
     * @param string $password
     */

    public function createUser($name, $password, $admin) {
        $query = "INSERT INTO user (name, password, admin) VALUES ('$name', '$password', '$admin')";
        mysqli_query($this->db, $query);
    }

    /**
     * Update a user
     * @param string $name
     * @param string $password
     * @param int $id
     */

    public function updateUser($name, $password, $admin, $id) {
        $query = "UPDATE user SET name = '$name', password = '$password', admin = '$admin' WHERE id = $id";
        mysqli_query($this->db, $query);
    }

    /**
     * Delete a user
     * @param int $id
     */

    public function deleteUser($id) {
        $query = "DELETE FROM user WHERE id = $id";
        mysqli_query($this->db, $query);
    }

    /**
     * Login a user
     * @param string $name
     * @param string $password
     */

    public function login($name, $password) {
        $query  = "SELECT * FROM user WHERE name = '$name' AND password = '$password'";
        $result = mysqli_query($this->db, $query);
        
        return mysqli_fetch_assoc($result);
    }

    ///////////////////////////////

    /**
     * Get all genders from the database
     */

    public function getGenders() {
        $query  = "SELECT * FROM gender";
        $result = mysqli_query($this->db, $query);
        
        $resultArray = [];

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $gender = new Gender($this->db);
                $gender->setId($row["id"]);
                $gender->setName($row["name"]);

                $resultArray[] = $gender;
            }
        } else {
            echo "Erreur : " . mysqli_error($this->db);
        }
        
        return $resultArray;
    }

    /**
     * Get an gerder by its ID
     * @param int $id
     */

    public function getGenderById($id) {
        $query  = "SELECT * FROM gender WHERE id = $id";
        $result = mysqli_query($this->db, $query);

        return mysqli_fetch_assoc($result);
    }

    /**
     * Create a new gender
     * @param string $name
     */

    public function createGender($name) {
        $query = "INSERT INTO gender (name) VALUES ('$name')";
        mysqli_query($this->db, $query);
    }

    /**
     * Update an gender
     * @param string $name 
     * @param int $id
     */

    public function updateGender($name, $id) {
        $query = "UPDATE gender SET name = '$name' WHERE id = $id";
        mysqli_query($this->db, $query);
    }

    /**
     * Delete a gender
     * @param int $id
     */

    public function deleteGender($id) {
        $query = "DELETE FROM gender WHERE id = $id";
        mysqli_query($this->db, $query);
    }

    ///////////////////////////////

    /**
     * Get all authors from the database
     */

    public function getAuthors() {
        $query  = "SELECT * FROM author";
        $result = mysqli_query($this->db, $query);

        $resultArray = [];

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $author = new Author($this->db);
                $author->setId($row["id"]);
                $author->setName($row["name"]);

                $resultArray[] = $author;
            }
        } else {
            echo "Erreur : " . mysqli_error($this->db);
        }
        
        return $resultArray;
    }

    /**
     * Get an author by its ID
     * @param int $id
     */

    public function getAuthorById($id) {
        $query  = "SELECT * FROM author WHERE id = $id";
        $result = mysqli_query($this->db, $query);
        
        return mysqli_fetch_assoc($result);
    }

    /**
     * Create a new author
     * @param string $name
     */

    public function createAuthor($name) {
        $query = "INSERT INTO author (name) VALUES ('$name')";
        mysqli_query($this->db, $query);
    }

    /**
     * Update an author
     * @param string $name
     * @param int $id
     */

    public function updateAuthor($name, $id) {
        $query  = "UPDATE author SET name = '$name' WHERE id = $id";
        mysqli_query($this->db, $query);
    }

    /**
     * Delete an author
     * @param int $id
     */

    public function deleteAuthor($id) {
        $query  = "DELETE FROM author WHERE id = $id";
        mysqli_query($this->db, $query);
    }
}

?>