<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<title>Home</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/grid_12.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/slider.css">
<link href='http://fonts.googleapis.com/css?family=Condiment' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
<script src="js/jquery-1.7.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/tms-0.4.x.js"></script>
<script>
		$(document).ready(function(){				   	
			$('.slider')._TMS({
				show:0,
				pauseOnHover:true,
				prevBu:false,
				nextBu:false,
				playBu:false,
				duration:1000,
				preset:'fade',
				pagination:true,
				pagNums:false,
				slideshow:7000,
				numStatus:true,
				banners:'fromRight',
				waitBannerAnimation:false,
				progressBar:false
			})		
		});
	</script>
<!--[if lt IE 8]>
       <div style=' clear: both; text-align:center; position: relative;'>
         <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
      </div>
    <![endif]-->
<!--[if lt IE 9]>
   		<script type="text/javascript" src="js/html5.js"></script>
    	<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
	<![endif]-->
</head>
<body>
<div class="main">
  <!--==============================header=================================-->
  <header>
    <h1><a href="index.php"><img src="images/logo.png" alt="" style="margin-top:15px;"></a></h1>
    <div class="form-search"> Call Now: <span>02036597944</span>
      <!--<form id="form-search" method="post">
              <input type="text" value="Type here..." onBlur="if(this.value=='') this.value='Type here...'" onFocus="if(this.value =='Type here...' ) this.value=''"  />
              <a href="#" onClick="document.getElementById('form-search').submit()" class="search_button"></a>
            </form> -->
    </div>
    <div class="clear"></div>
    <?php include "includes/nav.php"; ?>
  </header>
  <!--==============================content================================-->
  <section id="content">
    <div class="ic"></div>
    <div id="slide" class="box-shadow">
      <img src="images/contactus.jpg" alt="" />
    </div>
    <div class="container_12">
      <div class="grid_12">
        <div class="pad-0 border-1">
          <h2 class="top-1 p0">Contact <span>Us</span></h2>
          <p class="p2">
          <div class="contactusarea1">
            <form style="width:300px;">
              <input type="text" placeholder="Name" class="inpudfild1">
              <input type="text" placeholder="Company Name" class="inpudfild1">
              <input type="text" placeholder="Phone No." class="inpudfild1">
              <br>
              <input type="text" placeholder="E-mail" class="inpudfild1">
              <textarea placeholder="Message" class="textarea"></textarea>
              <input type="submit" value="Submit" class="submit">
            </form>
            <div class="clear"></div>
          </div>
          <div class="contacttext">
		  <strong style="color:#2178c5;">Acme Pharma Ltd.</strong><br/>
		 Unit-15, Cygnus Business Centre,<br/>

Dalmeyer road,<br/>

London<br/>

NW10 2XA<br/> 
<br/>
Email: <a href="mailto:info@acmepharma.co.uk">info@acmepharma.co.uk</a><br/>
Phone No.: 02036597944
		  
		  
		  </div>
		  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2480.9874082444508!2d-0.24521050000000008!3d51.550129899999995!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487611af17b0ffe5%3A0xdb504f097516ca45!2sCygnus+Business+Centre%2C+Dalmeyer+Rd%2C+London+NW10+2XA%2C+UK!5e0!3m2!1sen!2sin!4v1408005217314" width="319" height="285" frameborder="0" style="border:#cdcdcd solid 2px; padding:2px; -webkit-border-radius: 6px; -moz-border-radius: 6px; border-radius: 6px;0"></iframe>
          
          
          
		  
		  
		  
          <div class="clear"></div>
          </p>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="aside">
      <div class="container_12">
        <?php include "includes/footertop.php"; ?>
        <div class="clear"></div>
      </div>
    </div>
  </section>
</div>
<!--==============================footer=================================-->
<footer>
  <?php include "includes/footer.php"; ?>
</footer>
</body>
</html>
