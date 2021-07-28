<?php
     require 'dbConnect.php';
     require 'dbRead.php';
     $userlist = getAllUsers();

     $username= empty($_GET['username'])?"" : $_GET['username'];

     if(empty($_GET['search']) or empty($username)){
     	$userList = getAllUsers();
     }

     else{
     	$userList = getUser($username);
     }

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Search User</title>
 </head>
 <body>

        <h1> User list</h1>
<hr>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
	<input type="text" name="username">
	<input type="submit" name="search" value="Search ">

</form>
<br>

        <?php
        echo "<table>";
        echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>username</th>";
        echo "</tr>";

        for($i=0; $i< count($userList); $i++){

        echo "<tr>";
        echo "<td>". $userList[$i]["id"] . "</td>";
        echo "<td>". $userList[$i]["username"] . "</td>";
        echo "</tr>";
        }

        echo "</table>";

        ?>
        
 
 </body>
          
 </html>

