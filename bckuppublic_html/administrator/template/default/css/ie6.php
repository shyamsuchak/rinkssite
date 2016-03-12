<?php header("Content-type: text/css"); ?>
/*------------------------------------------------------------------------
# JA Trona for Joomla 1.5 - Version 1.0 - Licence Owner JA128467
# ------------------------------------------------------------------------
# Copyright (C) 2004-2008 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
# @license - Copyrighted Commercial Software
# Author: J.O.O.M Solutions Co., Ltd
# Websites:  http://www.joomlart.com -  http://www.joomlancers.com
# This file may not be redistributed in whole or significant part.
-------------------------------------------------------------------------*/
<?php
$template_path = dirname( dirname( $_SERVER['REQUEST_URI'] ) );
?>
h1.logo a {
 	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/logo.png', sizingMethod='image');
 	background-image: none;
}

#login-wrap {
 	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/login.png', sizingMethod='crop');
 	background-image: none;
 	width: 80%;
}

#login-wrap form {
	position: relative;
}

#ja-topsl {
 	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/topsl-bg.png', sizingMethod='crop');
 	background-image: none;
}

.narrow #ja-topsl {
 	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/topsl-bg-n.png', sizingMethod='crop');
 	background-image: none;
}

#ja-topsl .ja-box-left,
#ja-topsl .ja-box-right,
#ja-topsl .ja-box-center,
#ja-topsl .ja-box-full {
	position: relative;
}

#ja-search .inputbox {
	width: 105px;
}

.ja-cpanel-switcher, .hide {
 	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/cpanel-hide.png', sizingMethod='crop');
 	background-image: none;
 	cursor: pointer;
}

.show {
 	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/cpanel-show.png', sizingMethod='crop');
 	background-image: none;
}

#ja-mainnavwrap,
#ja-headerwrap {
	z-index: 100;
}
#ja-cssmenu li ul {
 	filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path;?>/images/trans-bg.png', sizingMethod='scale');
 	background-image: none;
}
#ja-cssmenu li li{
  background: url(../images/blank.png)!important;
}
