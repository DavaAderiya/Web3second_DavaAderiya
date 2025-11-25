<?php

class GenreController {
    private $db;
    private $genre; // deklarasi variable genre

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->genre = new Genre($this->db); // membuat object dari class model Genre
    }

    public function create() {
        include "page/input_genre.php";
    }

    public function store() {
        $this->genre->nama = $_POST['nama'];
        $this->genre->create(); // memanggil method create pada model Genre
        
        exit;
    }
}
