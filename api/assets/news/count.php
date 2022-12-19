<?php

    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/News.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate blog post object
    $news = new News($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));
    // var_dump($data);

    $news->previews_per_page = $data->previewsPerPage;
    $news->current_page = $data->currentPage;

    $news->countPages();

    $responce = [
        "numberPages" => $news->number_pages,
    ];

    echo json_encode($responce);
    
?>