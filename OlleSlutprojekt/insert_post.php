<?php
session_start();
include_once("db.php");

if(isset($_POST)){

  $titel = strip_tags($_POST['titel']);
  $content = strip_tags($_POST['content']);

  if($titel == "" || $content ==""){
     echo "Alla fält är inte ifyllda!";
     return;
   }

  $titel = mysqli_real_escape_string($db, $titel);
  $content = mysqli_real_escape_string($db, $content);

  $date = date('l jS \of F Y h:i:s A');

  $sql = "INSERT INTO posts (titel, content, date) VALUES ('$titel', '$content', '$date')";

  mysqli_query($db, $sql);

  header("Location: index.php");
}

//Kollar så att allt är ifyllt samt lägger in det i databasen

?>
