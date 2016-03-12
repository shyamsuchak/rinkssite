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
	<!--<script src="js/show.js"></script> -->
	<!--<script src="js/jquery.min.js"></script> -->
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});
</script>
 
<style> 
#flip
{
float:right;
background-color:#000000;
color:#ffffff;
outline:none;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px;
border:none;
padding:2px 10px;
}
#flip:hover
{
background-color:#2178c5;
cursor:pointer;

}
#panel
{
padding:0px 0px 10px 0px;
display:none;
}
</style>
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
      <div class="slider">
        <ul class="items">
          <li><img src="images/slider-1.jpg" alt="" />
            <div class="banner">Caring for Life, <span>Attending the Health</span></div>
          </li>
          <li><img src="images/slider-2.jpg" alt="" />
            <div class="banner">Efficient and <span>Timely Response</span></div>
          </li>
          <li><img src="images/slider-3.jpg" alt="" />
            <div class="banner">Trust and <span>Transparency</span></div>
          </li>
          <li><img src="images/slider-4.jpg" alt="" />
            <div class="banner">Great Business <span>Relationship</span></div>
          </li>
        </ul>
      </div>
    </div>
	<?php
	     $PAGE = 1;
		 $SqlNews = "SELECT * FROM ".TBL_ADMIN_ARTICLE." WHERE ad_art_id=".$PAGE."";
		  
          $RstNews = mysql_query($SqlNews);
          $RowNews = mysql_fetch_object($RstNews);

		  ?>
	
    <div class="container_12">
      <div class="grid_12">
        <div class="pad-0 border-1">
          <h2 class="top-1 p0"><?=$RowNews->ad_art_content_title;?></span></h2>
          <p class="p2">
		  <?=$RowNews->ad_art_desc;?>
          </p>
        </div>
        <div class="wrap block-1 pad-1">
		<?php
	     $PAGE = 42;
		 $SqlNews = "SELECT * FROM ".TBL_ADMIN_ARTICLE." WHERE ad_art_id=".$PAGE."";
		  
          $RstNews = mysql_query($SqlNews);
          $RowNews = mysql_fetch_object($RstNews);

		  ?>
          <div>
            <h3>Mission</h3>
            <div><img src="images/page1-img1.jpg" alt="" class="img-border"></div>
            <div> <?=$RowNews->ad_art_desc;?></div>
            <a href="mission.php" class="button">Read More</a> </div>
			<?php
	     $PAGE = 43;
		 $SqlNews = "SELECT * FROM ".TBL_ADMIN_ARTICLE." WHERE ad_art_id=".$PAGE."";
		  
          $RstNews = mysql_query($SqlNews);
          $RowNews = mysql_fetch_object($RstNews);

		  ?>
			
          <div>
            <h3>Vision</h3>
            <div><img src="images/page1-img2.jpg" alt="" class="img-border"></div>
            <div><?=$RowNews->ad_art_desc;?></div>
            <a href="vision.php" class="button">Read More</a> </div>
			<?php
	     $PAGE = 44;
		 $SqlNews = "SELECT * FROM ".TBL_ADMIN_ARTICLE." WHERE ad_art_id=".$PAGE."";
		  
          $RstNews = mysql_query($SqlNews);
          $RowNews = mysql_fetch_object($RstNews);

		  ?>
			
          <div class="last">
            <h3>Business principles</h3>
            <img src="images/page1-img3.jpg" alt="" class="img-border">
            <div> <?=$RowNews->ad_art_desc;?> </div>
            <a href="principles.php" class="button">Read More</a> </div>
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
