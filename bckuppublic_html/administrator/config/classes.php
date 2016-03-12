<?php    
/*#--------------------------------------------------------------------------#*/
/*# Site Builder - A Complete Content Management Solution - Administrator    #*/
/*# ------------------------------------------------------------------------ #*/
/*# Kre8iveminds                                                         	 #*/
/*# 16, Gangadhar Babu Lane, Near Central Metro                              #*/
/*# Kolkata - 700012                                                         #*/
/*# Websites:  http://www.kre8iveminds.com                                   #*/
/*#--------------------------------------------------------------------------#*/        
                                                      
/*#------------BEGIN : Database Connection Class-----------------------------#*/
class DBConnect
 {
   var $db_conn = '';
   var $userid = '';
   var $username = '';                                            
   /*#---------BEGIN : Database Connection Function--------------------------#*/
   function DB_Connect()
    {    
      $this->db_conn = mysql_connect(DB_SERVER_HOST,DB_SERVER_USERNAME,DB_SERVER_PASSWORD);
      if (!$this->db_conn)
       {
         mysql_close($this->db_conn); //Ends the current connection to the database.
         tep_redirect(tep_href_link('offline.php'));
         exit();
       }
      else
       {
         if(!mysql_select_db(DB_SERVER_DATABASE,$this->db_conn))
          {
            tep_redirect(tep_href_link('offline.php'));
            exit();
          }
       }
    }  
   /*#---------END   : Database Connection Function--------------------------#*/
 }
/*#------------END   : Database Connection Class-----------------------------#*/
?>