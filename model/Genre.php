<?php

class Genre {

    private $conn;
    private $table = "tb_genre";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table;
        return $this->conn->query($query);
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id_genre = $id";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }

    public function create($nama) {
        $query = "INSERT INTO " . $this->table . " (nama_genre) VALUES ('$nama')";
        return $this->conn->query($query);
    }

    public function update($id, $nama) {
        $query = "UPDATE " . $this->table . " SET nama='$nama' WHERE id_genre=$id";
        return $this->conn->query($query);
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id_genre=$id";
        return $this->conn->query($query);
    }
}
