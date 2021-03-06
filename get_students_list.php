<?php


try {
    include("db_connection.php");
    $isteacher = false;

    $query = "SELECT person_ID, firstname, lastname, email FROM persons WHERE isteacher = :isteacher";
    $statement = $conn->prepare($query);
    $statement->bindParam(':isteacher', $isteacher);

    $statement->execute();

    //gets row as associative array
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);


    $students = json_encode($users);
    echo $students;

} catch (PDOException $error) {
    echo $error;
}