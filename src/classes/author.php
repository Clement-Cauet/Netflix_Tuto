<?php

class Author {

    private $db;

    private $id;
    private $name;

    /**
     * Author constructor
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

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    /**
     * Get all information about an author
     */

    public function getAuthorById() {
        $row = $this->db->getAuthorById($this->id);

        $this->setId($row["id"]);
        $this->setName($row["name"]);

        return $this;
    }

    /**
     * Create, update and delete an author
     */

    public function createAuthor($name) {
        $this->db->createAuthor($name);
    }

    public function updateAuthor($name) {
        $this->db->updateAuthor($name, $this->id);
    }

    public function deleteAuthor() {
        $this->db->deleteAuthor($this->id);
    }
}

?>