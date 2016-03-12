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
      $DataID = isset($_POST['DataID']) ? $_POST['DataID'] : '';   
      $PageAction = isset($_POST['PageAction']) ? $_POST['PageAction'] : ''; 
      $ActionPath = CURRENT_PAGE_NAME."?PageNo=".$PageNo."&EachPage=".$EachPage; 
      /* BEGIN : Add New Record To The Database */   
      if(isset($_REQUEST['Action']) && $_REQUEST['Action'] == "ActionSaveNewData" && $PageAction =="SaveNewData")
       {  
	                         
         $SqlMaxID = "SELECT MAX(ad_art_id) AS MaxID FROM ".TBL_ADMIN_ARTICLE.";";
         $RowMaxID = mysql_fetch_object(mysql_query($SqlMaxID));
         $MaxID = $RowMaxID->MaxID + 1;
		  extract($_POST);
		  
         $SqlInsert = "INSERT INTO ".TBL_ADMIN_ARTICLE." (ad_art_id,ad_art_pagetitle,ad_art_content_title,ad_art_desc,updtime)
         VALUES (".$MaxID.", ".tosql($_POST['ad_art_pagetitle'], "Text").", ".tosql($_POST['ad_art_content_title'], "Text").", ".tosql($_POST['ad_art_desc'], "Text").", 		 now());";
         mysql_query($SqlInsert) or die(mysql_error());
         tep_redirect(tep_href_link($ActionPath));
       }                        
      /* END   : Add New Record To The Database  */
      /* BEGIN : Edit New Record To The Database  */   
      if(isset($_REQUEST['Action']) && $_REQUEST['Action'] == "ActionSaveData" && $PageAction =="SaveData")
       {   
		 $SqlUpdate = "UPDATE ".TBL_ADMIN_ARTICLE." SET ad_art_pagetitle=".tosql($_POST['ad_art_pagetitle'], "Text").", 
		 ad_art_content_title=".tosql($_POST['ad_art_content_title'], "Text").", ad_art_desc=".tosql($_POST['ad_art_desc'], "Text")." WHERE ad_art_id='".$DataID."';";
         //die($SqlUpdate);
         mysql_query($SqlUpdate);
         tep_redirect(tep_href_link($ActionPath));
       }                        
      /* END   : Add New Record To The Database  */
      
      /* BEGIN : Delete Selected Records TO The Database  */
      if(isset($_REQUEST['Action']) && $_REQUEST['Action'] == "ActionDelete" && $PageAction =="Delete")
       {
         extract($_POST);
         $Count = count($checkitem);
         for($i=0;$i < $Count; $i++)
          { 
			 $SqlDelete = "DELETE FROM ".TBL_ADMIN_ARTICLE." WHERE ad_art_id='".$checkitem[$i]."';";
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
      </form><script type="text/javascript">
	window.onload = function()
	{
		CKEDITOR.replace( "ad_art_desc" );
	};
</script>';
      return $pcontent;
    }     
   function AddNewNewsRecords()
    {
	
      $fcontent ='<table width="100%" border="0" cellspacing="0" cellpadding="0">
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
                  <td><a href="javascript:FuncSaveNewRecord();" title="'.CONSTANT_BUTTON_TEXT_SAVE.'" ><img title="'.CONSTANT_BUTTON_TEXT_SAVE.'" src="images/button/settings/save.png" border="0" /></a></td>
                  <td><img src="images/blank.gif" height="1" border="0" width="3"></td>
                  <td><a href="javascript: FuncCancelRecord();" title="'.CONSTANT_BUTTON_TEXT_CANCEL.'" ><img title="'.CONSTANT_BUTTON_TEXT_CANCEL.'" src="images/button/settings/cancel.png" border="0" /></a></td>
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
                  <td class="label-text" align="left">'.CONSTANT_PAGE_TITLE.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%">
				  <input type="text" name="ad_art_pagetitle" id="ad_art_pagetitle" value="" size="30" style="width:57%;" class="input_box" >
				  </td>
                </tr>
				<tr>
                  <td class="label-text" align="left">'.CONSTANT_CONTENT_TITLE.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%">
				  <input type="text" name="ad_art_content_title" id="ad_art_content_title" value="" size="30" class="input_box" style="width:57%;"  ></td>
                </tr>
				<tr>
                  <td class="label-text" align="left" valign="top">'.CONSTANT_DESCRIPTION.'</td>
                  <td class="label-text" align="center" style="width:10px" valign="top">:</td>
                  <td class="label-text" align="left" style="width:70%">
				  <textarea name="ad_art_desc" id="ad_art_desc" style="width:100%;height:360px;" class="input_box"></textarea></td>
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
      </table><script type="text/javascript">
	window.onload = function()
	{
		var editor=CKEDITOR.replace( "ad_art_desc" );
	};
</script>';  
      return $fcontent;
    } 
	
   function EditArticlesRecords($CfgGroupID,$DataID)
    {
      $SqlEditRecord="SELECT * FROM ".TBL_ADMIN_ARTICLE." WHERE  ad_art_id='".$DataID."';";
      $RowEditRecord=mysql_fetch_object(mysql_query($SqlEditRecord));
	  
	  
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
                  <td><a href="javascript:FuncSaveEditedRecord();" title="'.CONSTANT_BUTTON_TEXT_SAVE.'" ><img title="'.CONSTANT_BUTTON_TEXT_SAVE.'" src="images/button/settings/save.png" border="0" /></a></td>
                  <td><img src="images/blank.gif" height="1" border="0" width="3"></td>
                  <td><a href="javascript: FuncCancelRecord();" title="'.CONSTANT_BUTTON_TEXT_CANCEL.'" ><img title="'.CONSTANT_BUTTON_TEXT_CANCEL.'" src="images/button/settings/cancel.png" border="0" /></a></td>
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
                  <td class="label-text" align="left">'.CONSTANT_PAGE_TITLE.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%">
				  <input type="text" name="ad_art_pagetitle" id="ad_art_pagetitle" value="'.$RowEditRecord->ad_art_pagetitle.'" size="30" style="width:57%;" class="input_box" >
				</td>
                </tr>
				<tr>
                  <td class="label-text" align="left">'.CONSTANT_CONTENT_TITLE.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%"><input type="text" name="ad_art_content_title" id="ad_art_content_title" value="'.$RowEditRecord->ad_art_content_title.'" size="30" style="width:57%;" class="input_box" ></td>
                </tr>
				<tr>
                  <td class="label-text" align="left" valign="top">'.CONSTANT_DESCRIPTION.'</td>
                  <td class="label-text" align="center" style="width:10px" valign="top">:</td>
                  <td class="label-text" align="left" style="width:70%">
				  <textarea name="ad_art_desc" id="ad_art_desc" style="width:100%;height:360px;" class="input_box" >'.$RowEditRecord->ad_art_desc .'</textarea></td>
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
      </table><script type="text/javascript">
	window.onload = function()
	{
		var editor=CKEDITOR.replace( "ad_art_desc" );
	};
</script>';  
      return $fcontent;
    }
	
   function ViewArticlesRecords($CfgGroupID,$DataID)
    {
      $SqlViewRecord="SELECT * FROM ".TBL_ADMIN_ARTICLE." WHERE  ad_art_id='".$DataID."';";
      $RowViewRecord=mysql_fetch_object(mysql_query($SqlViewRecord));
	  
      $fcontent ='
	  <link type="text/css" href="themes/ui.datepicker.css" rel="stylesheet" />
	<script type="text/javascript" src="ui/jquery-1.2.3.pack.js"></script>
	<script type="text/javascript" src="ui/ui.datepicker.js"></script>
	<link type="text/css" href="../demos.css" rel="stylesheet" />
	<script type="text/javascript">
	$(function() {
		$("#ad_art_content_title").datepicker({dateFormat: "dd-mm-yy"});
		
	});
	</script> 
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
                  <td><a href="javascript: FuncCancelRecord();" title="'.CONSTANT_BUTTON_TEXT_CLOSE.'" ><img title="'.CONSTANT_BUTTON_TEXT_CLOSE.'" src="images/button/settings/cancel.png" border="0" /></a></td>
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
                  <td class="label-text" align="left" valign="top" style="background-color:#eeeeee; padding:0 10px 0 10px;">'.CONSTANT_PAGE_TITLE.':</td>
                  <td class="label-text" align="left" valign="top" style="width:70%; background-color:#eeeeee; padding:0 10px 0 10px;">'.$RowViewRecord->ad_art_pagetitle.'</td>
                </tr>
				<tr>
                  <td class="label-text" align="left" valign="top" style="background-color:#eeeeee; padding:0 10px 0 10px;">'.CONSTANT_CONTENT_TITLE.':</td>
                  <td class="label-text" align="left" valign="top" style="width:70%; background-color:#eeeeee; padding:0 10px 0 10px;">'.$RowViewRecord->ad_art_content_title.'</td>
                </tr>
				<tr>
                  <td class="label-text" align="left" valign="top" style="background-color:#eeeeee; padding:0 10px 0 10px;">'.CONSTANT_DESCRIPTION.':</td>
                  <td class="label-text" align="left" valign="top" style="width:70%; background-color:#eeeeee; padding:0 10px 0 10px;">'.$RowViewRecord->ad_art_desc .'</td>
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
      </table><script type="text/javascript">
	window.onload = function()
	{
		var editor=CKEDITOR.replace( "ad_art_desc" );
	};
</script>';  
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
			  <!--add hidding -->
			  
              <!--<td align="right" class="top_button">
              <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><a href="javascript:FuncAddNewRecord();" title="'.CONSTANT_BUTTON_TEXT_ADD.'" ><img title="'.CONSTANT_BUTTON_TEXT_ADD.'" src="images/button/settings/add.png" border="0" /></a></td>
                  <td><img src="images/blank.gif" height="1" border="0" width="3"></td>
                  <td><a href="javascript:FuncDeleteRecord();" title="'.CONSTANT_BUTTON_TEXT_DELETE.'" ><img title="'.CONSTANT_BUTTON_TEXT_DELETE.'" src="images/button/settings/cancel.png" border="0" /></a></td>
                  <td><img src="images/blank.gif" height="1" border="0" width="3"></td>
                </tr>
              </table></td>-->
			  
			   <!--add hidding -->
			  
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
        $SqlTotCount = "SELECT COUNT(ad_art_id) AS TotalRecord FROM ".TBL_ADMIN_ARTICLE.";";
        $RowTotCount = mysql_fetch_object(mysql_query($SqlTotCount));
        $TotalRecord =  isset($RowTotCount->TotalRecord) ? $RowTotCount->TotalRecord : 0;
        if($TotalRecord > 0)
         {
           $fcontent .='
           <tr>
             <td align="left" valign="top" class="round_tbl_bg_lt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0"  width="9"></td>
             <td align="left" class="round_tbl_bg_rt">
             <table width="100%" border="0" cellspacing="0" cellpadding="0" >
               <tr class="heading_tr">
                 <th style="width:20px;"><input type="checkbox" name="checkall" id="checkall" onclick="CheckAllRecord();" title="'.CONSTANT_CHECKBOX_ALL_TITLE_CAPTION.'" /></th>
                 <th align="center" style="width:60px;">'.CONSTANT_VIEW_HEADING_SERIAL_NUMBER.'</th>
                 <th>'.CONSTANT_VIEW_HEADING_VIEW_TITLE.'</th>
				 <th>'.CONSTANT_VIEW_HEADING_VIEW_CONTENT.'</th>
				 <th align="center" style="width:80px;">'.CONSTANT_BUTTON_VIEW.'</th>
				 <th align="center" style="width:80px;">'.CONSTANT_BUTTON_EDIT.'</th>
               </tr>';
              	$sl=1;
            	$SqlRecord = "SELECT * FROM ".TBL_ADMIN_ARTICLE." ORDER BY ad_art_id ASC;";
            	$RstRecord=mysql_query($SqlRecord);
               while($RowRecord=mysql_fetch_object($RstRecord))
                {  
				  $fcontent .= '
                  <tr class="text_tr">
                    <td><input type="checkbox" name="checkitem[]" id="checkitem" onclick="CheckIndividual(this);" value="'.$RowRecord->ad_art_id.'" 
					title="'.CONSTANT_CHECKBOX_TITLE_CAPTION.'" ></td>
                    <td align="center">'.$sl.'</td>
                    <td>'.$RowRecord->ad_art_pagetitle.'</td>
					<td>'.$RowRecord->ad_art_content_title.'</td>
					<td align="center"><a href="javascript: SingleFuncViewRecord('.$RowRecord->ad_art_id.');" title="'.CONSTANT_BUTTON_TEXT_VIEW.'"><img 
					title="'.CONSTANT_BUTTON_TEXT_VIEW.'" src="images/button/settings/view.png" border="0" /></a></td>
                   <td align="center"><a href="javascript: SingleFuncEditRecord('.$RowRecord->ad_art_id.');" title="'.CONSTANT_BUTTON_TEXT_EDIT.'"><img 
				   title="'.CONSTANT_BUTTON_TEXT_EDIT.'" src="images/button/settings/edit.png" border="0" /></a></td>
                  </tr>';
                  $sl++;
                }
               $fcontent .= '
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