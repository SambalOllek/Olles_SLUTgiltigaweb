<?php
session_start();
include_once("db.php");
$sql = "SELECT * FROM posts ORDER BY id DESC";
$res = mysqli_query($db, $sql) or die(mysqli_error());
$posts = "";
if(!isset($_SESSION['admin']) && $_SESSION['admin'] != 1){
  header("location: loginpage.php");
  return; //Kollar om man är inloggad som admin och tar bort dig om detta inte är fallet
}

 ?>

 <!DOCTYPE html>

 <html lang="sv">
 <head>
     <meta charset="utf-8">
     <title>Administration</title>
     <link href="style.css" rel="stylesheet">
 </head>
 <body>

   <div id="wrapper">
     <header>
         <img src="Galaxy logo.png" alt="Logga">
     </header>

     <nav>
         <ul>
             <li><a href="index.php">Startsida</a></li>
             <li><a href="post.php">Blogg</a></li>
             <li><a href="admin.php">Administration</a></li>
             <li><a href="loginpage.php">Logga in</a></li>
         </ul>
     </nav>

     <main>

       <?php
          if(mysqli_num_rows($res) > 0){
            while($row = mysqli_fetch_assoc($res)){
              $id = $row ['id'];
              $titel = $row ['titel'];
              $date = $row ['date'];

              $admin = "<div><a href='del_post.php?pid=$id'>Radera</a></div>"; //Länken som gör att adminen kan ta bort ett inlägg

              $posts .= "<div><h2><a href='view_post.php?pid=$id' target='_blank'>$titel</a></h2><h3>$date</h3>$admin</div>";

            }
            echo $posts; //Skriver ut alla inlägg
          } else {
              echo "<p>Det finns inga inlägg!</p>";
          }
        ?>

     </main>
     <footer>Denna sidan är skapad av Ollek Deluxe</footer>
   </div>
 </body>
 </html>
