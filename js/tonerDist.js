var now = new Date();
var month = now.getMonth() + 1;
var dates = now.getDate();
var year = now.getYear();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds();
var zeroHour;
var endNotes;
var Current_Date;

function fourdigits(number){
return (number < 1000) ? number + 1900 : number;
}
function AMPM (numbers){
return (numbers > 12) ? numbers - 12 : numbers;
}
if (hours < 10){
zeroHour = '0' + AMPM(hours)
endNotes = 'AM'
}else{
zeroHour = AMPM(hours)
endNotes = 'PM'
}

$(document).ready(function(){

	Current_Date = month + '/' + dates + '/' + (fourdigits(year)) + ' - ' + zeroHour + ':' + minutes + ':' + seconds + ' ' + endNotes;
$(document).on("click",".add",function(){
	var currentUser = $(".names").val();
	var tonerDist = $(".toner option:selected").text();
	var dates =  $(".dates").val();
	var dataString =  'DistributionInfo='+ currentUser +'&Toner=' + tonerDist + '&Date=' + dates; 
	$.ajax({  
      type: "POST",  
      url: "/printerlist/tonerdistinsert.php",  
      data: dataString,  
   success: function(output) {  
		alert(output);
      },
		error: function(){
		alert('There was a error');
    
		}
    });  
    return false; 
	});

});	