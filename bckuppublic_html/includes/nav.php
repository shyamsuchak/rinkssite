<?php include "config/connection.php"; ?>
<nav class="box-shadow">
            <div>
                <ul class="nav">
                	<li class="home-page current"><a href="index.php"><span></span></a></li>
                    <li><a href="aboutus.php" <?php echo basename($_SERVER['PHP_SELF'])=='aboutus.php'?'id="selected"':''?>>About Us</a></li>
                    <li><a href="#" <?php echo basename($_SERVER['PHP_SELF'])=='values.php'?'id="selected"':''?>>Values</a>
                        <ul class="subs">
						<li><a href="mission.php">Mission</a></li>
                            <li><a href="vision.php">Vision</a></li>
                            <li><a href="principles.php">Business Principles</a></li>
                        </ul>
                    </li>
					<li><a href="career.php" <?php echo basename($_SERVER['PHP_SELF'])=='career.php'?'id="selected"':''?>>Career</a>
                    <li><a href="contactus.php" <?php echo basename($_SERVER['PHP_SELF'])=='contactus.php'?'id="selected"':''?>>Contact Us</a></li>
                </ul>	
                <div class="social-icons">
                    <span>Follow us:</span>
                    <a href="#" class="icon-3"></a>
                    <a href="#" class="icon-2"></a>
                    <a href="#" class="icon-1"></a>
                </div>
                <div class="clear"></div>
            </div>
        </nav>
		