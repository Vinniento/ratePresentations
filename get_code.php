<?php
session_start();
include("db_connection.php");
try{
    $email = $_SESSION['email'];

    $query = "SELECT presentations.name, presentations.code FROM  persons 
    INNER JOIN  presentation_to_person  ON persons.person_ID = presentation_to_person.person_ID 
    INNER JOIN  presentations  ON presentation_to_person.presentation_ID = presentations.presentation_ID  
    WHERE persons.email = :email";
    $statement = $conn->prepare($query);
    $statement->bindParam(':email', $email);

    $statement->execute();

     //gets row as associative array
     $codes = $statement->fetchAll(PDO::FETCH_ASSOC);

     $result = json_encode($codes);
     print_r($result);

}catch(PDOException $error){
    echo $error;
}
?>