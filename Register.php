<?php
if(isset($_SESSION['id'])) {
  header("Location: index.php");
}

if(isset($_POST['register'])){
  include_once("db.php");

  $username = strip_tags($_POST['username']);
  $password = strip_tags($_POST['password']);
  $c_password = strip_tags($_POST['c_password']);

  $username = stripslashes($username);
  $password = stripslashes($password);
  $c_password = stripslashes($c_password);

  $username = mysqli_real_escape_string($db, $username);
  $password = mysqli_real_escape_string($db, $password);
  $c_password = mysqli_real_escape_string($db, $c_password);


$sql_store = "INSERT into users (username, password) VALUES ('$username' , '$password')"; //fyller i de tidigare lagrade användaruppgifterna i rutorna

$mysqli_fetch_username = "SELECT username FROM users WHERE username ='$username'";

$query_username = mysqli_query($db, $mysqli_fetch_username); //hämtar användarnamnet från databasen

if(mysqli_num_rows($query_username)) {
  echo "Oops! That username is already taken. Try again!";
  return;
} //Säger till användaren att användarnamnet redan är taget

if($username == "" ){
  echo "Please insert a username!";
  return;
} //Säger åt användaren att fylla i ett användarnamn

if($password == ""  || $c_password == ""){
  echo "Please insert a password!";
  return;
} //Säger åt användaren att fylla i ett lösenord

if($password != $c_password){
  echo "The passwords do not match!";
return; //Säger åt användaren att de två lösenord hen skrivit in inte matchar
}

mysqli_query($db, $sql_store);

header("Location: index.php");

//Kontrollerar att allt som fyllts i stämmer överens innan det sparas som en user i databasen

}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
   <title>Register</title>
</head>
<body>

  <form action="Register.php" method="post" enctype="multipart/form-data">
    <input placeholder="Användarnamn" name="username" type="text" autofocus>
    <input placeholder="Lösenord" name="password" type="password">
    <input placeholder="Bekräfta Lösenord" name="c_password" type="password">
    <input name="register" type="submit" value="Registera!">
  </form>

</body>
</html>
