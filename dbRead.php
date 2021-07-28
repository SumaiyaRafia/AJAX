<?php
  
  require 'dbConnect.php';
  function login($userName,$password){
  $conn=connect();
  $sql = $conn->prepare("SELECT * FROM USERS WHERE username = ? and password = ?");
  $sql->bind_param("ss",$userName,$password);
$sql->execute();
res= $sql->get_result();
  return $res->num_rows===1;

}


function getAllUsers(){
  $conn = connect();
  $sql= $conn->prepare("SELECT id, username FROM USERS");
  $sql->execute();
  res= $sql->get_result();
  return $res->fetch_all(MYSQLI_ASSOC);
}

function getUser($username){
  $conn = connect();
  $sql= $conn->prepare("SELECT id, username FROM USERS WHERE username= ?");
  $sql->bind_param("s",$userName);
  $sql->execute();
  res= $sql->get_result();
  return $res->fetch_all(MYSQLI_ASSOC);
}


?>