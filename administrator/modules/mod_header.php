<?php   
/*#--------------------------------------------------------------------------#*/
/*# Site Builder - A Complete Content Management Solution - Administrator    #*/
/*# ------------------------------------------------------------------------ #*/
/*# Kre8iveminds                                                         	 #*/
/*# 16, Gangadhar Babu Lane, Near Central Metro                              #*/
/*# Kolkata - 700012                                                         #*/
/*# Websites:  http://www.kre8iveminds.com                                   #*/
/*#--------------------------------------------------------------------------#*/ 
class LoadHeaderClass // Begin Class
 {            
   function GetParentId($PageIndex=1)
    {                    
      /*         BEGIN : Top Level Menu                                       */
      $SqlParent_01 ="SELECT AdmMenuID, AdmMenuParent FROM ".TBL_ADMIN_MENU." WHERE AdmMenuID='".$PageIndex."';";
      $RowParent_01 = mysql_fetch_object(mysql_query($SqlParent_01));
      $ParentID = $RowParent_01->AdmMenuID;
      if($RowParent_01->AdmMenuParent != 0)
       {                                                                 
         /*   BEGIN : Level 01 Menu List                                      */  
         $SqlParent_02 ="SELECT AdmMenuID, AdmMenuParent FROM ".TBL_ADMIN_MENU." WHERE AdmMenuID='".$RowParent_01->AdmMenuParent."';";
         $RowParent_02 = mysql_fetch_object(mysql_query($SqlParent_02));
         $ParentID = $RowParent_02->AdmMenuID;
         if($RowParent_02->AdmMenuParent != 0)
          {                                                                 
            /*   BEGIN : Level 02 Menu List                                   */ 
            $SqlParent_03 ="SELECT AdmMenuID, AdmMenuParent FROM ".TBL_ADMIN_MENU." WHERE AdmMenuID='".$RowParent_02->AdmMenuParent."';";
            $RowParent_03 = mysql_fetch_object(mysql_query($SqlParent_03));
            $ParentID = $RowParent_03->AdmMenuID;
            if($RowParent_03->AdmMenuParent != 0)
             {                                                                 
               /*   BEGIN : Level 03 Menu List                                */   
               $SqlParent_04 ="SELECT AdmMenuID, AdmMenuParent FROM ".TBL_ADMIN_MENU." WHERE AdmMenuID='".$RowParent_03->AdmMenuParent."';";
               $RowParent_04 = mysql_fetch_object(mysql_query($SqlParent_04));
               $ParentID = $RowParent_04->AdmMenuID;
               if($RowParent_04->AdmMenuParent != 0)
                {                                                                 
                  /*   BEGIN : Level 04 Menu List                             */   
                  $SqlParent_05 ="SELECT AdmMenuID, AdmMenuParent FROM ".TBL_ADMIN_MENU." WHERE AdmMenuID='".$RowParent_04->AdmMenuParent."';";
                  $RowParent_05 = mysql_fetch_object(mysql_query($SqlParent_05));
                  $ParentID = $RowParent_05->AdmMenuID;
                  /*   END   : Level 04 Menu List                             */
                }
               /*   END   : Level 03 Menu List                                */
             }
            /*   END   : Level 02 Menu List                                   */
          }
         /*   END   : Level 01 Menu List                                      */
       }
      /*         END   : Top Level Menu                                       */
      return $ParentID;
    }
   function ShowHeaderMenu($PageIndex=1)
    {                       
      /*         BEGIN : Top Level Menu                                       */
      $MenuList = '
      <div id="top_nav" style="float:left" align="left">
      <ul id="nav">';
      $MenuList .= "\n";  
      $SqlMenu_01 = "SELECT * FROM ".TBL_ADMIN_MENU." WHERE AdmMenuParent='0' AND AdmMenuStatus='1';";
      $RstMenu_01 = mysql_query($SqlMenu_01);
      while($RowMenu_01 = mysql_fetch_object($RstMenu_01))
       {        
         /*         Checking for parent category                              */
         $ParentID = $this->GetParentId($PageIndex);
         /*         Checking for sub caregories                               */
         if($ParentID == $RowMenu_01->AdmMenuID)
          {
            $MenuList .= '<li id="current" class="top"><a href="'.$RowMenu_01->AdmMenuPath.'" class="top_link"><span>'.$RowMenu_01->AdmMenuTitle.'</span>';
			
          }
         else
          {
            $MenuList .= '<li class="top"><a href="'.$RowMenu_01->AdmMenuPath.'" class="top_link"><span>'.$RowMenu_01->AdmMenuTitle.'</span>';
          }       
         $SqlCheck_01 = "SELECT COUNT(AdmMenuID) AS TotItem FROM ".TBL_ADMIN_MENU." WHERE AdmMenuParent=
         '".$RowMenu_01->AdmMenuID."' AND AdmMenuStatus='1';";
         $RowCheck_01 = mysql_fetch_object(mysql_query($SqlCheck_01));
         if($RowCheck_01->TotItem > 0)
          {           
            $MenuList .= '<!--[if gte IE 7]><!--></a><!--<![endif]-->';
            $MenuList .= '<!--[if lte IE 6]><table><tr><td><![endif]--><ul class="sub">'; 
            /*   BEGIN : Level 01 Menu List                                   */  
            $SqlMenu_02 = "SELECT * FROM ".TBL_ADMIN_MENU." WHERE AdmMenuParent='".$RowMenu_01->AdmMenuID."' AND AdmMenuStatus='1';";
            $RstMenu_02 = mysql_query($SqlMenu_02);
            while($RowMenu_02 = mysql_fetch_object($RstMenu_02))
             {
                  /*         Checking for sub caregories                               */
                 $SqlCheck_02 = "SELECT COUNT(AdmMenuID) AS TotItem FROM ".TBL_ADMIN_MENU." WHERE AdmMenuParent='".$RowMenu_02->AdmMenuID."' AND AdmMenuStatus='1';";
                 $RowCheck_02 = mysql_fetch_object(mysql_query($SqlCheck_02)); 
                 $LiAClass='';
                  if($RowCheck_02->TotItem > 0)
                   {
                     $LiAClass = 'class="fly"';
                   }
                  if($PageIndex == $RowMenu_02->AdmMenuID)
                   {
                     $MenuList .= '<li id="sub_current"><a href="'.$RowMenu_02->AdmMenuPath.'" '.$LiAClass.' >'.$RowMenu_02->AdmMenuTitle;
                   }
                  else
                   {         
                     $MenuList .= '<li><a href="'.$RowMenu_02->AdmMenuPath.'" '.$LiAClass.' >'.$RowMenu_02->AdmMenuTitle;
                   }
                  if($RowCheck_02->TotItem > 0)
                   {           
                     $MenuList .= '<!--[if gte IE 7]><!--></a><!--<![endif]-->';
                     $MenuList .= '<!--[if lte IE 6]><table><tr><td><![endif]--><ul>';
                     /*   BEGIN : Level 02 Menu List                                   */  
                     $SqlMenu_03 = "SELECT * FROM ".TBL_ADMIN_MENU." WHERE AdmMenuParent='".$RowMenu_02->AdmMenuID."'
                     AND AdmMenuStatus='1';";
                     $RstMenu_03 = mysql_query($SqlMenu_03);
                     while($RowMenu_03 = mysql_fetch_object($RstMenu_03))
                      {                              
                        if($PageIndex == $RowMenu_03->AdmMenuID)
                         {
                           $MenuList .= '<li id="sub_curr"><a href="'.$RowMenu_03->AdmMenuPath.'" >'.$RowMenu_03->AdmMenuTitle;
                         }
                        else
                         {         
                           $MenuList .= '<li><a href="'.$RowMenu_03->AdmMenuPath.'" >'.$RowMenu_03->AdmMenuTitle;
                         }  
                        /*         Checking for sub caregories                               */  
                        $SqlCheck_03 = "SELECT COUNT(AdmMenuID) AS TotItem FROM ".TBL_ADMIN_MENU." WHERE
                        AdmMenuParent='".$RowMenu_03->AdmMenuID."' AND AdmMenuStatus='1';";
                        $RowCheck_03 = mysql_fetch_object(mysql_query($SqlCheck_03));
                        if($RowCheck_03->TotItem > 0)
                         {           
                           $MenuList .= '<!--[if gte IE 7]><!--></a><!--<![endif]-->';
                           $MenuList .= '<!--[if lte IE 6]><table><tr><td><![endif]--><ul>';
                           /*   BEGIN : Level 03 Menu List                                   */   
                           $SqlMenu_04 = "SELECT * FROM ".TBL_ADMIN_MENU." WHERE AdmMenuParent='".$RowMenu_03->AdmMenuID."'
                           AND AdmMenuStatus='1';";
                           $RstMenu_04 = mysql_query($SqlMenu_04);
                           while($RowMenu_04 = mysql_fetch_object($RstMenu_04))
                            {                              
                              if($PageIndex == $RowMenu_04->AdmMenuID)
                               {
                                 $MenuList .= '<li id="sub_curr"><a href="'.$RowMenu_04->AdmMenuPath.'" >'.$RowMenu_04->AdmMenuTitle;
                               }
                              else
                               {         
                                 $MenuList .= '<li><a href="'.$RowMenu_04->AdmMenuPath.'" >'.$RowMenu_04->AdmMenuTitle;
                               }  
                              /*         Checking for sub caregories                               */  
                              $SqlCheck_04 = "SELECT COUNT(AdmMenuID) AS TotItem FROM ".TBL_ADMIN_MENU." WHERE
                              AdmMenuParent='".$RowMenu_04->AdmMenuID."' AND AdmMenuStatus='1';";
                              $RowCheck_04 = mysql_fetch_object(mysql_query($SqlCheck_04));
                              if($RowCheck_04->TotItem > 0)
                               {           
                                 $MenuList .= '<!--[if gte IE 7]><!--></a><!--<![endif]-->';
                                 $MenuList .= '<!--[if lte IE 6]><table><tr><td><![endif]--><ul>';
                                 /*   BEGIN : Level 04 Menu List                                   */     
                                 $SqlMenu_05 = "SELECT * FROM ".TBL_ADMIN_MENU." WHERE AdmMenuParent='".$RowMenu_04->AdmMenuID."'
                                 AND AdmMenuStatus='1';";
                                 $RstMenu_05 = mysql_query($SqlMenu_05);
                                 while($RowMenu_05 = mysql_fetch_object($RstMenu_05))
                                  {                              
                                    if($PageIndex == $RowMenu_05->AdmMenuID)
                                     {
                                       $MenuList .= '<li id="sub_curr"><a href="'.$RowMenu_05->AdmMenuPath.'" >'.$RowMenu_05->AdmMenuTitle.'</a></li>';
                                     }
                                    else
                                     {         
                                       $MenuList .= '<li><a href="'.$RowMenu_05->AdmMenuPath.'" >'.$RowMenu_05->AdmMenuTitle.'</a></li>';
                                     }
                                    $MenuList .= "\n";
                                  }
                                 /*   END   : Level 04 Menu List                                   */
                                 $MenuList .= '</ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>';
                               }
                              else
                               {
                                 $MenuList .= '</a></li>';
                               }
                              $MenuList .= "\n";
                            }
                           /*   END   : Level 03 Menu List                                   */
                           $MenuList .= '</ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>';
                         }
                        else
                         {
                           $MenuList .= '</a></li>';
                         }
                        $MenuList .= "\n";
                      }
                     /*   END   : Level 02 Menu List                                   */
                     $MenuList .= '</ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>';
                   }
                  else
                   {
                     $MenuList .= '</a></li>';
                   }
               $MenuList .= "\n";
             }
            /*   END   : Level 01 Menu List                                   */
            $MenuList .= '</ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>';
          }
         else
          {
            $MenuList .= '</a></li>';
          }
         $MenuList .= "\n";
       }
	   
	   $MenuList .= '<li class="top logout"><a href="logout.php" class="top_link">logout</a></li>';
	   
      $MenuList .= '</ul>
      </div>';
      $MenuList .= "\n";  
      /*         END   : Top Level Menu                                       */
      return $MenuList;
    }
 }
?>