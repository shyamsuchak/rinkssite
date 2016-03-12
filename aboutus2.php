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
	<img src="images/aboutus.jpg" alt="" />
    </div>
    <div class="container_12">
      <div class="grid_12">
        <div class="pad-0 border-1">
          <h2 class="top-1 p0">About <span>Us</span></h2>
          <p class="p2">Acme Pharma Limited is a privately held & well established pharmaceutical distributor and supplier to the Healthcare sectors. We bring a wealth of experience in pharmaceutical industry, from providing a range of services including pharmaceutical storage, distribution and pharmaceutical exports to the world market. All our sites are fully audited and regulated by Medicines Health and Regulatory Authority (MHRA) with state-of-the art storage and distribution facilities.<br/>
            <br/>
           At Acme Pharma we are dedicated to provide a complete satisfaction to individual client requirement along with the corporate clients. Our team fully understands the critical factor needs to be considered in order to provide up to date services to our customers and partners.
            <br/><br/>As an integrated health care distributor, we are always keen to work with hospitals, pharmaceutical distributors, surgeries and independent pharmacies at highest level of customer satisfaction.
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
