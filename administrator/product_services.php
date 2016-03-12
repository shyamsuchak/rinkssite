<?php        
/*#--------------------------------------------------------------------------#*/
/*# Site Builder - A Complete Content Management Solution - Administrator    #*/
/*# ------------------------------------------------------------------------ #*/
/*# Kre8iveminds                                                         	 #*/
/*# 16, Gangadhar Babu Lane, Near Central Metro                              #*/
/*# Kolkata - 700012                                                         #*/
/*# Websites:  http://www.kre8iveminds.com                                   #*/
/*#--------------------------------------------------------------------------#*/  
/*# index.php                                                                #*/
/*# ------------------------------------------------------------------------ #*/
                           
/*#------------PHP SESSION AND INCLUDES FILES START HERE---------------------#*/
session_start();   
error_reporting(E_ALL);
require_once('config/connection.php');  
require_once('modules/class_template.php');   
require_once('modules/class_login_check.php');
require_once('config/ResizeImage.Class.php');  
/*#------------CHECKING FOR MEMBER LOGIN STATUS------------------------------#*/
$UserDetails = new LoadLoginCheckClass();
if($UserDetails->GetIsMemberLogin() == false)
 {               
   tep_redirect(tep_href_link('login.php'));
   exit();
 }
/*#------------SET PAGE INDEX FOR THIS PAGE----------------------------------#*/
define('PAGE_INDEX', 23);
/*#------------LOADING SELECTED TEMPLATE AND PAGE CONTENTS-------------------#*/
$Current_Template = new LoadSelectedTemplate();
define('CURRENT_PAGE_NAME', $Current_Template->RecentFileName());
echo $Current_Template->SelectTemplateLayout();
?>