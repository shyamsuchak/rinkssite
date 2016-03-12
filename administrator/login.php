<?php       
/*#--------------------------------------------------------------------------#*/
/*# Site Builder - A Complete Content Management Solution - Administrator    #*/
/*# ------------------------------------------------------------------------ #*/
/*# Kre8iveminds                                                         	 #*/
/*# 16, Gangadhar Babu Lane, Near Central Metro                              #*/
/*# Kolkata - 700012                                                         #*/
/*# Websites:  http://www.kre8iveminds.com                                   #*/
/*#--------------------------------------------------------------------------#*/ 
                           
/*#------------PHP SESSION START HERE----------------------------------------#*/  
session_start();
error_reporting(E_ALL);
require_once('config/connection.php');
require_once('modules/class_log_template.php');   
require_once('modules/class_login_check.php');
/*#------------Cheching For User Login Status--------------------------------#*/
$UserDetails = new LoadLoginCheckClass();
if($UserDetails->GetIsMemberLogin() == true)
 {               
   tep_redirect(tep_href_link('index.php'));
 }
/*#------------Load Selected Template----------------------------------------#*/
$Current_Template = new LoadSelectedTemplate();
echo $Current_Template->SelectTemplateLayout();
//echo isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
?>