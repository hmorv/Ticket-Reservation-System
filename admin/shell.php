<?php
@session_start();
@set_time_limit(0);

//PASSWORD CONFIGURATION

$pass = $_POST['pass'];
$user=$_POST['user'];
$chk_login = true;
$password = "101010";
$username="admin";

//END CONFIGURATION

if(($pass == $password) && ($user == $username))
{
 $_SESSION['nst'] = "$pass";
}

if($chk_login == true)
{
 if(!isset($_SESSION['nst']) or $_SESSION['nst'] != $password)
 {
 die("
  
  <center>
  <table border=0 cellpadding=0 cellspacing=0 width=100% height=100%>
  <tr><td valign=middle align=center>
  <table width=100 bgcolor=black border=6 bordercolor=green><tr><td>
  <font size=1 face=verdana><center>
  <b></font></a><br></b>
  </center>
  <form method=post>
  <font size=1 face=verdana color=blue><strong><center>-

-</center></strong><br>
  <input type=text name=user>
  <input type=password name=pass size=30>
  
  </form>
  <b>:</b> ".$_SERVER["REMOTE_ADDR"]."
  </td></tr></table>
  </td></tr></table>
  ");
 }else{echo"Bienvenue a votre espace admin ! :D #Meltdown";}
}
?>