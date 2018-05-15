$(document).ready(function(){
setTimeout(function(){$("form").removeClass("loading");},2000);	
});


function booking(){
	$("#contact-page").hide();
	$("#billing-page").hide();
	$("#confirmdetails-page").hide();
	$("#booking-page").fadeIn("slow"); 	
	return false;
}
function contact(){
	$("#contactbtn").removeClass("disabled");	
	$("#booking-page").hide();
	$("#billing-page").hide();
	$("#confirmdetails-page").hide();
	$("#contact-page").fadeIn("slow"); 	
return false;
}

function billing(){
$("#billingbtn").removeClass("disabled");	
	$("#booking-page").hide();
	$("#confirmdetails-page").hide();
	$("#contact-page").hide();
	$("#billing-page").fadeIn("slow");

$("#payment-info").html("Confirmer votre paiement");
return false;	
	
	
}

function confirmdetails(){
	
$("#confimationbtn").removeClass("disabled");
$("#billing-page").hide();
$("#booking-page").hide();
$("#contact-page").hide();
//getting details
destination=$("#destination").val();
travelclass=$("#travelclass").val();
seats=$("#seats").val();
traveldate=$("#traveldate").val();
//payment
amount=$("#amount").val();
code=$("#codebox").val();
paymethod=$("#paymentmethod").val();
//ticketname
fullname=$("#fullname").val();
//
switch(travelclass)
{
	case"Premiere classe":
	amount=350*seats+"d ("+seats+" ticket(s)) + "+amount+"d (prix reservation)";
	break;
	case"Classe standard":
	amount=150*seats+"d ("+seats+" ticket(s)) + "+amount+"d (prix reservation)";
	break;
	case"Classe speciale":
	amount=500*seats+"d ("+seats+" ticket(s)) + "+amount+"d (prix reservation)";
	break;
}
$("#details").html("<ul><li>Ticket du Client: "+fullname+"</li><li>Destination: "+destination+"</li><li>date de voyage: "+traveldate+"</li><li>Classe de voyage: "+travelclass+"</li><li>nombre des places: "+seats+"</li><li>Montant de paiement: "+amount+" par "+paymethod+"</li> <li>ID transaction: "+code+"</li></ul>");	

$("#confirmdetails-page").fadeIn("slow");
return false;
	
}

function senddata(){
$("#finishbtn").removeClass("disabled");
//sending data here
//beginning with collecting all
destination=$("#destination").val();
travelclass=$("#travelclass").val();
seats=$("#seats").val();
traveldate=$("#traveldate").val();
//secondpage
fullname=$("#fullname").val();
contact=$("#contact").val();
gender=$("#gender").val();
//payment
amount=$("#amount").val();
code=$("#codebox").val();
paymethod=$("#paymentmethod").val();

//Clearing all data 
$("#dynamic").html("<div class='ui text container'><div id='err001' class='ui success icon message'><i class='notched circle loading icon'></i><div class='content'><div class='header'>....</div><p>Chargement de votre ticket</p></div></div>");    

//now sending to request
$.ajax({
url: "request.php",
type: "POST",
data: "d="+destination+"&tc="+travelclass+"&s="+seats+"&td="+traveldate+"&f="+fullname+"&c="+contact+"&g="+gender+"&a="+amount+"&code="+code+"&p="+paymethod,
		   success: function(data){    
			if(data=='success'){
  setTimeout(function(){$("#dynamic").html("<div class='ui text container'><div class='ui positive message'> Succès! Votre ticket est pret. <p align='center'><a class='ui button green' href='validate.php?ticket'> Telechargez votre ticket.</a></p></div></div>");},6000); 			 
			}
			else {

  setTimeout(function(){$("#dynamic").html("<div class='ui text container'><div class='ui negative message'><div class='header'>Désolé Erreur lors du traitement de votre demande..!</div><div class='ui horizontal divider'>ERROR</div> "+data+"<br><a onclick='location.reload()'>Retournez</a><a href='#0'></a>assistance</div></div>");},8000);              
                
			}
		   }});
		

return false;	
}

