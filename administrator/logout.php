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
/*#------------PHP ERROR REPORTING LEVEL-------------------------------------#*/
error_reporting(E_ALL);
require_once('config/connection.php');
/*#------------Checking user-------------------------------------------------#*/  
$SqlUpdate = "UPDATE ".TBL_MEMBER_LOG_DETAILS." SET MemIsLog='0' WHERE
MemID='".$_SESSION[LOG_SESSION_PREFIX."admin_userid"]."';";
$RstUpdate = mysql_query($SqlUpdate);
$_SESSION[LOG_SESSION_PREFIX."admin_userid"] = "";
$_SESSION[LOG_SESSION_PREFIX."admin_username"] = "";
session_unset();
session_destroy();
tep_redirect(tep_href_link('login.php'));
?>