<?php   
/*#--------------------------------------------------------------------------#*/
/*# Site Builder - A Complete Content Management Solution - Administrator    #*/
/*# ------------------------------------------------------------------------ #*/
/*# Kre8iveminds                                                         	 #*/
/*# 16, Gangadhar Babu Lane, Near Central Metro                              #*/
/*# Kolkata - 700012                                                         #*/
/*# Websites:  http://www.kre8iveminds.com                                   #*/
/*#--------------------------------------------------------------------------#*/ 
class LoadFooterClass // Begin Class
 {
   function ShowFooterLinks()
    {
      $TopWelcome = '
      <table border="0" cellspacing="0" cellpadding="0" style="margin-right:10px">
       <tr>
         <td>';
         $TopWelcome .=  defined('CONFIG_CONT_ADMIN_COPYRIGHT') ? CONFIG_CONT_ADMIN_COPYRIGHT : '';
         $TopWelcome .=  ' Powered By <a href="http://www.kre8iveminds.com" target="_blank" >kre8iveminds.com</a>|<a href="mailto:contact@kre8iveminds.com">contact@kre8iveminds.com</a> &nbsp; <a href="#" target="_blank">Webmail</a>.</td>
       </tr>
      </table>';
      $TopWelcome .= "\n";
      return $TopWelcome;
    }
 }
?>