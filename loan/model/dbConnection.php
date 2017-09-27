<?php

class Connection {

    function query($sql) {
        $conn = mysqli_connect('localhost', 'sugandaa_admin', 'Aprl@132321', 'sugandaa_main') or die("Cannot connect to the server");
        $result = mysqli_query($conn, $sql) or die("Cannot execute the query. " . $sql . ". " . mysqli_error($conn));
        return $result;
    }

    function affectedRows($sql) {
        $conn = mysqli_connect('localhost', 'sugandaa_admin', 'Aprl@132321', 'sugandaa_main') or die("Cannot connect to the server");
        mysqli_query($conn, $sql) or die("Cannot execute the query. " . $sql . ". " . mysqli_error($conn));
        $result1 = mysqli_affected_rows($conn);
        return $result1;
    }

}
