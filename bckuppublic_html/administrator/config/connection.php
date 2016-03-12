<?php  
/*#--------------------------------------------------------------------------#*/
/*# Site Builder - A Complete Content Management Solution - Administrator    #*/
/*# ------------------------------------------------------------------------ #*/
/*# Kre8iveminds                                                         	 #*/
/*# 16, Gangadhar Babu Lane, Near Central Metro                              #*/
/*# Kolkata - 700012                                                         #*/
/*# Websites:  http://www.kre8iveminds.com                                   #*/
/*#--------------------------------------------------------------------------#*/        

/*#------------Include required files----------------------------------------#*/  
require_once('../config/configuration.php');
require_once('../config/site_builer_db_tables.php');

require_once('config/error_handler.php');
require_once('config/functions.php');
require_once('config/classes.php');
           
/*#------------Databse Configuration-----------------------------------------#*/
$DB_Conn = new DBConnect();
$DB_Connect = $DB_Conn->DB_Connect();

            
/*#------------BEGIN : Load your select template-----------------------------#*/
$SqlConfig = "SELECT CfgKey, CfgValue FROM ".TBL_CONFIGURATION.";";
$RstConfig = mysql_query($SqlConfig);
while($RowConfig = mysql_fetch_object($RstConfig))
 {
   define($RowConfig->CfgKey,$RowConfig->CfgValue);
 }
/*#------------END   : Load your select template-----------------------------#*/
?>