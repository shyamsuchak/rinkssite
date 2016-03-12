<?php    
/*#--------------------------------------------------------------------------#*/
/*# Site Builder - A Complete Content Management Solution - Administrator    #*/
/*# ------------------------------------------------------------------------ #*/
/*# Kre8iveminds                                                         	 #*/
/*# 16, Gangadhar Babu Lane, Near Central Metro                              #*/
/*# Kolkata - 700012                                                         #*/
/*# Websites:  http://www.kre8iveminds.com                                   #*/
/*#--------------------------------------------------------------------------#*/  
/*# class_template.php                                                       #*/
/*# ------------------------------------------------------------------------ #*/
                                                      
/*#------------BEGIN : Loading Selected Template Layout Class----------------#*/
class LoadSelectedTemplate
 {                                 
   /*#---------BEGIN : Find The Recent File Name-----------------------------#*/
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
   /*#---------END   : Find The Recent File Name-----------------------------#*/
   /*#---------BEGIN : Selecting The Default or Selected Language File-------#*/
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
         tep_redirect(tep_href_link('../off.php'));
       }
    }      
   /*#---------END   : Selecting The Default or Selected Language File-------#*/
   /*#---------BEGIN : Selecting The Default or Selected Java Script File----#*/
   function SelectJavaScriptFile()
    {
      $PageName = explode('.',$this->RecentFileName()); 
	                           
      $JsFile = '<script src="js/common.js" type="text/javascript"></script>'; 
      $JsFile .= "\n";       
      $JsFile .= '<script src="js/'.$PageName[0].'.js" type="text/javascript"></script>'; 
      $JsFile .= "\n";       
      /*$JsFile .= '<script type="text/javascript" src="scripts/wysiwyg.js"></script>';*/
	  $JsFile .= '<script type="text/javascript" src="ckeditor/ckeditor.js"></script>';
      $JsFile .= "\n";       
      /*$JsFile .= '<script type="text/javascript" src="scripts/wysiwyg-settings.js"></script>';
      $JsFile .= "\n";  */
      return $JsFile;
    }      
   /*#---------END   : Selecting The Default or Selected Java Script File----#*/
   /*#---------BEGIN : Loading The Default or Selected Template Layout-------#*/
   function SelectTemplateLayout()
    {
      $this->SelectTemplateLang();  
      $TempFolder = defined('CONFIG_CONT_ADMIN_TEMPLATE') ? CONFIG_CONT_ADMIN_TEMPLATE : 'default';
      $Temp_Path = "template/".$TempFolder."/";
	   	  
		   $basename = basename($_SERVER['PHP_SELF']);
			   if($basename == "index.php")
			   {     
				  $fp=fopen($Temp_Path."index_layout.php","r");
				  $fcontent=fread($fp,filesize($Temp_Path."/index_layout.php"));
			  }
			  else{
				  $fp=fopen($Temp_Path."page_layout.php","r");
				  $fcontent=fread($fp,filesize($Temp_Path."/page_layout.php"));
			  }
	  
      fclose($fp);
      /*          Replacing Java Script Files                                #*/
      $fcontent = str_replace("__HEAD_JAVASCRIPT_LINKS__",$this->SelectJavaScriptFile(),$fcontent);

      /*          Replacing Site name and Logo                               #*/
      if(defined('CONFIG_CONT_LOGO_TYPE') && CONFIG_CONT_LOGO_TYPE == 1)
       {     
         $SiteName =  defined('CONFIG_CONT_LOGO_PATH') ? CONFIG_CONT_LOGO_PATH : "../logo/logo.gif";
         if(!is_file($SiteName)) 
           $SiteName =  "../logo/logo.png";
         $SiteName = '<img src="'.$SiteName.'" border="0" />';
       }
      else
       {  
         $SiteName =  defined('CONFIG_CONT_SITENAME') ? CONFIG_CONT_SITENAME : CONSTANT_SITE_NAME;
         $SiteName = ''.$SiteName.'';
       }
      $fcontent = str_replace("__SITE_LOGO_SECTION__",$SiteName,$fcontent);
       
      /*          Replacing Welcome Section of The Selected Template         #*/
      if(is_file("modules/mod_top_welcome.php"))
       {
         include ("modules/mod_top_welcome.php");
         $TopWelcome = new LoadTopWelcomeClass;
         $fcontent = str_replace("__SITE_WELCOME_SECTION__",$TopWelcome->ShowWelcomeBox(),$fcontent);
       }
      else
       {  
         $fcontent = str_replace("__SITE_WELCOME_SECTION__","",$fcontent);
       }
               
      /*          Replacing Header Section of The Selected Template          #*/
      if(is_file("modules/mod_header.php"))
       {
         include ("modules/mod_header.php");
         $HeaderMenu = new LoadHeaderClass;
         $fcontent = str_replace("__HEADER_MENU_SECTION__",$HeaderMenu->ShowHeaderMenu(PAGE_INDEX),$fcontent);
       } 
      else
       {  
         $fcontent = str_replace("__HEADER_MENU_SECTION__","",$fcontent);
       }
                    
      /*          Replacing Breadcrumbs Section of The Selected Template     #*/
      if(defined('CONFIG_CONT_SHOW_ADMIN_BREADCRUMBS') && CONFIG_CONT_SHOW_ADMIN_BREADCRUMBS == 1)
       {
         if(is_file("modules/mod_breadcrumbs.php"))
          {
            include ("modules/mod_breadcrumbs.php");
            $Bread_Crumbs = new LoadBreadCrumbsClass;
            $fcontent = str_replace("__PAGE_BREADCRUMBS_SECTION__",$Bread_Crumbs->ShowBreadCrumb(PAGE_INDEX),$fcontent);
          }
       } 
      else
       {  
         $fcontent = str_replace("__PAGE_BREADCRUMBS_SECTION__","",$fcontent);
       }
         
      /*          Replacing Footer Section of The Selected Template          #*/
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
         
      /*          Replacing Meta Title Section of The Selected Template      #*/
      $fcontent = str_replace("__PAGE_WINDOW_BAR_TITLE__",defined('CFG_DEFAULT_ADMIN_PAGE_TITLE') ? CFG_DEFAULT_ADMIN_PAGE_TITLE : CONSTANT_META_TITLE,$fcontent);

      /*          Replacing Logged In Username                               #*/
      $UserDetails = new LoadLoginCheckClass();
      $LogUser = $UserDetails->GetIsMemberName("name");
      $fcontent = str_replace("__CONSTANT_USERNAME__",$LogUser,$fcontent);
             
      /*          Replacing Page Content Section of The Selected Template    #*/
      if(is_file("components/com_".$this->RecentFileName()))
       {
         include ("components/com_".$this->RecentFileName());
         $PageContent = new LoadPageContentClass;
         $fcontent = str_replace("__DYNAMIC_PAGE_CONSTANT_SECTION__",$PageContent->ShowPageContent(),$fcontent);
       } 
      else
       {  
         $fcontent = str_replace("__DYNAMIC_PAGE_CONSTANT_SECTION__","",$fcontent);
       }   

      /*          Replacing Root Path of The Selected Template               #*/
      $fcontent = str_replace("__TEMPLATE_ROOT_PATH__",$Temp_Path,$fcontent); 
      return $fcontent;
    }
   /*#---------END   : Loading The Default or Selected Template Layout-------#*/
 }
/*#------------END   : Loading Selected Template Layout Class----------------#*/
?>