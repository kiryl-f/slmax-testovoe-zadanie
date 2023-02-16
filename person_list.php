<?php

if(class_exists('Person')) {
    class PersonList {
        private ?array $ids;
        private ?array $people;
        private int $first_id;
        private int $last_id;
        private $conn;

        public function __construct($ids) {
            $this->ids = $ids;
            $this->conn = new mysqli("localhost", "root", "", 'slmax_app_db');
            sort($ids);
            $this->first_id = $ids[0];
            $this->last_id = end($ids);
            $sql = "SELECT * FROM people WHERE id >= '$this->first_id' AND id <= '$this->last_id'";
            $query = mysqli_query($this->conn, $sql);
            $this->people = mysqli_fetch_all($query, MYSQLI_ASSOC);
        }

        public function getPeople(): array {
            return $this->people;
        }

        public function removePeople() {
            $sql = "DELETE FROM people WHERE id >= '$this->first_id' AND id <= '$this->last_id'";
            mysqli_query($this->conn, $sql);
        }
    }
} else {
    echo 'Class \'Person\' does not exist';
}