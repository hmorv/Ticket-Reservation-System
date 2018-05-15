<?php 

  session_start();

  require '../dbengine/dbconnect.php';
  if( (isset($_POST['username'])) && (isset($_POST['password'])) ){
$username=$_POST['username'];
$password=$_POST['password'];
$query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query);
//validating no validation using admin admin as password	
if(mysqli_num_rows($result) > 0) {
	$_SESSION['username']=$username;
	header("location: bookings.php");
}
	
}
?> 
  
  
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bienvenue a votre espace priveé</title>

    <link href="static/dist/semantic-ui/semantic.min.css" rel="stylesheet" type="text/css" />
    <script src="static/dist/jquery/jquery.min.js"></script>
	<script src="admin.js"></script>
	<style>
body{
background-color:f1f1f1;
}
</style>
</head>
<body>
    <div class="ui inverted huge borderless fixed fluid menu">
      <a class="header item">System de reservation des tickets</a>
    </div><br>
	
<div class="ui container" id="dynamic" style="margin-top:90px">


<div class="ui text container">
<div class="ui attached message">
  <div class="header">Espace Admin</div>


</div>

<form class="ui form attached fluid loading segment" method="POST">
  	<input type="hidden" name="frmLogin" value="true">
  <div class="field">
    <label>Nom d'utilisateur</label>
    <input placeholder="entrer votre nom d'utilisateur" name="username" type="text" autofocus required>
  
  </div>
  <div class="field">
    <label>mot de passe</label>
    <input type="password" placeholder="entrer votre mot de passe" name="password" required>
  </div>
  <div class="inline field">
    <div class="ui checkbox"><input type="checkbox" id="rememberPass"><label>Maintenir la connexion</label></div>
  </div>
 <div style="text-align:center">
 <input type="submit" name="login" class="ui blue submit button" tabindex=3 value="Login!"> 
</div>
</form>





</div>
</div>
</body>
</html>
