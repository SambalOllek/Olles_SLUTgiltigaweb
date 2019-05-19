<?php
session_start();
include_once("db.php"); //inkluderar databasen

if(!isset($_SESSION['user'])){
  header("Location: loginpage.php");
  return;

}

if(!isset($_GET['pid'])){
  header("Location: index.php");
}

else{
  $pid = $_GET['pid'];
  $sql = "DELETE FROM posts WHERE id=$pid"; //tar bort posten som användaren lagt upp
  mysqli_query($db, $sql);
  header("Location: index.php");
}

?>
