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
         $SqlOrder = "SELECT MAX(newOrder) AS MaxOrder FROM ".TBL_REAL_STATE.";";
         $RowOrder = mysql_fetch_object(mysql_query($SqlOrder));
         $OrderNo = $RowOrder->MaxOrder + 1;
         $SqlMaxID = "SELECT MAX(real_state_id) AS MaxID FROM ".TBL_REAL_STATE.";";
         $RowMaxID = mysql_fetch_object(mysql_query($SqlMaxID));
         $MaxID = $RowMaxID->MaxID + 1;
		  extract($_POST);

         $SqlInsert = "INSERT INTO ".TBL_REAL_STATE." (real_state_id, real_state_location, real_state_plot, real_state_area, real_state_price, real_state_description, booking_status, publish, newOrder, 
		 updtime)
         VALUES (".$MaxID.",".tosql($_POST['real_state_location'], "Text").",
		 ".tosql($_POST['real_state_plot'], "Text").",
		 ".tosql($_POST['real_state_area'], "Text").",
		 ".tosql($_POST['real_state_price'], "Text").",
		 ".tosql($_POST['real_state_description'], "Text").",
		 ".tosql($_POST['booking_status'], "Text").", 
		 '1',
		 ".tosql($OrderNo, "Number").",
		 now());";
         mysql_query($SqlInsert) or die(mysql_error());
         tep_redirect(tep_href_link($ActionPath));
       }                        
      /* END   : Add New Record To The Database  */
      /* BEGIN : Edit New Record To The Database  */   
      if(isset($_REQUEST['Action']) && $_REQUEST['Action'] == "ActionSaveData" && $PageAction =="SaveData")
       {   
		
		$SqlUpdate = "UPDATE ".TBL_REAL_STATE." SET
		 real_state_location=".tosql($_POST['real_state_location'], "Text").",
		 real_state_plot=".tosql($_POST['real_state_plot'], "Text").",
		 real_state_area=".tosql($_POST['real_state_area'], "Text").",
		 real_state_price=".tosql($_POST['real_state_price'], "Text").",
		 real_state_description=".tosql($_POST['real_state_description'], "Text").",
		 booking_status=".tosql($_POST['booking_status'], "Text")."
    	 WHERE real_state_id='".$DataID."';";
         //die($SqlUpdate);
         mysql_query($SqlUpdate);
         tep_redirect(tep_href_link($ActionPath));
       }                  
      /* END   : Edit New Record To The Database  */
      /* BEGIN : Sort Record Up To The Database  */  
      if(isset($_REQUEST['Action']) && $_REQUEST['Action'] == "ActionSortUp" && $PageAction =="SortUp")
       {
         $SqlOrder = "SELECT newOrder FROM ".TBL_REAL_STATE." WHERE real_state_id='".$DataID."';";
         $RowOrder = mysql_fetch_object(mysql_query($SqlOrder));
         $OrderNo = $RowOrder->newOrder - 1;
         $SqlUpdate01 = "UPDATE ".TBL_REAL_STATE." SET newOrder = newOrder + 1 WHERE newOrder='".$OrderNo."';";
         mysql_query($SqlUpdate01);
         $SqlUpdate02="UPDATE ".TBL_REAL_STATE." SET newOrder = newOrder - 1 WHERE real_state_id='".$DataID."';";
         mysql_query($SqlUpdate02);
         tep_redirect(tep_href_link($ActionPath));
       }                        
      /* END   : Sort Record Up To The Database  */  
      /* BEGIN : Sort Record Down To The Database  */
      if(isset($_REQUEST['Action']) && $_REQUEST['Action'] == "ActionSortDown" && $PageAction =="SortDown")
       {
         $SqlOrder = "SELECT newOrder FROM ".TBL_REAL_STATE." WHERE real_state_id='".$DataID."';";
         $RowOrder = mysql_fetch_object(mysql_query($SqlOrder));
         $OrderNo = $RowOrder->newOrder + 1;
         $SqlUpdate01 = "UPDATE ".TBL_REAL_STATE." SET newOrder = newOrder - 1 WHERE newOrder='".$OrderNo."';";
         mysql_query($SqlUpdate01);
         $SqlUpdate02="UPDATE ".TBL_REAL_STATE." SET newOrder = newOrder + 1 WHERE real_state_id='".$DataID."';";
         mysql_query($SqlUpdate02);
         tep_redirect(tep_href_link($ActionPath));
       }                 
      /* END   : Sort Record Down To The Database  */  
      /* BEGIN : Enable Record To The Database  */
      if(isset($_REQUEST['Action']) && $_REQUEST['Action'] == "ActionEnableRecord" && $PageAction =="EnableRecord")
       {
         $SqlUpdate01 = "UPDATE ".TBL_REAL_STATE." SET publish='1' WHERE real_state_id='".$DataID."';";
         mysql_query($SqlUpdate01);
         tep_redirect(tep_href_link($ActionPath));
       }                 
      /* END   : Enable Record To The Database  */
      /* BEGIN : Disable Record To The Database  */
      if(isset($_REQUEST['Action']) && $_REQUEST['Action'] == "ActionDisableRecord" && $PageAction =="DisableRecord")
       {
         $SqlUpdate01 = "UPDATE ".TBL_REAL_STATE." SET publish='0' WHERE real_state_id='".$DataID."';";
         mysql_query($SqlUpdate01);
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
             $SqlUpdate01 = "UPDATE ".TBL_REAL_STATE." SET publish='1' WHERE real_state_id='".$checkitem[$i]."';";
            mysql_query($SqlUpdate01);
          }
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
           $SqlUpdate01 = "UPDATE ".TBL_REAL_STATE." SET publish='0' WHERE real_state_id='".$checkitem[$i]."';";
            mysql_query($SqlUpdate01);
          }               
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
			 $ima_file=mysql_fetch_object(mysql_query("SELECT feed_image FROM ".TBL_REAL_STATE." WHERE  real_state_id='".$checkitem[$i]."'"));
			 @unlink('../feedback_img/'.$ima_file->feed_image);
			 @unlink('../feedback_imgthumb/'.$ima_file->feed_image);
			 $SqlDelete = "DELETE FROM ".TBL_REAL_STATE." WHERE real_state_id='".$checkitem[$i]."';";
             mysql_query($SqlDelete);
          }               
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
                  <td class="label-text" align="left">'.CONSTANT_LOCATION.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%">
				  
				  <select name="real_state_location" id="real_state_location" style="width:57%;">
				  <option value="" >Select</option>';
				  $sqledit=mysql_query("SELECT * FROM ".TBL_REAL_STATE_LOCATION." WHERE publish = 1 ");
				  while($fetchedit=mysql_fetch_object($sqledit))
				  {
				  $sel='';
				  if($fetchedit->location_id==$_REQUEST['location_id'])
				  $sel='selected="selected"';
				  $fcontent.='<option value="'.$fetchedit->location.'" '.$sel.'>'.$fetchedit->location.'</option>';
				  }
				  $fcontent.='</select>
				  
				
				  </td>
                </tr>
				
				<tr>
                  <td class="label-text" align="left">'.CONSTANT_PLOT.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%">
				  
				  <select name="real_state_plot" id="real_state_plot" style="width:57%;">
				  <option value="" >Select</option>';
				  $sqledit=mysql_query("SELECT * FROM ".TBL_REAL_STATE_PLOT." WHERE publish = 1 ");
				  while($fetchedit=mysql_fetch_object($sqledit))
				  {
				  $sel='';
				  if($fetchedit->plot_id==$_REQUEST['location_id'])
				  $sel='selected="selected"';
				  $fcontent.='<option value="'.$fetchedit->plot.'" '.$sel.'>'.$fetchedit->plot.'</option>';
				  }
				  $fcontent.='</select>
				  
				
				  </td>
                </tr>
				
				
				
				<tr>
                  <td class="label-text" align="left">'.CONSTANT_AREA.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%">
				 
				  <select name="real_state_area" id="real_state_area" style="width:57%;">
				  <option value="" >Select</option>';
				  $sqledit=mysql_query("SELECT * FROM ".TBL_REAL_STATE_AREA." WHERE publish = 1 ");
				  while($fetchedit=mysql_fetch_object($sqledit))
				  {
				  $sel='';
				  if($fetchedit->area_id==$_REQUEST['area_id'])
				  $sel='selected="selected"';
				  $fcontent.='<option value="'.$fetchedit->area.'" '.$sel.'>'.$fetchedit->area.'</option>';
				  }
				  $fcontent.='</select>
				  
				
				  </td>
				  </td>
                </tr>
				
				<tr>
                  <td class="label-text" align="left">'.PRICE_RANGE.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%">
				  
				   <select name="real_state_price" id="real_state_price" style="width:57%;">
				  <option value="" >Select</option>';
				  $sqledit=mysql_query("SELECT * FROM ".TBL_REAL_STATE_PRICE." WHERE publish = 1 ");
				  while($fetchedit=mysql_fetch_object($sqledit))
				  {
				  $sel='';
				  if($fetchedit->price_id==$_REQUEST['price_id'])
				  $sel='selected="selected"';
				  $fcontent.='<option value="'.$fetchedit->price.'" '.$sel.'>'.$fetchedit->price.'</option>';
				  }
				  $fcontent.='</select>
				
				  </td>
                </tr>
				
				
				
				<!--<tr>   sudhakar for image
                  <td class="label-text" align="left">'.CONSTANT_IMAGE.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%">
				  <input type="file" name="feed_image" id="feed_image" size="30" style="width:57%;" class="input_box" >
				  </td>
                </tr> -->
				
				<tr>
                  <td class="label-text" align="left" valign="top">'.DESCRIPTION.'</td>
                  <td class="label-text" align="center" style="width:10px" valign="top">:</td>
                  <td class="label-text" align="left" style="width:70%">
				  <textarea name="real_state_description" id="real_state_description" style="width:57%; height:100px;" class="input_box"></textarea></td>
                </tr>
				
				<tr>
                  <td class="label-text" align="left" valign="top">'.Status.'</td>
                  <td class="label-text" align="center" style="width:10px" valign="top">:</td>
                  <td class="label-text" align="left" style="width:70%">
				  <input type="radio" name="booking_status" id="booking_status" value="Booked">Booked
				  <input type="radio" name="booking_status" id="booking_status" value="Vacant">Vacant
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
      $SqlEditRecord="SELECT * FROM ".TBL_REAL_STATE." WHERE  real_state_id='".$DataID."';";
      $RowEditRecord=mysql_fetch_object(mysql_query($SqlEditRecord));
	  
	  /* Thumbnail view Start */
	  if($RowEditRecord->feed_image!='' && file_exists('../feedback_imgthumb/'.$RowEditRecord->feed_image))
		$imagepath='../feedback_imgthumb/'.$RowEditRecord->feed_image;
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
                  <td class="label-text" align="left">'.CONSTANT_LOCATION.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%">
				   <select name="real_state_location" id="real_state_location" style="width:57%;">
				 <option value="" >Select</option>';
				  $sqledit=mysql_query("SELECT * FROM ".k8_real_state_location."  ");
				  while($fetchedit=mysql_fetch_object($sqledit))
				  {
				  $sel='';
				  if($fetchedit->location==$RowEditRecord->real_state_location)
				  $sel='selected="selected"';
				  $fcontent.='<option value="'.$fetchedit->location.'" '.$sel.'>'.$fetchedit->location.'</option>';
				  }
				  $fcontent.='</select>
				  </td>
                </tr>
				
				<tr>
                  <td class="label-text" align="left">'.CONSTANT_PLOT.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%">
				   <select name="real_state_plot" id="real_state_plot" style="width:57%;">
				 <option value="" >Select</option>';
				  $sqledit=mysql_query("SELECT * FROM ".k8_real_state_plot."  ");
				  while($fetchedit=mysql_fetch_object($sqledit))
				  {
				  $sel='';
				  if($fetchedit->plot==$RowEditRecord->real_state_plot)
				  $sel='selected="selected"';
				  $fcontent.='<option value="'.$fetchedit->plot.'" '.$sel.'>'.$fetchedit->plot.'</option>';
				  }
				  $fcontent.='</select>
				  </td>
                </tr>
				
				
				<tr>
                  <td class="label-text" align="left">'.CONSTANT_AREA.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%">
				  
				  <select name="real_state_area" id="real_state_area" style="width:57%;">
				 <option value="" >Select</option>';
				  $sqledit=mysql_query("SELECT * FROM ".k8_real_state_area."  ");
				  while($fetchedit=mysql_fetch_object($sqledit))
				  {
				  $sel='';
				  if($fetchedit->area==$RowEditRecord->real_state_area)
				  $sel='selected="selected"';
				  $fcontent.='<option value="'.$fetchedit->area.'" '.$sel.'>'.$fetchedit->area.'</option>';
				  }
				  $fcontent.='</select>
				  </td>
                </tr>
				
				<tr>
                  <td class="label-text" align="left">'.PRICE_RANGE.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%">
				  
				  <select name="real_state_price" id="real_state_price" style="width:57%;">
				 <option value="" >Select</option>';
				  $sqledit=mysql_query("SELECT * FROM ".k8_real_state_price."  ");
				  while($fetchedit=mysql_fetch_object($sqledit))
				  {
				  $sel='';
				  if($fetchedit->price==$RowEditRecord->real_state_price)
				  $sel='selected="selected"';
				  $fcontent.='<option value="'.$fetchedit->price.'" '.$sel.'>'.$fetchedit->price.'</option>';
				  }
				  
				  $fcontent.='</select>
				  </td>
                </tr>
				
					<tr>
                  <td class="label-text" align="left" valign="top">'.DESCRIPTION.'</td>
                  <td class="label-text" align="center" style="width:10px" valign="top">:</td>
                  <td class="label-text" align="left" style="width:70%">
				  <textarea name="real_state_description" id="real_state_description" style="width:57%; height:100px;" class="input_box">'.$RowEditRecord->real_state_description.'</textarea>
				  </td>
                </tr>
				
				<tr>
                  <td class="label-text" align="left" valign="top">'.Status.'</td>
                  <td class="label-text" align="center" style="width:10px" valign="top">:</td>
                  <td class="label-text" align="left" style="width:70%">
				  <input type="radio" name="booking_status" id="booking_status" value="Booked">Booked
				  <input type="radio" name="booking_status" id="booking_status" value="Vacant">Vacant
				  </td>
                </tr>
				
				<!--<tr> sudhakar for image
                  <td class="label-text" align="left" valign="top">'.CONSTANT_IMAGE.'</td>
                  <td class="label-text" align="center" style="width:10px" valign="top">:</td>
                  <td class="label-text" align="left" style="width:70%"><input type="file" name="feed_image" id="feed_image" size="30" style="width:57%;" 
				  class="input_box" ><br> 
				  <img  src='.$imagepath.' width=100 /></td>
                </tr> -->
				
			
				
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
      $SqlViewRecord="SELECT * FROM ".TBL_REAL_STATE." WHERE  real_state_id='".$DataID."';";
      $RowViewRecord=mysql_fetch_object(mysql_query($SqlViewRecord));
	  /* Image view Start */
	  if($RowViewRecord->feed_image!='' && file_exists('../feedback_imgthumb/'.$RowViewRecord->feed_image))
		$imagepath='../feedback_imgthumb/'.$RowViewRecord->feed_image;
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
                  <td class="label-text" align="left" valign="top" style="background-color:#eeeeee; padding:0 10px 0 10px;">'.CONSTANT_LOCATION.':</td>
                  <td class="label-text" align="left" valign="top" style="width:70%; background-color:#eeeeee; padding:0 10px 0 10px;">
				  '.$RowViewRecord->real_state_location.'</td>
                </tr>
				
				
				
				<tr>
                  <td class="label-text" align="left" valign="top" style="background-color:#eeeeee; padding:0 10px 0 10px;">'.CONSTANT_AREA.':</td>
                  <td class="label-text" align="left" valign="top" style="width:70%; background-color:#eeeeee; padding:0 10px 0 10px;">
				  '.$RowViewRecord->real_state_area.'</td>
                </tr>
				
				<tr>
                  <td class="label-text" align="left" valign="top" style="background-color:#eeeeee; padding:0 10px 0 10px;">'.PRICE_RANGE.':</td>
                  <td class="label-text" align="left" valign="top" style="width:70%; background-color:#eeeeee; padding:0 10px 0 10px;">
				  '.$RowViewRecord->real_state_price.'</td>
                </tr>
				
				
				<tr>
                  <td class="label-text" align="left" valign="top" style="background-color:#eeeeee; padding:0 10px 0 10px;">'.DESCRIPTION.':</td>
                  <td class="label-text" align="left" valign="top" style="width:70%; background-color:#eeeeee; padding:0 10px 0 10px;">
				  '.$RowViewRecord->real_state_description.'</td>
                </tr>
				
				<!--<tr>    sudhakar for image
                  <td class="label-text" align="left" valign="top" style="background-color:#eeeeee; padding:0 10px 0 10px;">'.CONSTANT_IMAGE.':</td>
                  <td class="label-text" align="left" valign="top" style="width:70%; background-color:#eeeeee; padding:0 10px 0 10px;"><img src='.$imagepath.'  		
				   width=100 ></td>
                </tr> -->
				
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
            <tr>     
              <td align="left"><h1>'.CONSTANT_MAIN_HEADING.'</h1></td> 
              <td align="right" class="top_button">
              <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><a href="javascript:FuncAddNewRecord();" title="'.CONSTANT_BUTTON_TEXT_ADD.'" ><img title="'.CONSTANT_BUTTON_TEXT_ADD.'" src="images/button/articles/add.png" border="0" /></a></td>
                  <td><img src="images/blank.gif" height="1" border="0" width="3"></td>
                  <!--<td><a href="javascript:FuncEditRecord();" title="'.CONSTANT_BUTTON_TEXT_EDIT.'"><img title="'.CONSTANT_BUTTON_TEXT_EDIT.'" src="images/button/articles/edit.png" border="0" /></a></td>
                  <td><img src="images/blank.gif" height="1" border="0" width="3"></td>-->
                  <td><a href="javascript:FuncEnableAllRecord();" title="'.CONSTANT_BUTTON_TEXT_ENABLE_ALL.'" ><img title="'.CONSTANT_BUTTON_TEXT_ENABLE_ALL.'" src="images/button/articles/enable.png" border="0" /></a></td>
                  <td><img src="images/blank.gif" height="1" border="0" width="3"></td>
                  <td><a href="javascript:FuncDisableAllRecord();" title="'.CONSTANT_BUTTON_TEXT_DISABLE_ALL.'" ><img title="'.CONSTANT_BUTTON_TEXT_DISABLE_ALL.'" src="images/button/articles/disable.png" border="0" /></a></td>
                  <td><img src="images/blank.gif" height="1" border="0" width="3"></td>
                  <td><a href="javascript:FuncDeleteRecord();" title="'.CONSTANT_BUTTON_TEXT_DELETE.'" ><img title="'.CONSTANT_BUTTON_TEXT_DELETE.'" src="images/button/articles/delete.png" border="0" /></a></td>
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
        $SqlTotCount = "SELECT COUNT(real_state_id) AS TotalRecord FROM ".TBL_REAL_STATE.";";
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
<!-- js and css code -->
<script type="text/javascript" src="jss/new/jquery-1.7.1.js"></script>
<script type="text/javascript" src="jss/new/jquery.tablednd.0.7.min.js"></script>
<script type="text/javascript" src="jss/new/bodys.js"></script>
<!-- js and css code -->		   
           <tr>
             <td align="left" valign="top" class="round_tbl_bg_lt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0"  width="9"></td>
             <td align="left" class="round_tbl_bg_rt">
             <table id="table-1" width="100%" border="0" cellspacing="0" cellpadding="0" >
               <tr class="heading_tr">
                 <th style="width:20px;"><input type="checkbox" name="checkall" id="checkall" onclick="CheckAllRecord();" title="'.CONSTANT_CHECKBOX_ALL_TITLE_CAPTION.'" /></th>
                 <th align="center" style="width:60px;">'.CONSTANT_VIEW_HEADING_SERIAL_NUMBER.'</th>
				 <th>'.CONSTANT_LOCATION.'</th>
				 <th>'.CONSTANT_PLOT.'</th>
				 <th>'.CONSTANT_AREA.'</th>
				 <th>'.PRICE_RANGE.'</th>
				 <th>'.Status.'</th>
				 <th align="center" style="width:80px;">'.CONSTANT_BUTTON_VIEW.'</th>
				  <th align="center" style="width:80px;">'.CONSTANT_BUTTON_EDIT.'</th>
                 <th align="center" style="width:60px;">'.CONSTANT_VIEW_HEADING_VIEW_ORDER.'</th>  
                 <th align="center" style="width:60px;">'.CONSTANT_VIEW_HEADING_VIEW_ENABLED.'</th>
                 <!--th align="center" style="width:30px;">'.CONSTANT_VIEW_HEADING_VIEW_ID.'</th-->
               </tr>';
               $SqlOrder = "SELECT MAX(newOrder) AS MaxOrder , MIN(newOrder) AS MinOrder FROM ".TBL_REAL_STATE.";";
               $RowOrder = mysql_fetch_object(mysql_query($SqlOrder));
               $SqlRecord = "SELECT * FROM ".TBL_REAL_STATE." ORDER BY newOrder ASC ".$PageLimit.";";
               $RstRecord=mysql_query($SqlRecord);
               while($RowRecord=mysql_fetch_object($RstRecord))
                {  
				  if($RowRecord->feed_image!='' && file_exists('../feedback_imgthumb/'.$RowRecord->feed_image))
					$imagepath='../feedback_imgthumb/'.$RowRecord->feed_image;
				  else
					$imagepath='images/no-img.jpg';
				  $fcontent .= '
                  <tr class="text_tr" id="'.$SlNo.'">
                    <td><input type="checkbox" name="checkitem[]" id="checkitem" onclick="CheckIndividual(this);" value="'.$RowRecord->real_state_id.'" title="'.CONSTANT_CHECKBOX_TITLE_CAPTION.'" ></td>
                    <td align="center">'.$SlNo.'</td>
					<td>'.$RowRecord->real_state_location.'</td>
					<td>'.$RowRecord->real_state_plot.'</td>
					<td>'.$RowRecord->real_state_area .'</td>
					<td>'.$RowRecord->real_state_price .'</td>
					<td>'.$RowRecord->booking_status .'</td>
					<td align="center"><a href="javascript: SingleFuncViewRecord('.$RowRecord->real_state_id.');" title="'.CONSTANT_BUTTON_TEXT_VIEW.'"><img title="'.CONSTANT_BUTTON_TEXT_VIEW.'" src="images/button/articles/view.png" border="0" /></a></td>
                   <td align="center"><a href="javascript: SingleFuncEditRecord('.$RowRecord->real_state_id.');" title="'.CONSTANT_BUTTON_TEXT_EDIT.'"><img title="'.CONSTANT_BUTTON_TEXT_EDIT.'" src="images/button/articles/edit.png" border="0" /></a></td>
                    <td align="center">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td align="left" style="width:50%" class="no-border">';
                        if($RowRecord->newOrder != $RowOrder->MinOrder)
                         {
                           $fcontent .= '<a href="javascript: FuncRecordSortUp('.$RowRecord->real_state_id.');" title="'.CONSTANT_BUTTON_TEXT_SORT_UP.'" ><img src="images/button/articles/up_sml.png" border="0" title="'.CONSTANT_BUTTON_TEXT_SORT_UP.'" ></a>';
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
                           $fcontent .= '<a href="javascript: FuncRecordSortDown('.$RowRecord->real_state_id.');" title="'.CONSTANT_BUTTON_TEXT_SORT_DOWN.'" ><img src="images/button/articles/down_sml.png" border="0" title="'.CONSTANT_BUTTON_TEXT_SORT_DOWN.'"></a>';
                         }
                        else
                         {
                           $fcontent .= "&nbsp;";
                         }
                        $fcontent .= '</td>
                      </tr>
                    </table></td>
                    <td align="center">';
                    if($RowRecord->publish == "1")
                     {
                       $fcontent .= '<a href="javascript: FuncDisableRecord('.$RowRecord->real_state_id.');" title="'.CONSTANT_BUTTON_TEXT_ENABLE.'"><img src="images/button/articles/enable-sml.png" title="'.CONSTANT_BUTTON_TEXT_ENABLE.'" border="0" ></a>';
                     }
                    else
                     {
                       $fcontent .= '<a href="javascript: FuncEnableRecord('.$RowRecord->real_state_id.');" title="'.CONSTANT_BUTTON_TEXT_DISABLE.'"><img src="images/button/articles/disable-sml.png" title="'.CONSTANT_BUTTON_TEXT_DISABLE.'" border="0" ></a>';
                     }
                    $fcontent .= '</td>  
                    <!--td align="right">'.$RowRecord->real_state_id.'</td-->
                  </tr>';
                  $SlNo++;
                }
               $fcontent .= '
             </table></td>
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
                    $fcontent .= '<li><img src="images/button/first.png" alt="" border="0" title="'.CONSTANT_PAGINATION_TEXT_FIRST.'" class="pointer_hand" onclick="FuncChangePage(1);"  /></li>
                    <li><img src="images/button/prev.png" alt="" border="0" title="'.CONSTANT_PAGINATION_TEXT_PREVIOUS.'" class="pointer_hand" onclick="FuncChangePage('.$Back.');" /></li>';
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
                    $fcontent .= '<li><img src="images/button/next.png" alt="" border="0" title="'.CONSTANT_PAGINATION_TEXT_NEXT.'" onclick="FuncChangePage('.$Next.');"  /></li>
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