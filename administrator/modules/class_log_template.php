<?php  
/*#--------------------------------------------------------------------------#*/
/*# Site Builder - A Complete Content Management Solution - Administrator    #*/
/*# ------------------------------------------------------------------------ #*/
/*# Kre8iveminds                                                         	 #*/
/*# 16, Gangadhar Babu Lane, Near Central Metro                              #*/
/*# Kolkata - 700012                                                         #*/
/*# Websites:  http://www.kre8iveminds.com                                   #*/
/*#--------------------------------------------------------------------------#*/        
                                                      
/*#------------BEGIN : Load your select template-----------------------------#*/
class LoadSelectedTemplate
 {                                 
   /*#---------BEGIN : Select default or selected language file--------------#*/
   function RecentFileName()
    {                       
      $URL_Path = explode("/",$_SERVER['REQUEST_URI']);
      $Count = count($URL_Path)-1; 
      $PageNameArr = explode("?",$URL_Path[$Count]);
      $PageName = $PageNameArr[0];
      if($PageName == "")
       {
         $PageName = "index.php";
       }
      return $PageName;
    }
   /*#---------END   : Select default or selected language file--------------#*/    
   /*#---------BEGIN : Select default or selected language file--------------#*/
   function SelectTemplateLang()
    {
      $LangFolder = defined('CONFIG_CONT_ADMIN_LANGUAGE') ? CONFIG_CONT_ADMIN_LANGUAGE : 'eng';
      if(is_file("language/".$LangFolder."/lang_".$this->RecentFileName()))
       {   
         require_once ("language/".$LangFolder."/lang_common.php");
         require_once ("language/".$LangFolder."/lang_".$this->RecentFileName());
       }
      else
       {  
         tep_redirect(tep_href_link('../offline.php'));
       }
    }      
   /*#---------END   : Select default or selected language file--------------#*/                         
   /*#---------BEGIN : Select default or selected language file--------------#*/
   function SelectJavaScriptFile()
    {         
      $PageName = $this->RecentFileName();              
      $JsFile = '<script src="js/common.js" type="text/javascript"></script>';
      $JsFile .= "\n";
      $JsFile = '<script src="js/'.$PageName.'.js" type="text/javascript"></script>';
      $JsFile .= "\n";  
      return $JsFile;
    }      
   /*#---------END   : Select default or selected language file--------------#*/   
   /*#---------BEGIN : Select lelected template layout-----------------------#*/
   function SelectTemplateLayout()
    {
      $this->SelectTemplateLang();  
      $TempFolder = defined('CONFIG_CONT_ADMIN_TEMPLATE') ? CONFIG_CONT_ADMIN_TEMPLATE : 'default';
      $Temp_Path = "template/".$TempFolder."/";
      $fp=fopen($Temp_Path."log_layout.html","r");
      $fcontent=fread($fp,filesize($Temp_Path."/log_layout.html"));
      fclose($fp);
      /*#---------Replace Java Script File-----------------------------------#*/
      $fcontent = str_replace("__HEAD_JAVASCRIPT_LINKS__",$this->SelectJavaScriptFile(),$fcontent);  
      /*#---------Replace Site Name & LOGO-----------------------------------#*/
      if(defined('CONFIG_CONT_LOGO_TYPE') && CONFIG_CONT_LOGO_TYPE == 1)
       {     
         $SiteName =  defined('CONFIG_CONT_LOGO_PATH') ? CONFIG_CONT_LOGO_PATH : "../logo/logo.gif";
         if(!is_file($SiteName)) 
           $SiteName =  "logo/logo.jpg";
         $SiteName = '<a href="index.php"><img src="'.$SiteName.'" border="0" /></a>';
       }
      else
       {  
         $SiteName =  defined('CONFIG_CONT_SITENAME') ? CONFIG_CONT_SITENAME : CONSTANT_SITE_NAME;
         $SiteName = '<a href="index.php" class="text">'.$SiteName.'</a>';
       }
      $fcontent = str_replace("__SITE_LOGO_SECTION__",$SiteName,$fcontent); 
      /*#---------Replace page footer section--------------------------------#*/
      if(is_file("modules/mod_footer.php"))
       {
         include ("modules/mod_footer.php");
         $FooterText = new LoadFooterClass;
         $fcontent = str_replace("__FOOTER_LINKS_AND_TEXT_SECTION__",$FooterText->ShowFooterLinks(),$fcontent);
       } 
      else
       {  
         $fcontent = str_replace("__FOOTER_LINKS_AND_TEXT_SECTION__","",$fcontent);
       }
      /*#---------Replace page login section---------------------------------#*/
      if(is_file("modules/mod_login.php"))
       {
         include ("modules/mod_login.php");
         $LoginBox = new LoadLoginClass;
         $fcontent = str_replace("__SITE_LOGIN_SECTION__",$LoginBox->ShowLoginBox(),$fcontent);
       } 
      else
       {  
         $fcontent = str_replace("__SITE_LOGIN_SECTION__","",$fcontent);
       }
      /*#---------Replace Site Title-----------------------------------------#*/    
      $fcontent = str_replace("__PAGE_WINDOW_BAR_TITLE__",defined('CFG_ADMIN_PAGE_TITLE') ? CFG_ADMIN_PAGE_TITLE : CONSTANT_META_TITLE,$fcontent);
      /*#---------Replace Template Root Path---------------------------------#*/
      $fcontent = str_replace("__TEMPLATE_ROOT_PATH__",$Temp_Path,$fcontent);
      return $fcontent;
    }
   /*#---------END   : Select lelected template layout-----------------------#*/
 }
/*#------------END   : Load your select template-----------------------------#*/
 
?>