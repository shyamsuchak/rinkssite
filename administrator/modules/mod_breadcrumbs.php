<?php   
/*#--------------------------------------------------------------------------#*/
/*# Site Builder - A Complete Content Management Solution - Administrator    #*/
/*# ------------------------------------------------------------------------ #*/
/*# Kre8iveminds                                                         	 #*/
/*# 16, Gangadhar Babu Lane, Near Central Metro                              #*/
/*# Kolkata - 700012                                                         #*/
/*# Websites:  http://www.kre8iveminds.com                                   #*/
/*#--------------------------------------------------------------------------#*/ 
class LoadBreadCrumbsClass // Begin Class
 {   
   function ShowBreadCrumb($PageIndex=1)
    {          
      $BreadCrumbsLinks = '';
      $BreadCrumbs ='<div style="float:left" class="breadcrumbs">'."\n";
      $SqlBraedParent = "SELECT * FROM ".TBL_ADMIN_MENU." WHERE AdmMenuID='".$PageIndex."' AND AdmMenuStatus='1';";
      $RstBraedParent = mysql_query($SqlBraedParent);
      $RowBraedParent = mysql_fetch_object($RstBraedParent);   
      $menulist = isset($_REQUEST['menulist']) ? $_REQUEST['menulist'] : '';
      if($menulist !="")
       {
         $SqlBraedParent01 = "SELECT * FROM ".MODULES." WHERE ModID='".$menulist."';";
         if($RowBraedParent01 = mysql_fetch_object(mysql_query($SqlBraedParent01)))
           $BreadCrumbsLinks ='<label>'.$RowBraedParent01->ModTitle.'</label>'."\n";
       }
      else
       {    
         $BreadCrumbsLinks ='<label>'.$RowBraedParent->AdmMenuTitle.'</label>'."\n";
       }
      if($RowBraedParent->AdmMenuParent != 0)
       {   
         $SqlBraed_01 = "SELECT * FROM ".TBL_ADMIN_MENU." WHERE AdmMenuID='".$RowBraedParent->AdmMenuParent."' AND AdmMenuStatus='1';";
         $RstBraed_01 = mysql_query($SqlBraed_01);
         $RowBraed_01 = mysql_fetch_object($RstBraed_01);
         $BreadCrumbsLinks ='<a href="'.$RowBraed_01->AdmMenuPath.'">'.$RowBraed_01->AdmMenuTitle.'</a>'.$BreadCrumbsLinks."\n";
         if($RowBraed_01->AdmMenuParent != 0)
          {    
            $SqlBraed_02 = "SELECT * FROM ".TBL_ADMIN_MENU." WHERE AdmMenuID='".$RowBraed_01->AdmMenuParent."' AND AdmMenuStatus='1';";
            $RstBraed_02 = mysql_query($SqlBraed_02);
            $RowBraed_02 = mysql_fetch_object($RstBraed_02);
            $BreadCrumbsLinks ='<a href="'.$RowBraed_02->AdmMenuPath.'">'.$RowBraed_02->AdmMenuTitle.'</a>'.$BreadCrumbsLinks."\n";
            if($RowBraed_02->AdmMenuParent != 0)
             {    
               $SqlBraed_03 = "SELECT * FROM ".TBL_ADMIN_MENU." WHERE AdmMenuID='".$RowBraed_02->AdmMenuParent."' AND AdmMenuStatus='1';";
               $RstBraed_03 = mysql_query($SqlBraed_03);
               $RowBraed_03 = mysql_fetch_object($RstBraed_03);
               $BreadCrumbsLinks ='<a href="'.$RowBraed_03->AdmMenuPath.'">'.$RowBraed_03->AdmMenuTitle.'</a>'.$BreadCrumbsLinks."\n";
             }
          }
       }
      if(defined('CONFIG_CONT_HOME_ADMIN_BREADCRUMBS') && CONFIG_CONT_HOME_ADMIN_BREADCRUMBS == 1 && $PageIndex != 1)
       {      
         $SqlBraedHome = "SELECT * FROM ".TBL_ADMIN_MENU." WHERE AdmMenuID='1' AND AdmMenuStatus='1';";
         $RstBraedHome = mysql_query($SqlBraedHome);
         $RowBraedHome = mysql_fetch_object($RstBraedHome);
         $BreadCrumbsLinks ='<a href="'.$RowBraedHome->AdmMenuPath.'">'.$RowBraedHome->AdmMenuTitle.'</a>'.$BreadCrumbsLinks."\n";
       }
      $BreadCrumbs .=$BreadCrumbsLinks."\n";
      $BreadCrumbs .='</div>'."\n"; 
      return $BreadCrumbs;
    }
 }
?>