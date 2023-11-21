<?php


class User {

    private $conn;
    private $table_name = "users";
    

    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $contact_number;
    public $address;
    public $password;
    public $access_level;
    public $access_code;
    public $status;
    public $created;
    public $modifies;

    public function __construct($db){
        $this->conn = $db;
    }

    // check if given email exist in the database
function emailExists(){
    // query to check if email exists
    $query = "SELECT id, firstname, lastname, access_level, password, status
            FROM " . $this->table_name . "
            WHERE email = ?
            LIMIT 1 OFFSET 0";
    // prepare the query
    $stmt = $this->conn->prepare( $query );

    // sanitize
    $this->email=htmlspecialchars(strip_tags($this->email));
    // bind given email value
    $stmt->bindParam(1, $this->email);
    // execute the query
    $stmt->execute();
    // get number of rows
    $num = $stmt->rowCount();
    // if email exists, assign values to object properties for easy access and use for php sessions
    if($num>0){
        // get record details / values
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // assign values to object properties
        $this->id = $row['id'];
        $this->firstname = $row['firstname'];
        $this->lastname = $row['lastname'];
        $this->access_level = $row['access_level'];
        $this->password = $row['password'];
        $this->status = $row['status'];
        // return true because email exists in the database
        return true;
    }
    // return false if email does not exist in the database
    return false;
}

}







?>