<?php
class DB {

    private $connection;

    public function __construct() {
        $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    }

    public function query($sql) {
        return mysqli_query($this->connection, $sql);
    }

    public function close() {
        mysqli_close($this->connection);
    }
}
?>
