<?php  
/*#--------------------------------------------------------------------------#*/
/*# Site Builder - A Complete Content Management Solution - Administrator    #*/
/*# ------------------------------------------------------------------------ #*/
/*# Kre8iveminds                                                         	 #*/
/*# 16, Gangadhar Babu Lane, Near Central Metro                              #*/
/*# Kolkata - 700012                                                         #*/
/*# Websites:  http://www.kre8iveminds.com                                   #*/
/*#--------------------------------------------------------------------------#*/        
                                                      
/*#------------BEGIN : Load login check class--------------------------------#*/
class LoadLoginCheckClass
 {                                 
   /*#---------BEGIN : Check User Login Status Function----------------------#*/  
   function GetIsMemberLogin()
    {
      if(isset($_SESSION[LOG_SESSION_PREFIX."admin_userid"]) && isset($_SESSION[LOG_SESSION_PREFIX."admin_username"]))
       {
         if($_SESSION[LOG_SESSION_PREFIX."admin_userid"] != '' && $_SESSION[LOG_SESSION_PREFIX."admin_username"] !='')
          {
            return true;
          }
       } 
      return false;
    }
   /*#---------END   : Check User Login Status Function----------------------#*/                         
   /*#---------BEGIN : Check User Logged Username----------------------------#*/
   function GetIsMemberName($Type="username")
    {
      if($Type == "name")
       {              
         $SqlUser = "SELECT MemName FROM ".TBL_MEMBER_LOG_DETAILS." WHERE MemID='".$_SESSION[LOG_SESSION_PREFIX."admin_userid"]."';";
         $RowUser = mysql_fetch_object(mysql_query($SqlUser));
         $LogUser = $RowUser->MemName;
       }
      else
       {
         $LogUser = isset($_SESSION[LOG_SESSION_PREFIX."admin_username"]) ? $_SESSION[LOG_SESSION_PREFIX."admin_username"] : CONSTANT_TEXT_GUEST;
       }
      return $LogUser;
    }
   /*#---------END   : Check User Logged Username----------------------------#*/
 }
/*#------------END   : Load login check class--------------------------------#*/
 
?>