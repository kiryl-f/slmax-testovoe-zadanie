<?php

class Person {
    private int $id;
    private ?string $name;
    private ?string $surname;
    private ?string $birthdate;
    private int $gender;
    private ?string $city;
    private $conn;

    public function __construct(int $id, ?string $name = '', ?string $surname = '', ?string $birthdate = '', int $gender = 0,
                                ?string $city = '') {
        $this->id = $id;
        $this->conn = new mysqli("localhost", "root", "", 'slmax_app_db');
        if($name !== '') {
            $this->name = $name;
            $this->surname = $surname;
            $this->birthdate = $birthdate;
            $this->gender = $gender;
            $this->city = $city;
        } else {
            $sql = "SELECT name, surname, birthdate, gender, city FROM people WHERE id='$id'";
            $query = mysqli_query($this->conn, $sql);
            $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
            if(count($data) === 0) {
                echo "User not found";
            } else {
                echo "User found";
            }
        }
    }


    public function saveToDB() {
        $sql = "INSERT INTO people (id, name, surname, birthdate, gender, city)
                    VALUES ('$this->id',   '$this->name', '$this->surname', '$this->birthdate', '$this->gender', '$this->city')";
        $query = mysqli_query($this->conn, $sql);
    }

    public function removeFromDB() {
        $sql = "DELETE FROM people WHERE id='$this->id'";
        $query = mysqli_query($this->conn, $sql);
    }

    public static function getAge($birthdate): float {
        $now = time();
        $datediff = $now - strtotime($birthdate);
        return round($datediff / (60 * 60 * 24));
    }

    public static function getGenderName($gender): string {
        if($gender == 0) {
            return "Male";
        }
        return "Female";
    }
}