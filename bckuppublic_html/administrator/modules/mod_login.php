<?php   
/*#--------------------------------------------------------------------------#*/
/*# Site Builder - A Complete Content Management Solution - Administrator    #*/
/*# ------------------------------------------------------------------------ #*/
/*# Kre8iveminds                                                         	 #*/
/*# 16, Gangadhar Babu Lane, Near Central Metro                              #*/
/*# Kolkata - 700012                                                         #*/
/*# Websites:  http://www.kre8iveminds.com                                   #*/
/*#--------------------------------------------------------------------------#*/ 
class LoadLoginClass // Begin Class
 {
   function ShowLoginBox()
    {
      $uname = '';
	  $pwd = '';
	  if(!isset($_COOKIE['cuname']))
         $_COOKIE['cuname']='';
	  if(!isset($_COOKIE['cpword']))
         $_COOKIE['cpword']='';	 
		 
	  if ($_COOKIE['cuname'] != "" && $_COOKIE['cpword'] != ""){
	     $uname = $_COOKIE['cuname'];
	     $pwd   = $_COOKIE['cpword'];
	  }
	  
	  $LoginBox = ' 
	  <script src="js/login.js" type="text/javascript"></script>
      <form name="login_form" id="login_form" method="post" action="login_verify.php" onsubmit="return FuncLoginCheck();" >
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">';
        if(isset($_REQUEST['err']))
         {
           $LoginBox .= '
           <tr>
             <td align="center" valign="top" class="error_msg">';
             $LoginBox .= defined('CONSTANT_ERROR_INVALID_USERNAME') ? CONSTANT_ERROR_INVALID_USERNAME : "Invalid username or password";
             $LoginBox .= '</td>
           </tr>
           <tr>
             <td><img src="images/blank.gif" height="10" border="0" /></td>
           </tr>';
         }
		   if(isset($_REQUEST['err_blank']))
         {
           $LoginBox .= '
           <tr>
             <td align="center" valign="top" class="error_msg">';
             $LoginBox .= defined('CONSTANT_ERROR_BLANK_USERNAME') ? CONSTANT_ERROR_BLANK_USERNAME : "Do not leave username or password blank";
             $LoginBox .= '</td>
           </tr>
           <tr>
             <td><img src="images/blank.gif" height="10" border="0" /></td>
           </tr>';
         }
        $LoginBox .= '
        <tr>
          <td align="left"><table border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left" style="padding-left:30px;"><img src="__TEMPLATE_ROOT_PATH__images/login-icon.gif"  alt="" title="" /></td>
              <td align="left" valign="bottom" class="log_heading">Sign in</td>
            </tr>
          </table></td>
        </tr>    
        <tr>
          <td><img src="images/blank.gif" height="10" border="0" /></td>
        </tr>
        <tr>
          <td align="left" valign="top">
		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="40%" align="right" style="padding-right:10px;" class="label-text">';
              $LoginBox .= defined('CONSTANT_TEXT_USERNAME') ? CONSTANT_TEXT_USERNAME : "Username:";
              $LoginBox .= '</td>
              <td align="left" class="label-text"><input type="text" name="logusername" id="logusername" value="'.$pwd.'" title="" class="input_box" /></td>
            </tr>  
            <tr>
              <td colspan="2"><img src="images/blank.gif" height="10" border="0" /></td>
            </tr>
            <tr>
              <td align="right" style="padding-right:10px;" class="label-text">';
              $LoginBox .= defined('CONSTANT_TEXT_PASSWORD') ? CONSTANT_TEXT_PASSWORD : "Password:";
              $LoginBox .= '</td>
              <td align="left" class="label-text"><input type="password" name="logpassword" id="logpassword" value="'.$uname.'" title="" class="input_box" /></td>
            </tr>    
            <tr>
              <td colspan="2"><img src="images/blank.gif" height="10" border="0" /></td>
            </tr>
            <tr>
              <td align="left" class="label-text">&nbsp;</td>
              <td align="left" class="label-text">';
			  $chk = '';
			  if ($uname != "" && $pwd != ""){
			    $chk='checked="checked"';
			  } 
			  $LoginBox .='<input type="checkbox" name="logremember_me" id="logremember_me" value="1"'.$chk.' title="" class="no-border" />&nbsp;';
              $LoginBox .= defined('CONSTANT_TEXT_REMEMBER_ME') ? CONSTANT_TEXT_REMEMBER_ME : "Remember me:";
              $LoginBox .= '</td>
            </tr>  
            <tr>
              <td colspan="2"><img src="images/blank.gif" height="10" border="0" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="label-text">&nbsp;</td>
              <td align="left" valign="top"><input name="Submit" id="Submit"  type="submit" class="log_button" value="';
              $LoginBox .= defined('CONSTANT_BUTTON_SIGN_IN') ? CONSTANT_BUTTON_SIGN_IN : "Login";
              $LoginBox .= '" alt="" title="" style="cursor:pointer" />
              <input type="reset" class="log_button" value="';
              $LoginBox .= defined('CONSTANT_BUTTON_RESET') ? CONSTANT_BUTTON_RESET : "Reset";
              $LoginBox .= '" alt="" title="" style="cursor:pointer" /></td>
            </tr>
          </table>
		  </td>
        </tr>
      </table> 
      </form>';
      $LoginBox .= "\n";
      return $LoginBox;
    }
 }
?>