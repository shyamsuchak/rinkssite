<?php         
/*#--------------------------------------------------------------------------#*/
/*# Site Builder - A Complete Content Management Solution - Administrator    #*/
/*# ------------------------------------------------------------------------ #*/
/*# Kre8iveminds                                                         	 #*/
/*# 16, Gangadhar Babu Lane, Near Central Metro                              #*/
/*# Kolkata - 700012                                                         #*/
/*# Websites:  http://www.kre8iveminds.com                                   #*/
/*#--------------------------------------------------------------------------#*/  
class LoadPageContentClass
 {
   function ShowPageContent()
    {
      $DataID = isset($_POST['DataID']) ? $_POST['DataID'] : '';   
      $PageAction = isset($_POST['PageAction']) ? $_POST['PageAction'] : ''; 
      $PageNo = isset($_REQUEST['PageNo']) ? $_REQUEST['PageNo'] : 1;
      $EachPage = isset($_REQUEST['EachPage']) ? $_REQUEST['EachPage'] : 10;
	  	  $ActionPath = CURRENT_PAGE_NAME."?PageNo=".$PageNo."&EachPage=".$EachPage;
	  
      /* BEGIN : Add New Record To The Database */   
      if(isset($_REQUEST['Action']) && $_REQUEST['Action'] == "ActionSaveNewData" && $PageAction =="SaveNewData")
       {  
         $SqlOrder = "SELECT MAX(newOrder) AS MaxOrder FROM ".TBL_GALLERY.";";
         $RowOrder = mysql_fetch_object(mysql_query($SqlOrder));
         $OrderNo = $RowOrder->MaxOrder + 1;
         $SqlMaxID = "SELECT MAX(gal_img_id) AS MaxID FROM ".TBL_GALLERY.";";
         $RowMaxID = mysql_fetch_object(mysql_query($SqlMaxID));
         $MaxID = $RowMaxID->MaxID + 1;
		  extract($_POST);
		   $file='';
		  if(is_uploaded_file($_FILES['gal_img_image']['tmp_name']))
		  {
		     $ext = ".".end(explode('.', $_FILES['gal_img_image']['name']));
			 $file=$MaxID.$ext;
			 //$file=time().$_FILES['gal_img_image']['name'];
			 move_uploaded_file($_FILES['gal_img_image']['tmp_name'],'../galleryimg/'.$file); 
			 Image_Width_fixed_Height_Resize($file,700,650,'../galleryimg','../galleryimgthumb');  
		  }
		  $_REQUEST['galcat_id']=$_REQUEST['gal_cat_id'];
         $SqlInsert = "INSERT INTO ".TBL_GALLERY." (gal_img_id, gal_cat_id,  gal_img_heading, gal_img_image, gal_img_sdesc, publish, newOrder, updtime)
         VALUES (".$MaxID.", ".tosql($_POST['gal_cat_id'], "Number").", ".tosql($_POST['gal_img_heading'], "Text").", ".tosql($file, "Text").", 
		 ".tosql("DESC", "Text").",'1', ".tosql($OrderNo, "Number").", now());";
		 //echo $SqlInsert;exit;
         mysql_query($SqlInsert) or die(mysql_error());
		 if(isset($_REQUEST['galcat_id']))
		 $ActionPath = $ActionPath."&galcat_id=".$_REQUEST['galcat_id'];
		  
         tep_redirect(tep_href_link($ActionPath));
       }                        
      /* END   : Add New Record To The Database  */
      /* BEGIN : Edit New Record To The Database  */   
      if(isset($_REQUEST['Action']) && $_REQUEST['Action'] == "ActionSaveData" && $PageAction =="SaveData")
       {   
	   //echo "123";
		 $ima_file=mysql_fetch_object(mysql_query("SELECT gal_img_image FROM ".TBL_GALLERY." WHERE  gal_img_id='".$DataID."'"));
	       $file=$ima_file->gal_img_image;
		   if(is_uploaded_file($_FILES['gal_img_image']['tmp_name']))
		   {			 
		     $ext = ".".end(explode('.', $_FILES['gal_img_image']['name']));
			 //echo $_FILES['gal_img_image']['name'];exit;
			 $file=$DataID.$ext;
			 //$file=time().$_FILES['gal_img_image']['name'];
		      //unlink('../galleryimg/'.$file);
			  //unlink('../galleryimgthumb/'.$file);
			 
			 move_uploaded_file($_FILES['gal_img_image']['tmp_name'],'../galleryimg/'.$file); 
			 Image_Width_fixed_Height_Resize($file,700,650,'../galleryimg','../galleryimgthumb'); 
			 //move_uploaded_file($_FILES['gal_img_image']['tmp_name'],'../galleryimgthumb/'.$file); 
			 //Image_Width_fixed_Height_Resize($file,700,650,'../galleryimg','../galleryimgthumb');  
			}
		 $_REQUEST['galcat_id']=$_REQUEST['gal_cat_id'];
		 $SqlUpdate = "UPDATE ".TBL_GALLERY." SET gal_cat_id=".tosql($_POST['gal_cat_id'], "Number").",  gal_img_heading=".tosql($_POST['gal_img_heading'], "Text").", 
		 gal_img_sdesc=".tosql("DESC", "Text").", gal_img_image=".tosql($file, "Text")." WHERE gal_img_id='".$DataID."';";
		 
		 //echo $SqlUpdate;exit;
         //die($SqlUpdate);
         mysql_query($SqlUpdate);
		 if(isset($_REQUEST['galcat_id']))
		 $ActionPath = $ActionPath."&galcat_id=".$_REQUEST['galcat_id'];
		 
         tep_redirect(tep_href_link($ActionPath));
       }                        
      /* END   : Edit New Record To The Database  */
      /* BEGIN : Sort Record Up To The Database  */  
      if(isset($_REQUEST['Action']) && $_REQUEST['Action'] == "ActionSortUp" && $PageAction =="SortUp")
       {
         $SqlOrder = "SELECT newOrder FROM ".TBL_GALLERY." WHERE gal_img_id='".$DataID."';";
         $RowOrder = mysql_fetch_object(mysql_query($SqlOrder));
         $OrderNo = $RowOrder->newOrder - 1;
         $SqlUpdate01 = "UPDATE ".TBL_GALLERY." SET newOrder = newOrder + 1 WHERE newOrder='".$OrderNo."';";
         mysql_query($SqlUpdate01);
         $SqlUpdate02="UPDATE ".TBL_GALLERY." SET newOrder = newOrder - 1 WHERE gal_img_id='".$DataID."';";
         mysql_query($SqlUpdate02);
		 
		 if(isset($_REQUEST['galcat_id']))
		 $ActionPath = $ActionPath."&galcat_id=".$_REQUEST['galcat_id'];
		 
         tep_redirect(tep_href_link($ActionPath));
       }                        
      /* END   : Sort Record Up To The Database  */  
      /* BEGIN : Sort Record Down To The Database  */
      if(isset($_REQUEST['Action']) && $_REQUEST['Action'] == "ActionSortDown" && $PageAction =="SortDown")
       {
         $SqlOrder = "SELECT newOrder FROM ".TBL_GALLERY." WHERE gal_img_id='".$DataID."';";
         $RowOrder = mysql_fetch_object(mysql_query($SqlOrder));
         $OrderNo = $RowOrder->newOrder + 1;
         $SqlUpdate01 = "UPDATE ".TBL_GALLERY." SET newOrder = newOrder - 1 WHERE newOrder='".$OrderNo."';";
         mysql_query($SqlUpdate01);
         $SqlUpdate02="UPDATE ".TBL_GALLERY." SET newOrder = newOrder + 1 WHERE gal_img_id='".$DataID."';";
         mysql_query($SqlUpdate02);
		 
		 if(isset($_REQUEST['galcat_id']))
		 $ActionPath = $ActionPath."&galcat_id=".$_REQUEST['galcat_id'];
		 
         tep_redirect(tep_href_link($ActionPath));
       }                 
      /* END   : Sort Record Down To The Database  */  
      /* BEGIN : Enable Record To The Database  */
      if(isset($_REQUEST['Action']) && $_REQUEST['Action'] == "ActionEnableRecord" && $PageAction =="EnableRecord")
       {
         $SqlUpdate01 = "UPDATE ".TBL_GALLERY." SET publish='1' WHERE gal_img_id='".$DataID."';";
         mysql_query($SqlUpdate01);
		 
		 if(isset($_REQUEST['galcat_id']))
		 $ActionPath = $ActionPath."&galcat_id=".$_REQUEST['galcat_id'];
		 
         tep_redirect(tep_href_link($ActionPath));
       }                 
      /* END   : Enable Record To The Database  */
      /* BEGIN : Disable Record To The Database  */
      if(isset($_REQUEST['Action']) && $_REQUEST['Action'] == "ActionDisableRecord" && $PageAction =="DisableRecord")
       {
         $SqlUpdate01 = "UPDATE ".TBL_GALLERY." SET publish='0' WHERE gal_img_id='".$DataID."';";
         mysql_query($SqlUpdate01);
		 
		 if(isset($_REQUEST['galcat_id']))
		 $ActionPath = $ActionPath."&galcat_id=".$_REQUEST['galcat_id'];
		 
         tep_redirect(tep_href_link($ActionPath));
       }                 
      /* END   : Disable Record To The Database  */ 
      /* BEGIN : Enable All Selected Records TO The Database  */  
      if(isset($_REQUEST['Action']) && $_REQUEST['Action'] == "ActEnableAllRecord" && $PageAction =="EnableAllRecord")
       {
         extract($_POST);
         $Count = count($checkitem);
         for($i=0;$i < $Count; $i++)
          {     
             $SqlUpdate01 = "UPDATE ".TBL_GALLERY." SET publish='1' WHERE gal_img_id='".$checkitem[$i]."';";
            mysql_query($SqlUpdate01);
          }
		 if(isset($_REQUEST['galcat_id']))
		 $ActionPath = $ActionPath."&galcat_id=".$_REQUEST['galcat_id'];
		 
         tep_redirect(tep_href_link($ActionPath));
       }
      /* END   : Enable All Selected Records TO The Database  */  
      /* BEGIN : Disable All Selected Records TO The Database  */                    
      if(isset($_REQUEST['Action']) && $_REQUEST['Action'] == "ActDisableAllRecord" && $PageAction =="DisableAllRecord")
       {
         extract($_POST);
         $Count = count($checkitem);
         for($i=0;$i < $Count; $i++)
          {     
           $SqlUpdate01 = "UPDATE ".TBL_GALLERY." SET publish='0' WHERE gal_img_id='".$checkitem[$i]."';";
            mysql_query($SqlUpdate01);
          }
		  
		  if(isset($_REQUEST['galcat_id']))
		 $ActionPath = $ActionPath."&galcat_id=".$_REQUEST['galcat_id'];
		                 
         tep_redirect(tep_href_link($ActionPath));
       }
      /* END   : Disable All Selected Records TO The Database  */
      /* BEGIN : Delete Selected Records TO The Database  */
      if(isset($_REQUEST['Action']) && $_REQUEST['Action'] == "ActionDelete" && $PageAction =="Delete")
       {
         extract($_POST);
         $Count = count($checkitem);
         for($i=0;$i < $Count; $i++)
          { 
			 $ima_file=mysql_fetch_object(mysql_query("SELECT gal_img_image FROM ".TBL_GALLERY." WHERE  gal_img_id='".$checkitem[$i]."'"));
			 @unlink('../galleryimg/'.$ima_file->gal_img_image);
			 @unlink('../galleryimgthumb/'.$ima_file->gal_img_image);
			 $SqlDelete = "DELETE FROM ".TBL_GALLERY." WHERE gal_img_id='".$checkitem[$i]."';";
             mysql_query($SqlDelete);
          }
		  if(isset($_REQUEST['galcat_id']))
		 $ActionPath = $ActionPath."&galcat_id=".$_REQUEST['galcat_id'];
		                
         tep_redirect(tep_href_link($ActionPath));
       }
      /* END   : Delete Selected Records TO The Database  */
      $pcontent =' 
      <form name="form_name" id="form_name" action="" onsubmit="return false;" method="post" enctype="multipart/form-data" >
      <input type="hidden" name="DataID" id="DataID" value="'.$DataID.'">
      <input type="hidden" name="PageAction" id="PageAction" value="'.$PageAction.'">
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">'; 
        
		if($PageAction == "AddNew" && $DataID =="")
         {
           $pcontent .='
           <tr>
             <td>'.$this->AddNewNewsRecords().'</td>
           </tr>
           <tr>
             <td><img src="images/blank.gif" border="0" height="10" /></td>
           </tr>';
         }
		 
		 if($PageAction == "AddCat" && $DataID =="")
         {
           $pcontent .='
           <tr>
             <td>'.$this->AddNewNewsRecords().'</td>
           </tr>
           <tr>
             <td><img src="images/blank.gif" border="0" height="10" /></td>
           </tr>';
         }
		 
        if($PageAction == "Edit" && $DataID !="")
         {
           $pcontent .='
           <tr>
             <td>'.$this->EditArticlesRecords(PAGE_INDEX,$DataID).'</td>
           </tr>
           <tr>
             <td><img src="images/blank.gif" border="0" height="10" /></td>
           </tr>';
         }
		if($PageAction == "View" && $DataID !="")
         {
           $pcontent .='
           <tr>
             <td>'.$this->ViewArticlesRecords(PAGE_INDEX,$DataID).'</td>
           </tr>
           <tr>
             <td><img src="images/blank.gif" border="0" height="10" /></td>
           </tr>';
         } 
        $pcontent .='
        <tr>
          <td>'.$this->ViewNewsRecords(PAGE_INDEX).'</td>
        </tr>
      </table>
      </form><script type="text/javascript" src="jss/validmsg.js"></script>
	  ';
      return $pcontent;
    } 
	    
   function AddNewNewsRecords()
    {
      $fcontent ='
       <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="top" style="width:9px;"><img src="__TEMPLATE_ROOT_PATH__images/round_box/tbl_top_lt.gif" border="0" width="9" height="9"></td>
          <td align="left" class="round_tbl_top_rt"><img src="images/blank.gif" border="0" width="2"></td>
        </tr>
        <tr>
          <td align="left" valign="top" class="round_tbl_bg_lt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0"  width="9"></td>
          <td align="left" class="round_tbl_bg_rt">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>     
              <td align="left"><h1>'.CONSTANT_ADD_NEW_HEADING.'</h1></td>
              <td align="right" class="top_button">
              <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><a href="javascript:FuncSaveNewRecord();" title="'.CONSTANT_BUTTON_TEXT_SAVE.'" ><img title="'.CONSTANT_BUTTON_TEXT_SAVE.'" 
				  src="images/button/articles/save.png" border="0" /></a></td>
                  <td><img src="images/blank.gif" height="1" border="0" width="3"></td>
                  <td><a href="javascript: FuncCancelRecord();" title="'.CONSTANT_BUTTON_TEXT_CANCEL.'" ><img title="'.CONSTANT_BUTTON_TEXT_CANCEL.'" 
				  src="images/button/articles/cancel.png" border="0" /></a></td>
                  <td><img src="images/blank.gif" height="1" border="0" width="3"></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td align="left" valign="top" class="round_tbl_divider_lt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0" width="9"></td>
          <td align="left" class="round_tbl_divider_rt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0" height="2" width="1"></td>
        </tr>
        <tr>
          <td align="left" valign="top" class="round_tbl_bg_lt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0" height="6" width="9"></td>
          <td align="left" class="round_tbl_bg_rt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0" height="2" width="1"></td>
        </tr>

        <tr>
          <td align="left" valign="top" class="round_tbl_bg_lt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0"  width="9"></td>
          <td align="left" class="round_tbl_bg_rt">  
          <table width="100%" border="0" cellspacing="0" cellpadding="0" >
            <tr>
              <td align="left" valign="top" style="width:50%">
              <table width="100%" border="0" cellspacing="2" cellpadding="2" >
			    <tr>
                  <td class="label-text" align="left">'.Website.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%">
				  <select name="gal_cat_id" id="gal_cat_id" style="width:270px;">
					  <option value="1">Exotic Trip</option>
					  <option value="2">Herbal division</option>
				</select></td>
                </tr>
				
				
				<tr>
                  <td class="label-text" align="left">'.Title.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%">
				  <input type="text" name="gal_img_heading" id="gal_img_heading" value="" size="30" style="width:57%;" class="input_box" >
				  </td>
                </tr>
				
				<tr>
                  <td class="label-text" align="left">'.CONSTANT_IMAGE.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%">
				  <input type="file" name="gal_img_image" id="gal_img_image" size="30" style="width:57%;" class="input_box" >
				   <br>(Width:700px X Height:650px)
				  </td>
                </tr>
				
				
				
              </table></td>
            </tr>
            <tr>
              <td colspan="2"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0" height="15" width="1"></td>
            </tr>
            
          </table></td>
        </tr>
        <tr>
          <td align="left" valign="top" style="width:9px;"><img src="__TEMPLATE_ROOT_PATH__images/round_box/tbl_bottom_lt.gif" border="0" width="9" height="9"></td>
          <td align="left" class="round_tbl_bottom_rt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0" width="9" height="9"></td>
        </tr>
      </table>';  
      return $fcontent;
    } 
	
   function EditArticlesRecords($CfgGroupID,$DataID)
    {
      $SqlEditRecord="SELECT * FROM ".TBL_GALLERY." WHERE  gal_img_id='".$DataID."';";
      $RowEditRecord=mysql_fetch_object(mysql_query($SqlEditRecord));
	  
	  /* Thumbnail view Start */
	  if($RowEditRecord->gal_img_image!='' && file_exists('../galleryimgthumb/'.$RowEditRecord->gal_img_image))
		$imagepath='../galleryimgthumb/'.$RowEditRecord->gal_img_image;
	  else
		$imagepath='images/no-img.jpg';
	/* Thumbnail View  end */
	  
      $fcontent =' 
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="top" style="width:9px;"><img src="__TEMPLATE_ROOT_PATH__images/round_box/tbl_top_lt.gif" border="0" width="9" height="9"></td>
          <td align="left" class="round_tbl_top_rt"><img src="images/blank.gif" border="0" width="2"></td>
        </tr>
        <tr>
          <td align="left" valign="top" class="round_tbl_bg_lt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0"  width="9"></td>
          <td align="left" class="round_tbl_bg_rt">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>     
              <td align="left"><h1>'.CONSTANT_EDIT_HEADING.'</h1></td>
              <td align="right" class="top_button">
              <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><a href="javascript:FuncSaveEditedRecord();" title="'.CONSTANT_BUTTON_TEXT_SAVE.'" ><img title="'.CONSTANT_BUTTON_TEXT_SAVE.'" 
				  src="images/button/articles/save.png" border="0" /></a></td>
                  <td><img src="images/blank.gif" height="1" border="0" width="3"></td>
                  <td><a href="javascript: FuncCancelRecord();" title="'.CONSTANT_BUTTON_TEXT_CANCEL.'" ><img title="'.CONSTANT_BUTTON_TEXT_CANCEL.'" 
				  src="images/button/articles/cancel.png" border="0" /></a></td>
                  <td><img src="images/blank.gif" height="1" border="0" width="3"></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td align="left" valign="top" class="round_tbl_divider_lt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0" width="9"></td>
          <td align="left" class="round_tbl_divider_rt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0" height="2" width="1"></td>
        </tr>
        <tr>
          <td align="left" valign="top" class="round_tbl_bg_lt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0" height="6" width="9"></td>
          <td align="left" class="round_tbl_bg_rt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0" height="2" width="1"></td>
        </tr>
        <tr>
          <td align="left" valign="top" class="round_tbl_bg_lt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0"  width="9"></td>
          <td align="left" class="round_tbl_bg_rt"> 
		  
          <table width="100%" border="0" cellspacing="0" cellpadding="0" >
            <tr>
              <td align="left" valign="top" style="width:50%">
              <table width="100%" border="0" cellspacing="2" cellpadding="2" >
			  	
				
				
				
				<tr>
                  <td class="label-text" align="left">'.Website.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%">
				  <select name="gal_cat_id" id="gal_cat_id" style="width:270px;"><option value="" >Select</option>';
				  $sqledit=mysql_query("SELECT * FROM ".TBL_GALLERY_CAT." WHERE publish='1' ORDER BY gal_cat_id ASC ");
				  while($fetchedit=mysql_fetch_object($sqledit))
				  {
				  $sel='';
				  if($fetchedit->gal_cat_id==$RowEditRecord->gal_cat_id)
				  $sel='selected="selected"';
				  $fcontent.='<option value="'.$fetchedit->gal_cat_id.'" '.$sel.'>'.$fetchedit->gal_cat_heading.'</option>';
				  }
				  $fcontent.='</select></td>
                </tr>

				<tr>
                  <td class="label-text" align="left">'.CONSTANT_NAME.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%">
				  <input type="text" name="gal_img_heading" id="gal_img_heading" value="'.$RowEditRecord->gal_img_heading.'" size="30" style="width:57%;" 
				  class="input_box" >
				  </td>
                </tr>
				
				<tr>
                  <td class="label-text" align="left" valign="top">'.CONSTANT_IMAGE.'</td>
                  <td class="label-text" align="center" style="width:10px" valign="top">:</td>
                  <td class="label-text" align="left" style="width:70%">
				  <input type="file" name="gal_img_image" id="gal_img_image" size="30" style="width:57%;" class="input_box" >
				  <br>(Width:700px X Height:650px)
				  <br><img  src='.$imagepath.' width=180 /></td>
                </tr>
				
				
				
              </table></td>
            </tr>
            <tr>
              <td colspan="2"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0" height="15" width="1"></td>
            </tr>
           
          </table></td>
        </tr>
        <tr>
          <td align="left" valign="top" style="width:9px;"><img src="__TEMPLATE_ROOT_PATH__images/round_box/tbl_bottom_lt.gif" border="0" width="9" height="9"></td>
          <td align="left" class="round_tbl_bottom_rt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0" width="9" height="9"></td>
        </tr>
      </table>';  
      return $fcontent;
    }
   
   function ViewArticlesRecords($CfgGroupID,$DataID)
    {
      $SqlViewRecord="SELECT * FROM ".TBL_GALLERY." WHERE  gal_img_id='".$DataID."';";
      $RowViewRecord=mysql_fetch_object(mysql_query($SqlViewRecord));
	  
	  $sqlcat=mysql_query("SELECT * FROM ".TBL_GALLERY_CAT." WHERE publish='1' and gal_cat_id='".$RowViewRecord->gal_cat_id."' ");
	  $fetchview=mysql_fetch_object($sqlcat);
	  
	  /* Image view Start */
	  if($RowViewRecord->gal_img_image!='' && file_exists('../galleryimgthumb/'.$RowViewRecord->gal_img_image))
		$imagepath='../galleryimgthumb/'.$RowViewRecord->gal_img_image;
	  else
		$imagepath='images/no-img.jpg';
	/* Image View  end */
      $fcontent ='
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="top" style="width:9px;"><img src="__TEMPLATE_ROOT_PATH__images/round_box/tbl_top_lt.gif" border="0" width="9" height="9"></td>
          <td align="left" class="round_tbl_top_rt"><img src="images/blank.gif" border="0" width="2"></td>
        </tr>
        <tr>
          <td align="left" valign="top" class="round_tbl_bg_lt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0"  width="9"></td>
          <td align="left" class="round_tbl_bg_rt">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>     
              <td align="left"><h1>'.CONSTANT_VIEW_HEADING.'</h1></td>
              <td align="right" class="top_button">
              <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><a href="javascript: FuncCancelRecord();" title="'.CONSTANT_BUTTON_TEXT_CLOSE.'" ><img title="'.CONSTANT_BUTTON_TEXT_CLOSE.'" 
				  src="images/button/articles/cancel.png" border="0" /></a></td>
                  <td><img src="images/blank.gif" height="1" border="0" width="3"></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td align="left" valign="top" class="round_tbl_divider_lt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0" width="9"></td>
          <td align="left" class="round_tbl_divider_rt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0" height="2" width="1"></td>
        </tr>
        <tr>
          <td align="left" valign="top" class="round_tbl_bg_lt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0" height="6" width="9"></td>
          <td align="left" class="round_tbl_bg_rt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0" height="2" width="1"></td>
        </tr>
        <tr>
          <td align="left" valign="top" class="round_tbl_bg_lt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0"  width="9"></td>
          <td align="left" class="round_tbl_bg_rt"> 
          <table width="100%" border="0" cellspacing="0" cellpadding="0" >
            <tr>
              <td align="left" valign="top" style="width:50%; background-color:#ffffff;">
              <table width="100%" border="0" cellspacing="1" cellpadding="1" >
			  	
				 <tr>
                  <td class="label-text" align="left" valign="top" style="background-color:#eeeeee; padding:0 10px 0 10px;">'.VIEW_HOTEL_NAME.':</td>
                  <td class="label-text" align="left" valign="top" style="width:70%; background-color:#eeeeee; padding:0 10px 0 10px;">'.$RowViewRecord->hotel_name_cat.'
				  </td>
                </tr>
				
				 <tr>
                  <td class="label-text" align="left" valign="top" style="background-color:#eeeeee; padding:0 10px 0 10px;">'.CONSTANT_CATNAME.':</td>
                  <td class="label-text" align="left" valign="top" style="width:70%; background-color:#eeeeee; padding:0 10px 0 10px;">'.$fetchview->gal_cat_heading.'
				  </td>
                </tr>
				
				<tr>
                  <td class="label-text" align="left" valign="top" style="background-color:#eeeeee; padding:0 10px 0 10px;">'.CONSTANT_NAME.':</td>
                  <td class="label-text" align="left" valign="top" style="width:70%; background-color:#eeeeee; padding:0 10px 0 10px;">
				  '.$RowViewRecord->gal_img_heading.'</td>
                </tr>
				
				<tr>
                  <td class="label-text" align="left" valign="top" style="background-color:#eeeeee; padding:0 10px 0 10px;">'.CONSTANT_IMAGE.':</td>
                  <td class="label-text" align="left" valign="top" style="width:70%; background-color:#eeeeee; padding:0 10px 0 10px;"><img src='.$imagepath.'  		
				   width=180 ></td>
                </tr>
				
				<tr>
                  <td class="label-text" align="left" valign="top" style="background-color:#eeeeee; padding:0 10px 0 10px;">'.CONSTANT_DESCRIPTION.':</td>
                  <td class="label-text" align="left" valign="top" style="width:70%; background-color:#eeeeee; padding:0 10px 0 10px;">
				  '.$RowViewRecord->gal_img_sdesc.'</td>
                </tr>
				
              </table></td>
            </tr>
            <tr>
              <td colspan="2"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0" height="15" width="1"></td>
            </tr>
           
          </table></td>
        </tr>
        <tr>
          <td align="left" valign="top" style="width:9px;"><img src="__TEMPLATE_ROOT_PATH__images/round_box/tbl_bottom_lt.gif" border="0" width="9" height="9"></td>
          <td align="left" class="round_tbl_bottom_rt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0" width="9" height="9"></td>
        </tr>
      </table>';  
      return $fcontent;
    }
	
   function ViewNewsRecords($CfgGroupID)
    {
      $PageNo = isset($_REQUEST['PageNo']) ? $_REQUEST['PageNo'] : 1;
      $EachPage = isset($_REQUEST['EachPage']) ? $_REQUEST['EachPage'] : 14;
	  $Sqlc = "SELECT * FROM ".TBL_GALLERY_CAT." where gal_cat_id='".$_REQUEST['galcat_id']."' ;";	
   	  $Rstc=mysql_query($Sqlc);
   	  $Rowc=mysql_fetch_object($Rstc);
      $fcontent ='
      <!-- BEGIN : Round Table -->
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="top" style="width:9px;"><img src="__TEMPLATE_ROOT_PATH__images/round_box/tbl_top_lt.gif" border="0" width="9" height="9"></td>
          <td align="left" class="round_tbl_top_rt"><img src="images/blank.gif" border="0" width="2"></td>
        </tr>
        <tr>
          <td align="left" valign="top" class="round_tbl_bg_lt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0"  width="9"></td>
          <td align="left" class="round_tbl_bg_rt">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr> ';
			if(isset($_REQUEST['galcat_id']) && !empty($_REQUEST['galcat_id']))
				{
	               	$fcontent.='<td align="left"><h1>'.CONSTANT_MAIN_UP_HEADING.'(<a href="gal_cat.php">'.$Rowc->gal_cat_heading.'</a>) --> 
					'.CONSTANT_MAIN_HEADING.' </h1></td>';
				}
			   	else
				{
			   		$fcontent.='<td align="left"><h1>'.CONSTANT_MAIN_HEADING.' </h1></td>';
				}
			
			  $fcontent.='
              <td align="right" class="top_button">
              <table border="0" cellspacing="0" cellpadding="0">
                <tr>';
				if(isset($_REQUEST['galcat_id']) && !empty($_REQUEST['galcat_id']))
				{
	            $fcontent.='<td><a href="javascript:FuncAddCatRecord();" title="'.CONSTANT_BUTTON_TEXT_ADD.'" ><img title="'.CONSTANT_BUTTON_TEXT_ADD.'" 
				  src="images/button/articles/add.png" border="0" /></a></td>
				  <td><img src="images/blank.gif" height="1" border="0" width="3"></td>
				  <input type="hidden" value="'.$_REQUEST['galcat_id'].'" name="galcat_id" id="galcat_id" />
				  ';
				}
			   	else
				{
			   	$fcontent.='<td><a href="javascript:FuncAddNewRecord();" title="'.CONSTANT_BUTTON_TEXT_ADD.'" ><img title="'.CONSTANT_BUTTON_TEXT_ADD.'" 
				  src="images/button/articles/add.png" border="0" /></a></td>
				  <td><img src="images/blank.gif" height="1" border="0" width="3"></td>';
				}
                $fcontent.='  
				  
                  
                  <td><a href="javascript:FuncEnableAllRecord();" title="'.CONSTANT_BUTTON_TEXT_ENABLE_ALL.'" ><img title="'.CONSTANT_BUTTON_TEXT_ENABLE_ALL.'" 
				  src="images/button/articles/enable.png" border="0" /></a></td>
                  <td><img src="images/blank.gif" height="1" border="0" width="3"></td>
                  <td><a href="javascript:FuncDisableAllRecord();" title="'.CONSTANT_BUTTON_TEXT_DISABLE_ALL.'" ><img title="'.CONSTANT_BUTTON_TEXT_DISABLE_ALL.'" 
				  src="images/button/articles/disable.png" border="0" /></a></td>
                  <td><img src="images/blank.gif" height="1" border="0" width="3"></td>
                  <td><a href="javascript:FuncDeleteRecord();" title="'.CONSTANT_BUTTON_TEXT_DELETE.'" ><img title="'.CONSTANT_BUTTON_TEXT_DELETE.'" 
				  src="images/button/articles/delete.png" border="0" /></a></td>
                  <td><img src="images/blank.gif" height="1" border="0" width="3"></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td align="left" valign="top" class="round_tbl_divider_lt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0" width="9"></td>
          <td align="left" class="round_tbl_divider_rt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0" height="2" width="1"></td>
        </tr>
        <tr>
          <td align="left" valign="top" class="round_tbl_bg_lt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0" height="6" width="9"></td>
          <td align="left" class="round_tbl_bg_rt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0" height="2" width="1"></td>
        </tr>';
		
		if(isset($_REQUEST['galcat_id']) && !empty($_REQUEST['galcat_id']))
			{
				$SqlTotCount = "SELECT COUNT(gal_img_id) AS TotalRecord FROM ".TBL_GALLERY." where gal_cat_id='".$_REQUEST['galcat_id']."' ;";
			}
			else
			{
				$SqlTotCount = "SELECT COUNT(gal_img_id) AS TotalRecord FROM ".TBL_GALLERY.";";
			}
		
        
        $RowTotCount = mysql_fetch_object(mysql_query($SqlTotCount));
        $TotalRecord =  isset($RowTotCount->TotalRecord) ? $RowTotCount->TotalRecord : 0;
        if($TotalRecord > 0)
         {
           if($EachPage == "ALL")
            {
              $TotPage = 1;
              $SlNo = 1;
              $PageLimit =" ";
            }
           else
            {
              $Start = ($PageNo - 1) * $EachPage;
              $TotPage = Ceil($TotalRecord / $EachPage);
              if($TotPage == "0")
                $TotPage = 1;
              $SlNo = (($PageNo - 1) * $EachPage) + 1;
              $PageLimit =" LIMIT ".$Start.", ".$EachPage;
            }
           $fcontent .='
           <tr>
<!-- js and css code -->
<link href="////css/tablednd.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jss/new/jquery-1.7.1.js"></script>
<script type="text/javascript" src="jss/new/jquery.tablednd.0.7.min.js"></script>
<script type="text/javascript" src="jss/new/bodys.js"></script>
<!-- js and css code -->
             <td align="left" valign="top" class="round_tbl_bg_lt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0"  width="9"></td>
             <td align="left" class="round_tbl_bg_rt">
             <table id="table-1" width="100%" border="0" cellspacing="0" cellpadding="0" >
               <tr class="heading_tr">
                 <th style="width:20px;"><input type="checkbox" name="checkall" id="checkall" onclick="CheckAllRecord();" 
				 title="'.CONSTANT_CHECKBOX_ALL_TITLE_CAPTION.'" /></th>
                 <th align="center" style="width:60px;">'.CONSTANT_VIEW_HEADING_SERIAL_NUMBER.'</th>
				  <th>'.Website.'</th>
				 <th>'.CONSTANT_NAME.'</th>
				 <th>'.CONSTANT_IMAGE.'</th>
				 <th align="center" style="width:80px;">'.CONSTANT_BUTTON_VIEW.'</th>
				  <th align="center" style="width:80px;">'.CONSTANT_BUTTON_EDIT.'</th>
                 <th align="center" style="width:60px;">'.CONSTANT_VIEW_HEADING_VIEW_ORDER.'</th>  
                 <th align="center" style="width:60px;">'.CONSTANT_VIEW_HEADING_VIEW_ENABLED.'</th>
                 <!--th align="center" style="width:30px;">'.CONSTANT_VIEW_HEADING_VIEW_ID.'</th-->
               </tr>';
               $SqlOrder = "SELECT MAX(newOrder) AS MaxOrder , MIN(newOrder) AS MinOrder FROM ".TBL_GALLERY.";";
               $RowOrder = mysql_fetch_object(mysql_query($SqlOrder));
			    if(isset($_REQUEST['galcat_id']) && !empty($_REQUEST['galcat_id']))
				{
	               	$SqlRecord = "SELECT * FROM ".TBL_GALLERY." where gal_cat_id='".$_REQUEST['galcat_id']."' ORDER BY newOrder ASC ".$PageLimit.";";
				}
			   	else
				{
			   		$SqlRecord = "SELECT * FROM ".TBL_GALLERY." ORDER BY newOrder ASC ".$PageLimit.";";
				}
               $RstRecord=mysql_query($SqlRecord);
               while($RowRecord=mysql_fetch_object($RstRecord))
                {  
				  $sqlcat=mysql_query("SELECT * FROM ".TBL_GALLERY_CAT." WHERE publish='1' and gal_cat_id='".$RowRecord->gal_cat_id."' ");
	  			  $fetchRecord=mysql_fetch_object($sqlcat);
				   
				  if($RowRecord->gal_img_image!='' && file_exists('../galleryimgthumb/'.$RowRecord->gal_img_image))
					$imagepath='../galleryimgthumb/'.$RowRecord->gal_img_image;
				  else
					$imagepath='images/no-img.jpg';
				  $fcontent .= '		  
                  <tr class="text_tr" id="'.$SlNo.'">				  		  
                    <td><input type="checkbox" name="checkitem[]" id="checkitem" onclick="CheckIndividual(this);" value="'.$RowRecord->gal_img_id.'" 
					title="'.CONSTANT_CHECKBOX_TITLE_CAPTION.'" ></td>
                    <td align="center">'.$SlNo.'</td>
					
					<td>'.$fetchRecord->gal_cat_heading.'</td>
					<td>'.$RowRecord->gal_img_heading.'</td>
					<td align="center"><img src='.$imagepath.' width=30 height=30 ></td>
					
					<td align="center"><a href="javascript: SingleFuncViewRecord('.$RowRecord->gal_img_id.');" title="'.CONSTANT_BUTTON_TEXT_VIEW.'"><img title="'.CONSTANT_BUTTON_TEXT_VIEW.'" src="images/button/articles/view.png" border="0" /></a></td>
                   <td align="center"><a href="javascript: SingleFuncEditRecord('.$RowRecord->gal_img_id.');" title="'.CONSTANT_BUTTON_TEXT_EDIT.'"><img title="'.CONSTANT_BUTTON_TEXT_EDIT.'" src="images/button/articles/edit.png" border="0" /></a></td>
                    <td align="center">
					<!-- order list -->
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td align="left" style="width:50%" class="no-border">';
                        if($RowRecord->newOrder != $RowOrder->MinOrder)
                         {
                           $fcontent .= '<a href="javascript: FuncRecordSortUp('.$RowRecord->gal_img_id.');" title="'.CONSTANT_BUTTON_TEXT_SORT_UP.'" ><img src="images/button/articles/up_sml.png" border="0" title="'.CONSTANT_BUTTON_TEXT_SORT_UP.'" ></a>';
                         }
                        else
                         {
                           $fcontent .= "&nbsp;";
                         }
                        $fcontent .= '
                        </td>
                        <td align="center" style="width:50%" class="no-border">';
                        if($RowRecord->newOrder != $RowOrder->MaxOrder)
                         {

                           $fcontent .= '<a href="javascript: FuncRecordSortDown('.$RowRecord->gal_img_id.');" title="'.CONSTANT_BUTTON_TEXT_SORT_DOWN.'" ><img src="images/button/articles/down_sml.png" border="0" title="'.CONSTANT_BUTTON_TEXT_SORT_DOWN.'"></a>';
                         }
                        else
                         {
                           $fcontent .= "&nbsp;";
                         }
                        $fcontent .= '</td>
                      </tr>
                    </table>
					<!-- order list -->
					</td>
                    <td align="center">';
                    if($RowRecord->publish == "1")
                     {
                       $fcontent .= '<a href="javascript: FuncDisableRecord('.$RowRecord->gal_img_id.');" title="'.CONSTANT_BUTTON_TEXT_ENABLE.'"><img 
					   src="images/button/articles/enable-sml.png" title="'.CONSTANT_BUTTON_TEXT_ENABLE.'" border="0" ></a>';
                     }
                    else
                     {
                       $fcontent .= '<a href="javascript: FuncEnableRecord('.$RowRecord->gal_img_id.');" title="'.CONSTANT_BUTTON_TEXT_DISABLE.'"><img 
					   src="images/button/articles/disable-sml.png" title="'.CONSTANT_BUTTON_TEXT_DISABLE.'" border="0" ></a>';
                     }
                    $fcontent .= '</td> 
                    <!--td align="right">'.$RowRecord->gal_img_id.'</td-->
                  </tr>
				  ';
                  $SlNo++;
                }
               $fcontent .= '
             </table>

			 <!-- loop data fetch -->
			 
			 </td>
           </tr>
           <tr>
             <td align="left" valign="top" class="round_tbl_divider_lt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0" width="9"></td>
             <td align="left" class="round_tbl_divider_rt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0" height="2" width="1"></td>
           </tr>
           <tr>
             <td align="left" valign="top" class="round_tbl_bg_lt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0" width="9"></td>
             <td align="left" class="round_tbl_bg_rt">
             <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td align="left">
                 <!-- BEGIN :  RecordS/Pages  -->
                 <ul class="pagination">
                   <li>'.CONSTANT_PAGINATION_TEXT_VIEW.':</li>
                   <li><select name="EachPage" id="EachPage" class="inputBorder" onchange="FuncChangePage(1);" title="View">';
                   for($i=10;$i<=100;$i=$i+20)
                    {
                      if($i == $EachPage)
                        $fcontent .= '<option value="'.$i.'" selected="selected">'.$i.'</option>';
                      else
                        $fcontent .= '<option value="'.$i.'">'.$i.'</option>';
                    }
                   if($EachPage == "ALL")
                     $fcontent .= '<option value="ALL" selected="selected">All</option>';
                   else
                     $fcontent .= '<option value="ALL">All</option>';
                   $fcontent .= '</select></li>
                   <li>'.CONSTANT_PAGINATION_TEXT_RECORDS_PAGE.'<input type="hidden" name="PageNo" id="PageNo" value="'.$PageNo.'"></li>
                 <ul>
                 <!-- END   :  RecordS/Pages  --></td>
                 <td align="right">
                 <!-- BEGIN :  Numbering  -->
                 <ul class="pagination">';
                 if($PageNo > 1)
                  {
                    $Back=$PageNo - 1;
                    $fcontent .= '<li><img src="images/button/first.png" alt="" border="0" title="'.CONSTANT_PAGINATION_TEXT_FIRST.'" class="pointer_hand" 
					onclick="FuncChangePage(1);"  /></li>
                    <li><img src="images/button/prev.png" alt="" border="0" title="'.CONSTANT_PAGINATION_TEXT_PREVIOUS.'" class="pointer_hand" 
					onclick="FuncChangePage('.$Back.');" /></li>
					';
                  }
                 else
                  {
                    $fcontent .= '<li><img src="images/button/first-inact.png" alt="" border="0" title="'.CONSTANT_PAGINATION_TEXT_FIRST.'" /></li>
                    <li><img src="images/button/prev-inact.png" alt="" border="0" title="'.CONSTANT_PAGINATION_TEXT_PREVIOUS.'" /></li>';
                  }
                 if($TotPage > 10)
                  {
                    if(($PageNo - 5) > 0)
                     {
                       $StartLoop = $PageNo - 5;
                     }
                    else
                     {
                       $StartLoop = 1;
                       $PageDiff = 5 - $PageNo;
                       $EndLoop = ($PageNo + 5) + $PageDiff;
                     }
                    if(($PageNo + 4) < $TotPage && ($PageNo-5) > 0)
                     {
                       $EndLoop = $PageNo + 4;
                     }
                    elseif(($PageNo-5) > 0)
                     {
                       $PageDiff = $TotPage - $PageNo;
                       $StartLoop = ($PageNo + $PageDiff) - 9;
                       $EndLoop = $TotPage;
                     }
                  }
                 else
                  {
                    $StartLoop = 1;
                    $EndLoop = $TotPage;
                  }
                 if($TotPage>10 && $StartLoop > 1)
                  {
                    $fcontent .= '<li>...</li>';
                  }
                 for($i = $StartLoop;$i<=$EndLoop;$i++)
                  {
                    if($i == $PageNo)
                     {
                       $fcontent .= '<li><b>'.$i.'</b></li>';
                     }
                    else
                     {
                       $fcontent .= '<li><a href="#" onclick="FuncChangePage('.$i.');" >'.$i.'</a></li>';
                     }
                  }
                 if($EndLoop < $TotPage)
                  {
                    $fcontent .= '<li>...</li>';
                  }
                 if($PageNo < $TotPage)
                  {
                    $Next=$PageNo + 1;
                    $fcontent .= '<li><img src="images/button/next.png" alt="" border="0" title="'.CONSTANT_PAGINATION_TEXT_NEXT.'" 
					onclick="FuncChangePage('.$Next.');"  /></li>
                    <li><img src="images/button/last.png" alt="" border="0" title="'.CONSTANT_PAGINATION_TEXT_LAST.'" onclick="FuncChangePage('.$TotPage.');" /></li>';
                  }
                 else
                  {
                    $fcontent .= '<li><img src="images/button/next-inact.png" alt="" border="0" title="'.CONSTANT_PAGINATION_TEXT_NEXT.'" /></li>
                    <li><img src="images/button/last-inact.png" alt="" border="0" title="'.CONSTANT_PAGINATION_TEXT_LAST.'" /></li>';
                  }
                 $fcontent .= '<ul>
                 <!-- END   :  Numbering  --></td>
               </tr>
             </table></td>
           </tr>';
         }
        else
         {
           $fcontent .= ' 
           <tr>
             <td align="left" valign="top" class="round_tbl_bg_lt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0"  width="9"></td>
             <td align="left" class="round_tbl_bg_rt">
             <table width="100%" border="0" cellspacing="0" cellpadding="0" >
               <tr>
                 <td height="100" align="center" class="alert_msg">'.CONSTANT_ALERT_MSG_NO_RECORD.'</td>
               </tr>
             </table></td>
           </tr>';
         }
        $fcontent .='
        <tr>
          <td align="left" valign="top" style="width:9px;"><img src="__TEMPLATE_ROOT_PATH__images/round_box/tbl_bottom_lt.gif" border="0" width="9" height="9"></td>
          <td align="left" class="round_tbl_bottom_rt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0" width="9" height="9"></td>
        </tr>
      </table>';  
      return $fcontent;
    }
 }
?>