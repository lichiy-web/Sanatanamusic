<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/News.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $news = new News($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $news->preview = $data->preview;
  $news->view = $data->view;

  // Create post
  if($news->create()) {
    echo json_encode(
      array('message' => 'News Created ____' . var_dump($data) . '____' . $data->preview . '____' . $data->view)

    );
  } else {
    echo json_encode(
      array('message' => 'News Not Created')
    );
  }

?>