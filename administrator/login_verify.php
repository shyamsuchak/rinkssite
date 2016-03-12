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
//$MemPassword=mysql_real_escape_string($_POST['logpassword']); 
//$MemPassword=md5($MemPassword); // Encrypted Password

if(isset($_POST['logusername']) && $_POST['logusername'] != "" &&
isset($_POST['logpassword']) && $_POST['logpassword'] != "")

 {
   $SqlLogCheck = "SELECT MemID, MemUsername, MemPassword  FROM ".TBL_MEMBER_LOG_DETAILS." WHERE
   MemLogStatus='2' AND MemBlock='0' AND MemUsername='".$_POST['logusername']."' AND
   MemPassword='".$_POST['logpassword']."' AND MemTypeKey='MEM_TYPE_ADMINS';";
   $RstLogCheck = mysql_query($SqlLogCheck);
   if($RowLogCheck = mysql_fetch_object($RstLogCheck))
    {   
      if($RowLogCheck->MemUsername == $_POST['logusername'] && $RowLogCheck->MemPassword == $_POST['logpassword'])
       {
         $_SESSION[LOG_SESSION_PREFIX."admin_userid"] = $RowLogCheck->MemID;
         $_SESSION[LOG_SESSION_PREFIX."admin_username"] = $RowLogCheck->MemUsername;
		 
		 $logremember_me ='';
		
		 if(!isset($_POST['logremember_me']))
         $_POST['logremember_me'] = '';
		 
		 $logremember_me = $_POST['logremember_me'];
		 
		 if ($logremember_me == '1') {
			setcookie('cuname', $RowLogCheck->MemUsername, time()+60*60*24*7);
			setcookie('cpword', $RowLogCheck->MemPassword, time()+60*60*24*7);
		 }
		 else {
			setcookie('cuname', $RowLogCheck->MemUsername, time()-60);
			setcookie('cpword', $RowLogCheck->MemPassword, time()-60); 
		 }
		 
         $SqlUpdate = "UPDATE ".TBL_MEMBER_LOG_DETAILS." SET MemIsLog='1' WHERE MemID='".$RowLogCheck->MemID."';";
         $RstUpdate = mysql_query($SqlUpdate);
         $SqlInsert = "INSERT INTO ".TBL_MEMBER_LOGS." VALUES ('".$RowLogCheck->MemID."', '".$_SERVER['REMOTE_ADDR']."', now());";
         $RstInsert = mysql_query($SqlInsert);
         tep_redirect(tep_href_link('index.php'));
       }
    }
   tep_redirect(tep_href_link('login.php','err'));
 }
 else
 {
   tep_redirect(tep_href_link('login.php','err_blank'));
 }
?>