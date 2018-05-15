<?php  session_start()?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reservation des tickets</title>

<link rel="stylesheet" type="text/css" href="semantic/semantic.min.css">
<script src="semantic/jquery.min.js"> </script>
<script src="semantic/semantic.min.js"></script>
<script src="order_validate.js"></script>

<style>
body{
background-color:#0B173B;
}
a{
	cursor:pointer;
}
</style>
</head>
<body>
    <div class="ui inverted huge borderless fixed fluid menu">
      <a class="header item">Reservez votre ticket maintenant !</a>
    </div><br>
<div class="ui text container" style="margin-top:90px">
<div id="err001" class="ui icon small attached message">
<i class="notched circle loading icon"></i>
<div class="content">
<div class="header">Creation d'une reference unique....</div>
<p>Chargement..</p>
<div id="proceed"></div>
</div>
</div>
<div class="ui attached bottom message">
<div class="ui horizontal divider">Vous avez perdu votre ticket?</div>
<form onsubmit="return ordval(this)">
<div id="refbox" class="ui icon input small">
<input placeholder="Entrez la reference" id="refinput" required>
 <i class="search icon"></i>
</div>
<button id="printbtn" class="ui button small blue">Re-imprimer</button>
</form>
<div class="ui horizontal divider">FAQs</div>
<?php include ("faqs.php")?>
</div>
</div>
<?php
function generate_order(){
$order_ref="";
$char=array('O','T','R','S','A','C','B','E');
$num=rand(11,99);
$num2=rand(12,89);
$num3=rand(13,92);
shuffle($char);
//now the final
$order_ref=$char[0].$char[3].$num.$char[1].$num2.$char[2].$num3.$char[4];
//assignming to user
$_SESSION['ORDERREF']=$order_ref;
	
}
generate_order();
?>

<script>
setTimeout(function(){document.getElementById("proceed").innerHTML="<a href='booking.php' class='ui button small green'>Reservez votre ticket </a> <a href='../admin/login.php' class='ui button small orange'>Espace admin</a> "},1000);
</script>
</body>
</html>