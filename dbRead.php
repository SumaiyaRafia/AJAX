<?php
  
  require 'dbConnect.php';
  function login($userName,$password){
  $conn=connect();
  $sql = $conn->prepare("SELECT * FROM USERS WHERE username = ? and password = ?");
  $sql->bind_param("ss",$userName,$password);
$sql->execute();
res= $sql->get_result();
  return $sql->num_rows===1;

}
?>