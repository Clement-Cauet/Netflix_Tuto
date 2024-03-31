<?php

class User {

    private $db;

    private $id;
    private $name;
    private $password;
    private $admin;

    /**
     * User constructor
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

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getAdmin() {
        return $this->admin;
    }

    public function setAdmin($admin) {
        $this->admin = $admin;
    }

    /**
     * Get all information about a user
     */

    public function setUserById($id) {
        $row = $this->db->getUserById($id);

        $this->setId($row["id"]);
        $this->setName($row["name"]);
        $this->setPassword($row["password"]);
        $this->setAdmin($row["admin"]);
    }

    /**
     * Create, update and delete a user
     */

    public function createUser($name, $password, $admin) {
        $this->db->createUser($name, $password, $admin);
    }

    public function updateUser($name, $password, $admin) {
        $this->db->updateUser($name, $password, $admin, $this->id);
    }

    public function deleteUser() {
        $this->db->deleteUser($this->id);
    }

    /**
     * Login and logout a user
     */

    public function login($name, $password) {
        $row = $this->db->login($name, $password);

        $this->setId($row["id"]);
        $this->setName($row["name"]);
        $this->setPassword($row["password"]);
        $this->setAdmin($row["admin"]);

        return ($row != null) ? true : false;
    }

    public function logout() {
        $this->setId(null);
        $this->setName(null);
        $this->setPassword(null);
        $this->setAdmin(null);
    }

}

?>