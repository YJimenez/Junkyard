

$(document).ready(function() {
 
	
$.ajax({
    dataType: 'jsonp',
    url: 'http://www.junkyard.mx/btc/response.php',
    success: function(datos) {
                
               // alert(datos.dato);
                //alert(datos.embed);
                $('#widget-header').html("<img src='"+datos.preview+"' height='130'>");
                $('#widget-title').html("<H2>"+datos.dato+"</h2>");
                $('#widget-tiitle-in').html("<H2>"+datos.dato+"</h2>");
                $('#video-player').html("<div id='ooyalaplayer' style='width:471px;height:265px'></div><script>OO.ready(function() { OO.Player.create('ooyalaplayer', '"+datos.embed+"'); });</script><noscript><div>Please enable Javascript to watch this video</div></noscript>");


                
               
             },
     error: function() { alert("Error: Could'n read JSON"); }
})


 $("#widget-header, #widget-close").click(function () {    
			    $('.openB').toggle("slow");
			     });



});



