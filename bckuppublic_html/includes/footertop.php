<?php
	     $PAGE = 50;
		 $SqlNews = "SELECT * FROM ".TBL_ADMIN_ARTICLE." WHERE ad_art_id=".$PAGE."";
		  
          $RstNews = mysql_query($SqlNews);
          $RowNews = mysql_fetch_object($RstNews);

		  ?>


<div class="grid_12">
          <div class="pad-2 block-2 wrap">
            <div>
              <?=$RowNews->ad_art_desc;?>
              <!--<a href="#" class="button1">Read More</a> -->
            </div>
            <!--<div class="last">
              <h3 class="p3">Our <span>Clients' Feedback</span></h3>
              <div style="width: 398px; text-align:left; text-align:justify;  padding:20px; background-color:#f1f2f2; border:1px #e1e2e2 solid; line-height: 18px; color: #000000; font-size: 14px; -webkit-border-radius: 6px;
-moz-border-radius: 6px;
border-radius: 6px;">
                <marquee onmouseover='this.stop();' onmouseout='this.start();' direction="up" height="180"  scrollamount="3" >
                <strong style="color:#448ed5;">Apurva Banerjee</strong><br/>
                Acme Pharma is the best and I am sure those who have come to its periphery must agree with me. They are dedicated always look after your requirement. I am very impressed with them. <br/>
                <br/>
                <strong style="color:#448ed5;">Indra Das</strong><br/>
                They are simply the best as they take a good note of your health. I was very much impressed with their service and highly recommend to others.<br/>
                <br/>
                <strong style="color:#448ed5;">Koustav Bagchi</strong><br/>
                There are very few pharmacies that are of the repute as Acme Pharma.  Be rest assured they would do every thing to restore your health. Their care is the USP, that has made them a known name.<br/>
                <br/>
                <strong style="color:#448ed5;">Simontini Sharma</strong><br/>
                I congratulate them on their sucess and widh them all the best for their future endeavor.<br/>
                </marquee>
              </div>
            </div> -->
          </div>
        </div>