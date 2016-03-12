<?php         
/*#--------------------------------------------------------------------------#*/
/*# Site Builder - A Complete Content Management Solution - Administrator    #*/
/*# ------------------------------------------------------------------------ #*/
/*# Kre8iveminds                                                         	 #*/
/*# 16, Gangadhar Babu Lane, Near Central Metro                              #*/
/*# Kolkata - 700012                                                         #*/
/*# Websites:  http://www.kre8iveminds.com                                   #*/
/*#--------------------------------------------------------------------------#*/  
/*# com_index.php                                                            #*/
/*# ------------------------------------------------------------------------ #*/
                  
class LoadPageContentClass
 {

	function ShowPageContent()
    {
      $pcontent ='
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left" valign="top">   
          <div class="menu-pos">  ';
          $Count = 0;
          $SqlLinks ="SELECT * FROM ".TBL_ADMIN_MENU." WHERE AdmMenuParent='".PAGE_INDEX."';";
          $RstLinks = mysql_query($SqlLinks);
          while($RowLinks = mysql_fetch_object($RstLinks))
           {   
             $pcontent .='
			 <div align="left" valign="top" class="fade" ><a href="'.$RowLinks->AdmMenuPath.'">
			 	<div class="menu-block" id="a'.$RowLinks->AdmMenuID.'">'/*.$RowLinks->AdmMenuID*/.$RowLinks->AdmMenuTitle.'</div></a>
			 </div>'; 
           }
          $pcontent .='
		  <div class="clr"></div>
          </div>
		  
		  
		  </td>
        </tr>
      </table><script type="text/javascript" src="jss/jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){ 
	$(".fade").hover(function() {
		$(this).siblings().stop().fadeTo(200,0.2);
	}, function() {
		$(this).siblings().stop().fadeTo(200,1);
	});
});
</script>';
      return $pcontent;
    }
	
	
	
	
	
 }
?>