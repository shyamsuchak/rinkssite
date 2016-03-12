<div class="main1">
    <div class="manulink">
      <ul>
        <li><a href="index.php">Home</a></li>
		<li><a href="aboutus">About Us</a></li>
		<li><a href="career.php">Career</a>
        <li style="border-right:none;"><a href="contactus.php">Contact Us</a></li>	
      </ul>
    </div>
    <div class="manulink1"> All Rights Reserved
      <?php 
                $time = time () ; 
                //This line gets the current time off the server
                
                $year= date("Y",$time) . ""; 
                //This line formats it to display just the year
                
                echo "" . $year;
                //this line prints out the copyright date range, you need to edit 2002 to be your opening year
                ?>
      www.acmepharma.co.uk<br/><span style="color:#000000;">Powered by www.kre8iveminds.com</span></div>
  </div>