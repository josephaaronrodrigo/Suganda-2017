<?php

include_once 'dbConnection.php';

class General {

    function login($username, $password) {
        $conn = new Connection();
        $sql = "SELECT * FROM login WHERE username = '$username' AND password = MD5('$password')";
        $result = $conn->query($sql);
        return $result;
    }

    function getPlants() {
        $conn = new Connection();
        $sql = "SELECT * FROM plant ORDER BY plant_no ASC";
        $result = $conn->query($sql);
        return $result;
    }

    function getSessionTime($session) {
        $conn = new Connection();
        $sql = "SELECT time FROM session WHERE session = '$session'";
        $result = $conn->query($sql);
        return $result;
    }

}
