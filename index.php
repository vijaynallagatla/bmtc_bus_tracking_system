
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	 <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAc0zoYUe4RrNZ3zaP8jclBV5fPCVdw2bQ"></script>
	
<script src="js/jquery.min.js" ></script>
	<script src="js/bootstrap.min.js"></script>
<script src="js/GeoJSON.js"></script>
<script src="js/cbpAnimatedHeader.js"></script>
<script src="js/offline.min.js"></script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
	<style>

a,
a:hover,
a:focus,
a:active,
a.active {
    outline: 0;
    color: #5bc0de;
}

. navbar-custom {
    border-color: transparent;
    background-color: #222;
}

. navbar-custom .navbar-brand {
    font-family: Helvetica,Arial,cursive;
    color: #fed136;
}


.portfolio-item {
	
    margin-bottom: 25px;
}
.portfolio-item > img {

}
.carousel-inner > .item > img{
width:100%;
max-height:350px;
}

.carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 100%;
		
		margin: auto;
  }
ul li a {

font-size:20px;
text-decoration:bold;
color:#5bc0de;
}

.navbar {
   background-color: transparent;
   background: transparent;
}
.spinner {
    position: fixed;
    top: 50%;
    left: 70%;
    margin-left: -30px; 
    margin-top: -50px; 
    text-align:center;
    z-index:1234;
    overflow: auto;
    width: 100px; 
    height: 102px; 
}

	#map-canvas {
	position: absolute;
	left:0;
	right:0;
	
	
	width:auto;
	height: 92%;
	background-color: #CCC;
	
	}
	
	#search-box {
	width:40%;
	margin:10px auto 10px auto;

	}
	#search {
	width:75%;
	position :relative;
	
	height:35px;
	}
	
	input {
	margin:5px;
	display:inline;
	}
	#btnbus{
	position:reltive;
	display:inline;
	padding:-10px;
	margin-left:5px;
	margin-top:5px;
	}
	</style>

	<link rel="stylesheet" href="css/mystylesheet.css">
<link rel="stylesheet" href="css/bootstrap.min.css">



	 <script>
	 $(function() {
    $('body').on('click', '.page-scroll a', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});


// Highlight the top nav as scrolling occurs
$('body').scrollspy({
    target: '.navbar-fixed-top'
})

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});
	
	function initialize()
		{
		
		var img = {
    url: "bus.png", 
    scaledSize: new google.maps.Size(50, 50), 
    
};
			var myCenter=new google.maps.LatLng(12.87771244,77.58298395);
			var mapCanvas = document.getElementById("map-canvas");
			var mapOptions = {
				center:myCenter,
				zoom:10,
				mapTypeId:google.maps.MapTypeId.TERRAIN
			
			}
			var map = new google.maps.Map(mapCanvas,mapOptions);

		}
		
		
		google.maps.event.addDomListener(window,'load',initialize);
	
	
	function loadMap(){
	
	var img = {
    url: "me.png", 
    scaledSize: new google.maps.Size(50, 50), 
    
};
			var myCenter=new google.maps.LatLng(12.87775754,77.58302385);
			var mapCanvas = document.getElementById("contact-map");
			var mapOptions = {
				center:myCenter,
				zoom:17,
				mapTypeId:google.maps.MapTypeId.TERRAIN
			
			}
			var map = new google.maps.Map(mapCanvas,mapOptions);
			var marker=new google.maps.Marker({
  position:myCenter,icon:img,animation:google.maps.Animation.BOUNCE
  });

marker.setMap(map);

var infowindow = new google.maps.InfoWindow({
  content:"Vijay Kumar N"
  });

infowindow.open(map,marker);


google.maps.event.addListener(marker,'click',function() {
  map.setZoom(18);
  map.setCenter(marker.getPosition());
  });
}google.maps.event.addDomListener(window,'load',loadMap);
	 </script>
  
  <script>
  

</script>
<script>
var lattitude=0;
var longitude=0;
var rNum="";



function loadRoute()
{
var xmlhttp;
var txt,x,i;
var route=document.getElementById("search").value;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    xmlDoc=xmlhttp.responseXML;
    txt="";
    x=xmlDoc.getElementsByTagName("marker")[0].attributes;
   txt=x.getNamedItem("lat");
    lattitude=txt.value;
	txt=x.getNamedItem("lng");
	longitude=txt.value;
	txt=x.getNamedItem("route_no");
	rNum=txt.value;
	loadRouteMap(route);
    }
  }
   var queryString = "?route=" + route ;
 queryString +=  "&route=" + route ;
 
xmlhttp.open("GET","phpsqlajax.php"+queryString,true);
xmlhttp.send();
}

function loadRouteMap(str){
	var img = {
    url: "bus.png", 
    scaledSize: new google.maps.Size(50, 50), 
    };

	var myCenter=new google.maps.LatLng(lattitude,longitude);
	var mapCanvas = document.getElementById("map-canvas");
	var mapOptions = {
		center:myCenter,
		zoom:19,
		mapTypeId:google.maps.MapTypeId.TERRAIN
		}
	var map = new google.maps.Map(mapCanvas,mapOptions);
	var marker=new google.maps.Marker({
  position:myCenter,icon:img,animation:google.maps.Animation.BOUNCE
  });
google.maps.event.addListener(marker,'click',function() {
  map.setZoom(19);
  map.setCenter(marker.getPosition());
  }); 
marker.setMap(map);

var infowindow = new google.maps.InfoWindow({
  content:str
  });

infowindow.open(map,marker);

 
}



function loadRoute2(str)
{
var xmlhttp;
var txt,x,i;

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    xmlDoc=xmlhttp.responseXML;
    txt="";
    x=xmlDoc.getElementsByTagName("marker")[0].attributes;
   txt=x.getNamedItem("lat");
    lattitude=txt.value;
	txt=x.getNamedItem("lng");
	longitude=txt.value;
	txt=x.getNamedItem("route_no");
	rNum=txt.value;
	loadRouteMap(str);
    }
  }
   var queryString = "?route=" + str ;
 queryString +=  "&route=" + str ;
 
xmlhttp.open("GET","phpsqlajax.php"+queryString,true);
xmlhttp.send();
}
	
 function showBusstop(str) { 
	loadRoute2(str);
    if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
			xmlhttp.onreadystatechange = function() {
			
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("busRoute").innerHTML = xmlhttp.responseText;				
            }
        }
		var queryString = "?route=" + str ;
		queryString +=  "&route=" + str;
        xmlhttp.open("GET","busroute.php"+queryString,true);
        xmlhttp.send(); 
  }
  

  function busRoute() {
   var fromPlace = document.getElementById("fromPlace").value;
  var toPlace = document.getElementById("toPlace").value;
    if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("busRoute").innerHTML = xmlhttp.responseText;
            }
        }
	 var queryString = "?from=" + fromPlace ;
		queryString +=  "&from=" + fromPlace + "&to=" + toPlace;
        xmlhttp.open("GET","getroutedetails.php"+queryString,true);
        xmlhttp.send();
    }
	
	function sendMessage(){
	
	var name = document.getElementById("mesName").value;
  var email = document.getElementById("mesEmail").value;
  	var phone = document.getElementById("mesPhone").value;
  var message = document.getElementById("contactMessage").value;
  
    if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("messageStatus").innerHTML = xmlhttp.responseText;
            }
        }
	 var queryString = "?name=" + name ;
		queryString +=  "&name=" + name + "&email=" + email + "&phone=" + phone+ "&message=" + message;
        xmlhttp.open("GET","sendMessage.php"+queryString,true);
        xmlhttp.send();
	}

  </script>

  <script>
  
$(document).ready(function(){
	$("#search").keyup(function(){
		$.ajax({
		type: "POST",
		url: "getroute.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search").css("background","#FFF url(LoaderIcon.gif) no-repeat 265px");
		},
		success: function(data){
			$("#search-suggest").show();
			$("#search-suggest").html(data);
			$("#search").css("background","#FFF");
		}
		});
	});
});

function selectBusroute(val) {
$("#search").val(val);
$("#search-suggest").hide();
}
$(document).ready(function(){
	$("#fromPlace").keyup(function(){
		$.ajax({
		type: "POST",
		url: "getbusstop.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#fromPlace").css("background","#FFF url(LoaderIcon.gif) no-repeat 240px");
		},
		success: function(data){
			$("#from-suggest").show();
			$("#from-suggest").html(data);
			$("#fromPlace").css("background","#FFF");
		}
		});
	});
});

function selectBusstop(val) {
$("#fromPlace").val(val);
$("#from-suggest").hide();
}

$(document).ready(function(){
	$("#toPlace").keyup(function(){
		$.ajax({
		type: "POST",
		url: "getbusstop2.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#toPlace").css("background","#FFF url(LoaderIcon.gif) no-repeat 240px");
		},
		success: function(data){
			$("#to-suggest").show();
			$("#to-suggest").html(data);
			$("#toPlace").css("background","#FFF");
		}
		});
	});
});

function selectBusstopTo(val) {
$("#toPlace").val(val);
$("#to-suggest").hide();
}



</script>

  
  </head>
<body>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation" >
  <div class="container-fluid">
    <div class="navbar-header page-scroll navbar-collapse">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <div class="container">
      <a class="navbar-brand" style="font-size:25px;margin-top:-10px;color:#5bc0de;display:inline;position:absolute;"href="#"><img src="img/logo.png" width="50" height="50" alt="logo" style="display:inline;">Live BMTC Tracker</a>
    </div>
	</div>
    <div class="nav-collapse navbar-collapse" id="myNavbar" >
      <ul class="nav nav-pills navbar-right navbar-collapse" style="margin-right:50px;">
        <li class="page-scroll "><a href="#home">Home</a></li>
        <li class="page-scroll"><a href="#about">About</a></li>
        <li class="page-scroll"><a href="#portfolio">Gallery</a></li> 
        
		<li class="page-scroll"><a href="#contact" onclick="loadMap()">Contact us</a></li>
      </ul>
    </div>
  </div>
</nav>

	<div class="container" style="display:block;height:100%;" id="home">
	<div id="map-canvas"  style="display:block;height:100%;">
	</div>
	<div id="search-box" style="z-index:1222;margin-left:20%;position:absolute;" >
		
		<input class="form-control" id="search" placeholder="Search : Bus Route Number" style="display:inline;" /><button onclick="loadRoute()" id="findRoute" class="btn btn-info" style="display:inline;">Search</button>
		<div id="search-suggest" style="position:absolute;width:75%;"></div>
	</div>
	
	<div class="panel panel-default pull-right" style="float:right;z-index:1233;position:absolute;max-width:350px;max-height:550px;margin-top:8%;margin-left:67%;margin-right:-3%;">
		<div class="panel-body">
			
				<div class="frmSearch">
				<input type="text" class="form-control" id="fromPlace" name="fromPlace" style="display:inline;margin:5px;" placeholder="From Place" />
				<div id="from-suggest" style="position:absolute;background-color:white;"></div>
				</div>
				<div class="toSearch">
				<input type="text"  class="form-control" id="toPlace" name="toPlace" placeholder="To Place" style="display:inline;margin:5px;"/>
				<div id="to-suggest" style="position:absolute;background-color:white;"></div>
				<input type="submit" id="searchRoute" style="margin-top:10px;width:100%" onclick="busRoute()" class="btn btn-info" value="Search"  />


	<div id="busRoute" style="overflow-y:scroll;max-width:350px;max-height:350px;">
	
	</div>
		</div>
	
	
</div>
	
	</div>
</div>

<div class="container" id="about">

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img class="img-responsive" src="img\1.jpg" alt="Chania">
    </div>

    <div class="item">
      <img class="img-responsive" src="img\2.jpg" alt="Chania">
    </div>

    <div class="item">
      <img class="img-responsive" src="img\3.jpg" alt="Flower">
    </div>

    <div class="item">
      <img class="img-responsive"  src="img\pic1.jpg" alt="Flower">
    </div>
  </div>

 
</div>
<div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
               <center> <h1 class="page-header">
                    Welcome to BMTC 
                </h1></center>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><b><center><i class="fa fa-fw fa-check"></i> News and Updates</center></b></h4>
                    </div>
                    <div class="panel-body">
                        <p>March 23.03.2015
Ticketless passengers penalized
BMTC is operating 6,524 schedules with 6,233...</p>
                        <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">Read More...</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Latest News and updates</h4>
      </div>
      <div class="modal-body">
	  <h5><b>Ticketless Passengers Penalized</b></h5>
        <p>In order to curb pilferage by the conductors & to maximize traffic revenue  alighting passengers checking is being conducted  in & around Bangalore city to detect ticketless travelling by the passengers by deploying 50 batches each,  in 1st & 2nd shift.

On 20.03.2015 a similar drive on alighting passengers was conducted  &  835 ticketless passengers were penalized & imposed penalty of  Rs. 01,04,890/-(One lakh Four  thousand Eight  hundred & ninety rupees).</p>
       <h5><b>BMTC Awarded Special Prize At 66th Republic Day Parade</b></h5>
        <p>Special Prize to BMTC during 66th Republic Day function  held at Manek Shaw Ground. the  Governor of Karnataka His Excellency Vajoobhai Roodabhai Vala presented a special Prize to to Dr.Ekroop Caur, IAS, during the Managing Director, BMTC, during the 66th Republic Day parade</p>
	  
	  <h5><b>Observation Of “Bus Day” On 07.10.2014</b></h5>
	  <p>       BMTC  observed 57th “Bus Day” on 7th October 2014, Sri Ramalingareddy, Honorable Minister of Transport & in-charge Minister, Bangalore City and Chairman KSRTC & BMTC and Dr.Ekroop Caur, IAS, Managing Director, BMTC took part in this programme.

·        Sri Srinagara Kitti, noted Kannada film hero, Sri Dhruva Sarja, hero of recently released kannada film Bahaddhur,  Sri Chetan Kumar, film Director, Sri K.P.Srikanth, film Producer, noted comedian Sri Richard Luis, noted film playback singer Dr.Shamitha Malnad, film actress Kum.Roopika and other  special invitees along with senior officers of BMTC travelled in the bus to encourage public to travel in buses.</p>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><b><center><i class="fa fa-fw fa-check"></i> Our Vision</center></b></h4>
                    </div>
                    <div class="panel-body">
                        <p>“Make BMTC sustainable, people-centered and choice mode of travel for everyone”...</p>
                        <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal2">Read More...</button>

<!-- Modal -->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Our Vision</h4>
      </div>
      <div class="modal-body">
	  <h5><b>Our vision</b></h5>
       <p>“Make BMTC sustainable, people-centered and choice mode of travel for everyone”

The Bangalore Metropolitan Transport Corporation is the sole public bus transport provider for Bangalore, serving urban, sub-urban and rural areas. BMTC is committed to provide quality, safe, reliable, clean and affordable travel. The testimony of its success lies in increasing passenger trips everyday by a wide range of customer base. In an effort to modernize its services for commuter comfort, BMTC strives to strengthen information systems and improve processes through introduction of intelligent technology solution, make capacity enhancement through infrastructure development, user-friendly interchange facilities, fleet upgradation and augmentation, apart from its core activities, which includes fare structuring, route network optimization, planning and monitoring. BMTC reaches far and wide, in every nook and corner of the city, making public transport an attractive travel choice for everyone. BMTC’s stronghold in the area of public transport in Bangalore is a testimony to its adoption of sound Management, HR, Quality and Environmental policies and strong support from the Government of Karnataka and esteemed passengers.

</p>
	  <h5><b>Our Mission</b></h5>
	  <p>     
Provide people-centered (quality, efficient, integrated and safe) services
Commuter responsive service planning and promotion
Optimize resources and build capacity
Adopt environment-friendly and sustainable practices
Strengthen commuter feedback mechanism
Modernize and maintain zero breakdown fleet
Evolve effective mechanism to monitor service performance
Conduct safety training, performance audits and awareness for stakeholders
Increase commercial revenue through monetizing land, buildings & buses
Increase efficiency in operations and administration 
Ensure inter-agency coordination and multi-modal integration
Formulate and enforce police measures for sustainability of the service provision
Implement Intelligent Transport System to improve the quality of service
Extend travel concession to the weaker sections of the society
Act as an agent for cultural synthesis and national integration
Promote research on urban transport</p>	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

                    </div>
                </div>
            </div>
           
		    <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><b><center><i class="fa fa-fw fa-check"></i> BMTC at a Glance</center></b></h4>
                    </div>
                    <div class="panel-body">
                        <p>March 23.03.2015
Ticketless passengers penalized
BMTC is operating 6,524 schedules with 6,233...</p>
                        <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">Read More...</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Latest News and updates</h4>
      </div>
      <div class="modal-body">
	  <h5><b>Ticketless Passengers Penalized</b></h5>
        <p>In order to curb pilferage by the conductors & to maximize traffic revenue  alighting passengers checking is being conducted  in & around Bangalore city to detect ticketless travelling by the passengers by deploying 50 batches each,  in 1st & 2nd shift.

On 20.03.2015 a similar drive on alighting passengers was conducted  &  835 ticketless passengers were penalized & imposed penalty of  Rs. 01,04,890/-(One lakh Four  thousand Eight  hundred & ninety rupees).</p>
       <h5><b>BMTC Awarded Special Prize At 66th Republic Day Parade</b></h5>
        <p>Special Prize to BMTC during 66th Republic Day function  held at Manek Shaw Ground. the  Governor of Karnataka His Excellency Vajoobhai Roodabhai Vala presented a special Prize to to Dr.Ekroop Caur, IAS, during the Managing Director, BMTC, during the 66th Republic Day parade</p>
	  
	  <h5><b>Observation Of “Bus Day” On 07.10.2014</b></h5>
	  <p>       BMTC  observed 57th “Bus Day” on 7th October 2014, Sri Ramalingareddy, Honorable Minister of Transport & in-charge Minister, Bangalore City and Chairman KSRTC & BMTC and Dr.Ekroop Caur, IAS, Managing Director, BMTC took part in this programme.

·        Sri Srinagara Kitti, noted Kannada film hero, Sri Dhruva Sarja, hero of recently released kannada film Bahaddhur,  Sri Chetan Kumar, film Director, Sri K.P.Srikanth, film Producer, noted comedian Sri Richard Luis, noted film playback singer Dr.Shamitha Malnad, film actress Kum.Roopika and other  special invitees along with senior officers of BMTC travelled in the bus to encourage public to travel in buses.</p>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
                    </div>
                </div>
            </div>
</div>

</div>

</div>

<div class="container" style="margin-top:10px;" id="portfolio">
<br/>
<br>
	
		<div class="row">
            <div class="col-lg-12">
                <center><h1 class="page-header">Videos
                    <small>News and updates</small>
                </h1></center>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
            <div class="col-md-3 portfolio-item">
               <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/1_dc30Pni3c" allowfullscreen="true" >
  </iframe>
  
</div>
            </div>
            <div class="col-md-3 portfolio-item">
              <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/ivpVLtp1Vvs" allowfullscreen="true"></iframe>
</div>
            </div>
            <div class="col-md-3 portfolio-item">
               <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/pw83O5Nix54" allowfullscreen="true"></iframe>
</div>
            </div>
            <div class="col-md-3 portfolio-item">
               <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/yTsQ7nOuPfs" allowfullscreen="true"></iframe>
</div>
            </div>
        </div>
        <!-- /.row -->

		<!-- Youtube videos row -->
        <div class="row">
            <div class="col-md-3 portfolio-item">
               <div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/nKNXk-EDZd8" allowfullscreen="true" ></iframe>
				</div>
            </div>
            <div class="col-md-3 portfolio-item">
              <div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/Kpi-Nr_64MQ" allowfullscreen="true"></iframe>
				</div>
            </div>
            <div class="col-md-3 portfolio-item">
               <div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/_yzgHbpylvU" allowfullscreen="true"></iframe>
				</div>
            </div>
            <div class="col-md-3 portfolio-item">
               <div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/WvqU2Ra9vUg" allowfullscreen="true"></iframe>
				</div>
            </div>
        </div>
        <!-- /.row -->

		<!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
               <center> <h1 class="page-header">Images
                    <small>Recent Activities</small>
                </h1></center>
            </div>
        </div>
        <!-- /.row -->

        <!-- Images Row -->
        <div class="row">
            <div class="col-md-3 portfolio-item">
                <a href="#">
                    <img class="img-responsive img-thumbnail"style="min-width:250px;min-height:150px;max-height:150px;max-width:250px;" src="img\a1.jpg" alt="">
                </a>
            </div>
            <div class="col-md-3 portfolio-item">
                <a href="#">
                    <img class=" img-thumbnail" style="min-width:250px;min-height:150px;max-height:150px;max-width:250px;" src="img\a2.png" alt="">
                </a>
            </div>
            <div class="col-md-3 portfolio-item">
                <a href="#">
                    <img class="img-responsive img-thumbnail" style="min-width:250px;min-height:150px;max-height:150px;max-width:250px;" src="img\a3.jpg" alt="">
                </a>
            </div>
            <div class="col-md-3 portfolio-item">
                <a href="#">
                   <img class="img-responsive img-thumbnail" style="min-width:250px;min-height:150px;max-height:150px;max-width:250px;" src="img\a4.jpg" alt="">
				   </a>
            </div>
        </div>
        <!-- /.row -->

        <!-- Images Row -->
        <div class="row">
            <div class="col-md-3 portfolio-item">
                <a href="#">
                  <img class="img-responsive img-thumbnail" style="min-width:250px;min-height:150px;max-height:150px;max-width:250px;" src="img\b1.jpg" alt="">
                </a>
            </div>
            <div class="col-md-3 portfolio-item">
                <a href="#">
                    <img class="img-responsive img-thumbnail" style="min-width:250px;min-height:150px;max-height:150px;max-width:250px;" src="img\b2.jpg" alt="">
                </a>
            </div>
            <div class="col-md-3 portfolio-item">
                <a href="#">
               <img class="img-responsive img-thumbnail" style="min-width:250px;min-height:150px;max-height:150px;max-width:250px;" src="img\b3.jpg" alt="">
                </a>
            </div>
            <div class="col-md-3 portfolio-item">
                <a href="#">
                    <img class="img-responsive img-thumbnail" style="min-width:250px;min-height:150px;max-height:150px;max-width:250px;" src="img\b4.jpg" alt="">
                </a>
            </div>
        </div>
        <!-- /.row -->

        <!-- Images Row -->
        <div class="row">
            <div class="col-md-3 portfolio-item">
                <a href="#">
                    <img class="img-responsive img-thumbnail" style="min-width:250px;min-height:150px;max-height:150px;max-width:250px;" src="img\c1.jpg" alt="">
                </a>
            </div>
            <div class="col-md-3 portfolio-item">
                <a href="#">
                  <img class="img-responsive img-thumbnail" style="min-width:250px;min-height:150px;max-height:150px;max-width:250px;" src="img\c2.png" alt="">
                </a>
            </div>
            <div class="col-md-3 portfolio-item">
                <a href="#">
                  <img class="img-responsive img-thumbnail" style="min-width:250px;min-height:150px;max-height:150px;max-width:250px;" src="img\c3.png" alt="">
                </a>
            </div>
            <div class="col-md-3 portfolio-item">
                <a href="#">
                 <img class="img-responsive img-thumbnail" style="min-width:250px;min-height:150px;max-height:150px;max-width:250px;" src="img\c4.png" alt="">
                </a>
            </div>
        </div>
        <!-- /.row -->
</div>

<div class="container" id="contact" style="height:100%;">
 <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Contact</h2>
                <p>Feel free to email us to provide some feedback on this project, give us suggestions for new ideas, or to just say hello!</p>
                <p><a href="mailto:vijay.005676@gmail.com">vijay.005676@gmail.com</a>
                </p>
                
            </div>
        </div>
    </section>
	<div class="row">
		<div class="col-md-8">
				<div id="contact-map" style="min-height:450px;max-height:550px"></div>
		</div>
		<div class="col-md-4" >
			
                <input type="text" class="form-control" style="margin-bottom:10px;margin:top:10px;padding:20px;" id="mesName" name="mesName" placeholder="Your Name *" />
				<input type="text" class="form-control" id="mesEmail" name="mesEmail" style="margin-bottom:10px;padding:20px;" placeholder="Your Email *" />
				<input type="text" class="form-control" name="mesPhone" id="mesPhone" style="margin-bottom:10px;padding:20px;" placeholder="Your Phone *" />
                <textarea class="form-control" name="contactMessage" id="contactMessage" style="margin-bottom:10px;padding:20px;height:250px;" placeholder="Your Message *" ></textarea>
				<center><button onclick="sendMessage()" class="btn btn-info">SEND MESSAGE</button><div id="messageStatus" name="messageStatus"></div></center>
			</div>
	</div>
</div>

<hr/>
<footer class="footer" style="margin-top:-7%;">
<hr/>
        <div class="container text-center">
            <h3>Copyright &copy; BMTCTracker 2015</h3>
        </div>
    </footer>
</body>
</html>




<?php
require("dbconnect.php");
$conn = mysqli_connect($server, $uname, $pass, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
session_start();
$sql="SELECT visitor_count from visitors where id='1'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
$count=$row['visitor_count'];



// Has visitor been counted in this session?
// If not, increase counter value by one
if(!isset($_SESSION['hasVisited'])){
  $_SESSION['hasVisited']="yes";
  $count++;
$sql2="UPDATE visitors SET visitor_count='$count' where id='1'";
$res2=mysqli_query($conn,$sql2); 
}