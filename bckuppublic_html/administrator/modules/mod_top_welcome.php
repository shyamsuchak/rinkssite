<?php   
/*#--------------------------------------------------------------------------#*/
/*# Site Builder - A Complete Content Management Solution - Administrator    #*/
/*# ------------------------------------------------------------------------ #*/
/*# Ghanshyam Prasad                                                         #*/
/*# Axsys Technologies Limited                                               #*/
/*# Kolkata - 700091                                                         #*/
/*# Websites:  http://www.axsyssoftware.com                                  #*/
/*#--------------------------------------------------------------------------#*/ 
class LoadTopWelcomeClass // Begin Class
 {
   function ShowWelcomeBox()
    {
      $TopWelcome = '
	  <!--<div class="welcome-user">'.CONSTANT_TEXT_WELCOME.'</div>-->
	  <div class="welcome-heading">'.CONSTANT_TEXT_WELCOME.' __CONSTANT_USERNAME__</div>';
      $TopWelcome .= "\n";
      return $TopWelcome;
    }
 }
?>