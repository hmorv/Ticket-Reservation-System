<?php
session_start();
require("../dbengine/dbconnect.php");

if($_POST){
//beginning with collecting all
$order=$_SESSION['ORDERREF'];    
$destination=$_POST['d'];
$travelclass=$_POST['tc'];
$seats=$_POST['s'];
$traveldate=$_POST['td'];
//secondpage
$fullname=$_POST['f'];
$contact=$_POST['c'];
$gender=$_POST['g'];
//payment
$prixClasse=mysqli_query($conn,"SELECT class_price FROM available_class WHERE class_name='$travelclass'");
$result=$prixClasse->fetch_assoc();
if(!empty($result))
{
	$amount=$result["class_price"]*$seats+50;
}
//$amount=$_POST['a'];
$code=$_POST['code'];
$paymethod=$_POST['p'];
//Order Reference


//PROCESSING TICKET RESERVATIN
$message="";    
//checking received transaction Id	
require("../dbengine/dbconnect.php");

//Validating Transaction Id  #We are not Validating coz we dont have a paybill  
 $checkcode=mysqli_query($conn,"SELECT transaction_id FROM booking_details WHERE transaction_id='$code'");  
if((!$checkcode) || (mysqli_num_rows($checkcode) >0)){    
$message.="le code de transaction #$code recu existe deja. ";     
}    
//Empty Fields and empty dta    
if((empty($order)) || (empty($destination)) ||(empty($travelclass)) ||(empty($seats)) ||(empty($fullname)) ||(empty($amount)) ||(empty($code)) ||(empty($paymethod))){    
$message.=" Verifier les champs saisies s'il vous plait. ";     
}      
	    
//Redundancy Reference No   
$checkcode=mysqli_query($conn,"SELECT order_ref FROM booking_details WHERE order_ref='$order'");  
if((!$checkcode) || (mysqli_num_rows($checkcode) >0)){    
$message.="la reference #$order appartient a un autre client deja, Cliquer <a href='index.php'>here</a> pour generer un autre. ";     
}    


	
//ending
if(empty($message)){
$insertdata=mysqli_query($conn,"INSERT into booking_details (order_ref,fullname,contact,gender,class_reserved,destination,seats_reserved,date_reserved,transaction_id,account,amount) VALUES('$order','$fullname','$contact','$gender','$travelclass','$destination','$seats','$traveldate','$code','$paymethod','$amount')");    
if($insertdata){$message="success";}else{$message="Erreur!";}    
}
  
//finaly
echo $message;    
}
?>
