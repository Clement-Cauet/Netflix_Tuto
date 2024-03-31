<?php

class Gender {

    private $db;
    
    private $id;
    private $name;

    /**
     * Gender constructor
     * @param Database $db
     */

    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * Getters and setters
     */

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    /**
     * Get all information about a gender
     */

    public function getGenderById() {
        $row = $this->db->getGenderById($this->id);

        $this->setId($row["id"]);
        $this->setName($row["name"]);

        return $this;
    }

    /**
     * Create, update and delete a gender
     */

    public function createGender($name) {
        $this->db->createGender($name);
    }

    public function updateGender($name) {
        $this->db->updateGender($name);
    }

    public function deleteGender() {
        $this->db->deleteGender($this->id);
    }

}

?>