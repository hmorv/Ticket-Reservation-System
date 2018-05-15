<?php 
session_start();
if(!isset($_SESSION['ORDERREF']))
{header('Location: index.php');}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>System de reservation des tickets</title>

<link rel="stylesheet" type="text/css" href="semantic/semantic.min.css">
<script src="semantic/jquery.min.js"> </script>
<script src="semantic/semantic.min.js"></script>
<link href="semantic/datepicker.css" rel="stylesheet" type="text/css">
<script src="semantic/datepicker.js"></script>
<script src="nav.js"></script>

<style>
body{
background-color:f1f1f1;
}
a{
cursor:pointer;	
}
</style>
</head>
<body>
    <div class="ui inverted huge borderless fixed fluid menu">
      <a class="header item">System de reservation des tickets</a>
    </div><br>


<div class="ui fluid container center aligned" style="cursor:pointer;margin-top:40px">
<div class="ui unstackable tiny steps">
  <div class="step" onclick="booking()">
    <i class="plane icon"></i>
    <div class="content">
      <div class="title">details de voyage</div>
      <div class="description">information de reservation</div>
    </div>
  </div>
  <div class="step disabled" onclick="contact()" id="contactbtn">
    <i class="truck icon"></i>
    <div class="content">
      <div class="title">Details</div>
      <div class="description">information de contact</div>
    </div>
  </div>
  <div class="disabled step" id="billingbtn" onclick="billing()">
    <i class="money icon"></i>
    <div class="content">
      <div class="title">Facturation</div>
      <div class="description">Verification et paiement</div>
    </div>
  </div>
   <div class="disabled step" onclick="confirmdetails()" id="confimationbtn">
    <i class="info icon"></i>
    <div class="content">
      <div class="title">Confirmer les details</div>
      <div class="description">Verifier les details de votre reservation</div>
    </div>
  </div> 
   <div class="disabled step" id="finishbtn">
    <i class="info icon"></i>
    <div class="content">
      <div class="title">Terminer et imprimer</div>
      <div class="description">impression de votre ticket</div>
    </div>
  </div>
</div>
</div>
<br>
<div id="dynamic">

<div class="ui container text" id="booking-page">
<div class="ui attached message">
  <div class="header">Informations de reservation</div>
    <div class="header">reference : <span style="color:red;font-size:15px"><?php echo $_SESSION['ORDERREF']?> <a href='index.php'>Annuler la reservation</a></span> </div> 
  <p>Entrer les informations de réservation de voyage</p>
</div>

<form class="ui form attached fluid loading segment" onsubmit="return contact(this)">
   <div class="field">
    <label>Destination</label>
 <div class="field">
    <select required id="destination">
      <option value="" selected disabled>--Travel Destination--</option>
      <option>Tunis vers Paris</option>
      <option>Paris vers Tunis</option>
	   <option>Tunis vers Rome</option>
	    <option>Rome vers Paris</option>
    </select>
  </div>   
  </div>
<div class="field">  
    <label>Classes de voyage</label><span><a href="https://www.airfrance.fr/FR/fr/common/faq/a-bord/quelles-sont-les-classes-de-voyage-proposees-par-air-france.htm">Savoir plus</a><i> sur les classes de voyage</i></span>
 <div class="field">
    <select name="travelclass" required id="travelclass">
      <option value="" selected disabled>--Classes de voyage--</option>
      <option>Premiere classe</option>
      <option>Classe standard</option>
	   <option>Classe speciale</option>
    </select>
  </div>   
  </div>
<div class="two fields"> 
<div class="field"> 
    <label>Nombre de places</label>
<input placeholder="Number of Seats" type="number" id="seats" min="1" max="72"  value="1" required>
  </div> 
<div class="field"> 
    <label>Date de Voyage</label>
<input type="text" readonly required id="traveldate" class="datepicker-here form-control" placeholder="ex. August 03, 1998">
  </div>  
  </div>
  <div style="text-align:center">
 <div><label>Assurez-vous que tous les détails ont été correctement renseignés</label></div>
  <button class="ui green submit button">Envoyer des détails</button>
</div> 
 </form>
</div>


<div class="ui container text" id="contact-page" style="display:none">
<div class="ui attached message">
  <div class="header">Entrez vos informations client! </div>
   <div class="header">Reference: <span style="color:red;font-size:15px"><?php echo $_SESSION['ORDERREF']?> <a href='index.php'>Annuler la reservation</a></span> </div>
  <p>Remplissez les champs obligatoires</p>
</div>
<form class="ui form attached fluid loading segment" onsubmit="return billing(this)">
    <div class="field">
      <label>Nom complet</label>
      <input placeholder="Full name" type="text" id="fullname" required>
    </div>

  <div class="field">
    <label>Contact / Mobile ou Adresse e-mail</label>
    <input placeholder="Mobile No/Contact or Email address" type="text" id="contact" required>
  </div>

 <div class="field">
    <label>Le genre</label>
 <div class="field">
    <select name="gender" required id="gender">
      <option value="" selected disabled>--Choisir Le genre--</option>
      <option value="MALE">Homme</option>
      <option value="FEMALE">Femme</option>
    </select>
  </div>   
  </div>
 
 <div style="text-align:center">
 <div><label>Assurez-vous que tous les détails ont été correctement renseignés</label></div>
  <button class="ui green submit button">Envoyer des détails</button>
</div>
  
  </form>
</div>

<div class="ui container text" id="billing-page" style="display:none">
<div class="ui attached message">
  <div class="header">Valider les informations de paiement</div>
    <div class="header">Reference: <span style="color:red;font-size:15px"><?php echo $_SESSION['ORDERREF']?> <a href='index.php'>Annuler la reservation</a></span> </div> 
  <p>Entrez les détails du paiement pour continuer</p>
</div>

<form class="ui form attached fluid loading segment" onsubmit="return confirmdetails(this)">
  <div class="field"> 
<label>Paiement</label>  
    <select name="gender" required id="paymentmethod">
      <option value="" selected disabled>Moyen de paiement</option>
      <option value="Wasterunion">Wasterunion</option>
      <option value="EDINAR">EDINAR</option>
	  <option value="Attijari_bank">Attijari bank</option>
    </select>
  </div> 
<div class="field"> 
<label>ID de transaction</label> 
<div class="ui icon input">
  <input placeholder="Code de transaction" type="text" required id="codebox">
  <i class="payment icon"></i>
</div>
</div>

  <div class="field"> 
<label>Le Montant a payé pour la reservation ( doit etre inclus dans la transaction effectué sinon votre reservation sera annulé , le montant finale sera : 50 + prix de la classe * nb des places )</label>
<div class="ui icon input">
  <input value="50" type="text" id="amount" readonly>
</div></div>
 <div style="text-align:center">
  <button class="ui green submit button">Continuez</button>
</div>
 </form>
<div class="ui bottom attached warning message"><i class="icon help"></i><b id="payment-info"></b></div> 
</div>


<div class="ui text container" id ="confirmdetails-page" style="display:none">
<div class="ui positive message">
<b>Avant de continuer, revérifiez les informations suivantes que vous avez fournies</b><br>
<i>Il se peut que le ticket ne soit pas réimprimé, par conséquent les détails fournis doivent être valides</i>
<br>
<div class="ui horizontal divider">les details entreés</div>
<div id="details"></div>
<div class="ui horizontal divider">Confirmation des details </div>
<div class="ui fluid container center aligned">
<a class="ui button green" onclick="senddata()">Confirmez</a>
</div>
</div>
</div>

</div>
</body>
</html>