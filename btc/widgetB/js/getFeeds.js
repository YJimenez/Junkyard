$(document).ready(function() {


//menu
$('.widget').append('<div class="header" id="widget-header"></div>');
$('.widget').append('<div class="title" id="widget-title"></div>');
$('.widget').append('<div class="seeMore" onclick="javascript:window.location.href =\'http://beyondthecomics.com/mainPage_day1.html\'"></div>');
$('.widget').append('<div class="suspensor" ></div>');
$('.suspensor').append('<iframe frameborder=0 width="180" height="150" overlay="no" scrolling="no" src="ads/ad1.htm"></iframe>');

$('.widget').append('<div class="openB"></div>');
$('.widget').append('<div class="playbtn"></div>');

//float left
$('.openB').append('<div class="divL"></div>');
$('.divL').append('<div class="tweeter"></div>');
$('.divL').append('<div class="fb"></div>');


//float center
$('.openB').append('<div class="divC"></div>');
$('.divC').append('<div class="video"></div>');
$('.video').append('<div class="top"></div>');
$('.top').append('<div class="top-title" id="widget-tiitle-in"></div>');
$('.top').append('<div class="top-link" onclick="javascript:window.location.href =\'http://beyondthecomics.com/mainPage_day1.html\'"></div>');
$('.openB').append('<div class="player" id="video-player"></div>');

//float right
$('.openB').append('<div class="divR"></div>');
$('.divR').append('<div class="close" id="widget-close"></div>');
$('.divR').append('<div class="suspensorB"></div>');
$('.suspensorB').append('<iframe frameborder=0 width="300" height="250" overlay="no" scrolling="no" src="ads/ad2.htm"></iframe>');


 
 
$.ajax({
    dataType: 'jsonp',
    url: 'php/response.php',
    success: function(datos) {
                

               // alert(datos.dato);
                //alert(datos.embed);
               $('#widget-header').html("<img src='"+datos.preview+"' height='130'>");
               $('#widget-title').html("<H2>"+datos.dato+"</h2>");
                $('#widget-tiitle-in').html("<H3>"+datos.dato+"</h3>");
                $('#video-player').html("<div id='ooyalaplayer' style='width:471px;height:265px;'></div><script>OO.ready(function() { OO.Player.create('ooyalaplayer', '"+datos.embed+"'); });</script><noscript><div>Please enable Javascript to watch this video</div></noscript>");

                
                
                
                
               
             },
     error: function() { alert("Error: Could'n read JSON"); }
})


 $("#widget-header, #widget-close, .playbtn").click(function () {    
                $('.openB').toggle("slow");
                 });



});



