<?php
class News{

    private $conn;
    private $table = 'news';

    // Post Properties
    public $id;
    public $preview;
    public $view;
    public $time; 
    public $previews_per_page;
    public $number_pages;
    public $current_page;


    // Constructor with DB
    public function __construct($db) {
        $this->conn = $db;
    }

    public function countPages() {
        $query = 'SELECT COUNT(*) FROM ' . $this->table;

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();
        $rows_count = $stmt->fetchColumn();

        $this->number_pages = ceil( $rows_count / $this->previews_per_page );
        $this->current_page = ($this->current_page > $this->number_pages) ? $this->number_pages : $this->current_page;
    }

    // Read news previews
    public function read(){
        $limit = $this->previews_per_page;
        $offset = ( $this->current_page == 1) ? 0 : ($this->current_page - 1) * $limit - 1;

        $query = 'SELECT 
        n.id, 
        n.preview, 
        n.view, 
        n.time
            FROM ' . $this->table . ' n
                ORDER BY n.time 
                DESC LIMIT ' . $offset . ', ' . $limit;
        
        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    public function read_single() {
        // Create query
        $query = 'SELECT 
        n.id, 
        n.preview, 
        n.view, 
        n.time
            FROM ' . $this->table . ' n
            WHERE
            n.id = ?
            LIMIT 0,1';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->id);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set properties
        $this->preview = $row['preview'];
        $this->view = $row['view'];
        $this->time = $row['time'];
    }

    // Create Post
    public function create() {
        // Create query
        $query = 'INSERT INTO ' . $this->table . 
        ' SET preview = :preview, view = :view';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data

        $this->preview = htmlspecialchars(urldecode($this->preview));
        $this->view = htmlspecialchars(urldecode($this->view));;

        // Bind data
        $stmt->bindParam(':preview', $this->preview);
        $stmt->bindParam(':view', $this->view);

        // Execute query
        if($stmt->execute()) {
        return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    // Delete Post
    public function delete() {
        // Create query
        $query = 'DELETE FROM ' . $this->table . 
        ' WHERE id = :id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id = htmlspecialchars(strip_tags(urldecode($this->id)));

        // Bind data
        $stmt->bindParam(':id', $this->id);

        // Execute query
        if($stmt->execute()) {
        return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    // Update Post
    public function update() {
        // Create query
        $query = 'UPDATE ' . $this->table . '
        SET preview = :preview, view = :view, 
                            WHERE id = :id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id = htmlspecialchars(strip_tags(urldecode($this->id)));
        $this->preview = htmlspecialchars(strip_tags(urldecode($this->preview)));
        $this->view = htmlspecialchars(strip_tags(urldecode($this->view)));
        

        // Bind data
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':preview', $this->preview);
        $stmt->bindParam(':view', $this->view);
        

        // Execute query
        if($stmt->execute()) {
        return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}

?>