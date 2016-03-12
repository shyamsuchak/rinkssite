<!--============================Dropdown============== -->
<link rel="stylesheet" href="style/dropdown.css" type="text/css" />
<script type="text/javascript" src="js/dropdown.js"></script>
<!--============================Dropdown============== -->

<div class="header">
		<div class="header-top">
		<div class="logo"><a href="#"><img src="image/spacer.gif" alt="Sur-saaz" width="357" height="90" border="0" title="Sur-saaz" /></a> 
		</div> <!--logo ends here -->
		
		</div><!-- header-top ends here -->
		<div class="header-bottom">
		<div class="menu">
		<ul>
        
        <dl class="dropdown">
  <dt id="one-ddheader" onmouseover="ddMenu('one',1)" onmouseout="ddMenu('one',-1)"><a href="index.php">Home</a></dt>
</dl>

<dl class="dropdown">
  <dt id="two-ddheader" onmouseover="ddMenu('two',1)" onmouseout="ddMenu('two',-1)"><a href="aboutus.php">About Us</a></dt>
</dl>

<dl class="dropdown">
  <dt id="three-ddheader" onmouseover="ddMenu('three',1)" onmouseout="ddMenu('three',-1)"><a href="#">Sur</a></dt>
  <dd id="three-ddcontent" onmouseover="cancelHide('three')" onmouseout="ddMenu('three',-1)" style="margin-left:0px;">
    <ul class="submenu">
      <!--<li><a href="vocational-training.php" class="underline" id="voc">Vocational Training</a></li> -->
      <? 
		$sql=mysql_query("SELECT * FROM ".TBL_ARTIST_SUBCAT." WHERE publish=1 and art_cat_id=1  ORDER by art_cat_id ASC") or die(mysql_error());
		while ($fv_ct=mysql_fetch_object($sql))
		{
	  ?>  
      <li><a href="sur.php?subid=<?=stripslashes($fv_ct->art_subcat_id)?>" class="underline" id="voc"><?=stripslashes($fv_ct->art_subcat_name)?></a></li>
      <? }?> 
 </ul>
  </dd>
</dl>

<dl class="dropdown">
  <dt id="four-ddheader" onmouseover="ddMenu('four',1)" onmouseout="ddMenu('four',-1)"><a href="#">Saaz</a></dt>
  <dd id="four-ddcontent" onmouseover="cancelHide('four')" onmouseout="ddMenu('four',-1)" style="margin-left:0px;">
    <ul class="submenu">
       <? 
		$sql=mysql_query("SELECT * FROM ".TBL_ARTIST_SUBCAT." WHERE publish=1 and art_cat_id=2  ORDER by art_cat_id ASC") or die(mysql_error());
		while ($fv_ct=mysql_fetch_object($sql))
		{
	  ?>  
      <li><a href="saaz.php?subid=<?=stripslashes($fv_ct->art_subcat_id)?>" class="underline" id="voc"><?=stripslashes($fv_ct->art_subcat_name)?></a></li>
      <? }?> 
    </ul>
  </dd> 
</dl>

<dl class="dropdown">
  <dt id="five-ddheader" onmouseover="ddMenu('five',1)" onmouseout="ddMenu('five',-1)"><a href="artist.php">Artists</a></dt>
</dl>

<dl class="dropdown">
  <dt id="two-ddheader" onmouseover="ddMenu('six',1)" onmouseout="ddMenu('six',-1)"><a href="Upload.php">Upload</a></dt>
</dl>

<dl class="dropdown">
  <dt id="seven-ddheader" onmouseover="ddMenu('seven',1)" onmouseout="ddMenu('seven',-1)"><a href="contact_us.php">Contact Us</a></dt>
</dl>


<dl class="dropdown">
  <dt id="eight-ddheader" onmouseover="ddMenu('eight',1)" onmouseout="ddMenu('eight',-1)"><a href="feedback.php">Feedback</a></dt>
</dl>
		</ul>
		</div>
			<div class="clr"></div>
		<!--menu ends here -->
		</div> <!--header-bottom ends here -->
		</div> <!--header ends here -->