<?php

function database_connection(){
  $host = "localhost";
  $user = "root";
  $pw = "";
  $dbname = "Phonebook";
  $connection = mysqli_connect($host, $user, $pw, $dbname);

  if ($connection) {
    $message = "connected";
  }else {
    die("connection closed." .mysql_connect_error());
  }
  return $connection;
}
function insert_contact($name, $number){
  $connection = database_connection();
  $sql = "INSERT INTO Phonebook (name, phone_number) VALUES('".$name."', '".$number."')";
  if ($connection->query($sql)) {
    $message = "contact has been added";
  }else {

    echo "error : " .$connection->error;
  }
}
function get_contacts(){
  $connection = database_connection();
  $sql = "SELECT * FROM phonebook";                 
   return $results = $connection->query($sql);
 }
 function get_contact_by_id($id){
 $connection = database_connection();
 $sql = "SELECT * FROM phonebook WHERE id = '".$id."'";
 $results = $connection->query($sql);
 return mysqli_fetch_assoc($results);
}
function update_contact($id, $nm, $pn){
$connection = database_connection();
$sql = "UPDATE Phonebook SET name = '".$nm."', phone_number = '".$pn."' WHERE id = '".$id."'";
$connection->query($sql);
return(mysqli_affected_rows($connection) == 1)? true : false;
}
function delete_user($id){
  $connection = database_connection();
  $sql = "DELETE FROM phonebook WHERE id = '".$id."'";
  $connection->query($sql);
  return(mysqli_affected_rows($connection) == 1)? true : false;
}
 ?>
