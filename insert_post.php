<?php
session_start();
include_once("db.php");

if(isset($_POST)){

  $titel = strip_tags($_POST['titel']); //tar bort alla taggar
  $content = strip_tags($_POST['content']); //tar bort alla taggar

  if($titel == "" || $content ==""){
     echo "Alla fält är inte ifyllda!";
     return; //Om alla fält inte är ifyllda skrivs "Alla fält är inte ifyllda" ut
   }

  $titel = mysqli_real_escape_string($db, $titel);
  $content = mysqli_real_escape_string($db, $content);

  $date = date('l jS \of F Y h:i:s A');

  $sql = "INSERT INTO posts (titel, content, date) VALUES ('$titel', '$content', '$date')"; //Skickar informationen till databasen

  mysqli_query($db, $sql);

  header("Location: index.php");
}
//Kollar så att allt är ifyllt samt lägger in det i databasen
?>
