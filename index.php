<?php
session_start();
include_once("db.php");
$sql = "SELECT * FROM posts ORDER BY id DESC"; //Väljer från posts och arrangerar dom via ID

$res = mysqli_query($db, $sql) or die(mysqli_error()); //Ansluter till databasen, visar ett fel om databasen ej ansluter

$posts = "";

 ?>
 <!DOCTYPE html>

 <html lang="sv">
 <head>
     <meta charset="utf-8">
     <title>Gaming Galaxy</title>
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
            while($row = mysqli_fetch_assoc($res)){ //Hämtar resultaten som en associativ array
              $id = $row ['id'];
              $titel = $row ['titel'];
              $content = $row ['content'];
              $date = $row ['date'];


              $posts .= "<div><h2>$titel</a></h2><h3>$date</h3><p>$content</p></div>"; //Skriver ut innehåll, datum, tid och titel på inlägget

            }
            echo $posts; //skriver ut posts
          } else {
              echo "<p>Det finns inga inlägg!</p>"; //om det inte finns några posts skriver den ut "Det finns inga inlägg"
          }

        ?>

     </main>
     <footer>Denna sidan är skapad av Ollek Deluxe</footer>
   </div>
 </body>
 </html>
