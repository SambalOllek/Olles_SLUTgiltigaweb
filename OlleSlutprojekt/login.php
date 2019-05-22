<?php
  session_start();

  if(isset($_POST['user'])){

    include_once("db.php");
    $username = strip_tags($_POST['user']); //tar bort tags och symboler i stringen i förebyggande syfte
    $password = strip_tags($_POST['password']); //tar bort tags och symboler i stringen i förebyggande syfte

    $username = stripslashes($username); //Tar bort / så att man inte kan kommentera i rutan
    $password = stripslashes($password);

    $username = mysqli_real_escape_string($db, $username);
    $password = mysqli_real_escape_string($db, $password);

    //Alla ovan används i förebyggande syfte så att man inte ska kunna skriva kod i rutorna för användarnamn och lösenord och därmed hacka sidan

    $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1"; //Gör så att man inte kan ha flera av samma username
    $query = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($query); //hämtar en array med data från servern
    $id = $row['id'];
    $db_password = $row['password'];
    $admin = $row['admin'];

    if($password == $db_password){ //Kollar om lösenordet i passwordrutan matchar lösenordet i databasen
      $_SESSION['user'] = $username;
      $_SESSION['id'] = $id;
      if($admin == 1){
        $_SESSION['admin'] = 1;
      }
      header("Location:post.php");

    } else {
      echo "Felaktigt Lösenord";
    }


  }
//Ser till så att allt stämmer innan du loggas in,du skickas tillbaka om något mot förmodan skulle vara fel
 ?>
