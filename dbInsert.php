<?php
  
  require 'dbConnect.php';
  function register($fName,$lName,$Gender,$DOB,$religion,$Email,$userName,$password){
  $conn=connect();
  $sql = $conn->prepare("INSERT INTO USERS (fName,lName,Gender,DOB,religion,Email,username,password) values (?, ?, ?, ?, ?, ?, ?, ?)");
  $sql->bind_param("ss",$fName,$lName,$Gender,$DOB,$religion,$Email,$userName,$password);

  return $sql->execute();
}
?>