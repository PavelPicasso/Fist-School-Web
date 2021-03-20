<?php
require 'constants.php';

class Query_builder {

    private $mysqli;

    public function __construct() {
        $this->mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        
        if ($this->mysqli->connect_errno) {
            echo "Не удалось подключиться к MySQL";
        }
    }

    public function query($sql) {
        $query_name = explode(" ", $sql)[0]; // определяем тип запроса
        $query = $this->mysqli->query($sql);

        if($query_name === "SELECT") {
            if($query) {
                return $query->fetch_all();
            } else {
                return false;
            }
        } else {
            if($query) {
                return true;
            } else {
                return false;
            }
        }   
    }
}
?>