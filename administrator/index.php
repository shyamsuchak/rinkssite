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

//Unset the variables stored in session

unset($_SESSION['SESS_MEMBER_ID']);
unset($_SESSION['SESS_FIRST_NAME']);
	
error_reporting(E_ALL);


require_once('config/connection.php');  
require_once('modules/class_template.php');   
require_once('modules/class_login_check.php');


/*#------------CHECKING FOR MEMBER LOGIN STATUS------------------------------#*/
$UserDetails = new LoadLoginCheckClass();

if($UserDetails->GetIsMemberLogin() == false)
 {               
   tep_redirect(tep_href_link('login.php'));
   exit();
 }
/*#------------SET PAGE INDEX FOR THIS PAGE----------------------------------#*/
define('PAGE_INDEX', 1);
define('JPATH_BASE', dirname(__FILE__) );

/*#------------LOADING SELECTED TEMPLATE AND PAGE CONTENTS-------------------#*/
$Current_Template = new LoadSelectedTemplate();
echo $Current_Template->SelectTemplateLayout();
?>