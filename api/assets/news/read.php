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
    // var_dump(file_get_contents("php://input"));

    $news->previews_per_page = $data->previewsPerPage;
    $news->current_page = $data->currentPage;

    $news->countPages();
    $result = $news->read();

    $num = $result->rowCount();
    if ($num > 0){
        $news_page = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $news_item = array(
                'id' => $id,
                'preview' => htmlspecialchars_decode($preview),
                'view' => htmlspecialchars_decode($view),
                'time' => $time
            );
            
            array_push($news_page, $news_item);
        }

        $responce = [
            "numberPages" => $news->number_pages,
            "currentPage" => $news->current_page,
            "previewsPerPage" => $news->previews_per_page,
            "items" => $news_page
        ];

        echo json_encode($responce);

    } else{
        // No Posts
        echo json_encode(
            array('message' => 'No Posts Found')
        );
    }

?>