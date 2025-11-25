<?php
// session_start();
require_once('../../config/Database.php');
require_once('../../model/models.php');
require_once('../../controller/controllers.php');



$page = $_GET['page'] ?? 'dashboard';
$action = $_GET['action'] ?? 'index';

// $action = $_GET['action'] ?? 'index';

$genre = new AdminGenreController();

// Routes for admin panel

switch ($page){
    case 'dashboard' : include "page/dashboard.php"; break;
    // case 'genre' : include "page/input_genre.php"; break; 
    case 'genre' : { 
        switch ($action) {
            case 'index' : 
                $genre->index();
                break;
            case 'create' : 
                $genre->create();
                    if(isset($_POST['submit']))
                       {
                           $genre->store();
                       }
                break;
        }
    } break;
}

       
        // if($_POST) $genre->create();
    // }