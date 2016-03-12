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
      //
      if(isset($_REQUEST['Action']) && $_REQUEST['Action'] == "ActionSaveData" && $PageAction =="SaveData")
       {
         $SqlUpdate="UPDATE ".TBL_CONFIGURATION." SET CfgValue=".tosql($_POST['DataValue'], "Text")."
         where CfgID='".$DataID."';";
         mysql_query($SqlUpdate);
         tep_redirect(tep_href_link(CURRENT_PAGE_NAME));
       }
      //
      $pcontent =' 
      <form name="form_name" id="form_name" action="#" onsubmit="return false;" method="post" enctype="multipart/form-data" >
      <input type="hidden" name="DataID" id="DataID" value="'.$DataID.'">
      <input type="hidden" name="PageAction" id="PageAction" value="'.$PageAction.'">
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">';
        if($PageAction == "Edit" && $DataID !="")
         {
           $pcontent .='
           <tr>
             <td>'.$this->EditSiteSettingRecords(PAGE_INDEX,$DataID).'</td>
           </tr>
           <tr>
             <td><img src="images/blank.gif" border="0" height="10" /></td>
           </tr>';
         }
        $pcontent .='
        <tr>
          <td>'.$this->ViewSiteSettingRecords(PAGE_INDEX).'</td>
        </tr>
      </table>
      </form>';
      return $pcontent;
    }      
   function EditSiteSettingRecords($CfgGroupID,$DataID)
    {    
      $Sql_PageTitle = "SELECT * FROM ".TBL_CONFIG_GROUP." WHERE CfgGroupID='".$CfgGroupID."';";
      $Row_PageTitle=mysql_fetch_object(mysql_query($Sql_PageTitle));
      $SqlEditRecord="SELECT * FROM ".TBL_CONFIGURATION." WHERE CfgEditable='1' AND CfgGroupID='".$CfgGroupID."' AND CfgID='".$DataID."';";
      $RowEditRecord=mysql_fetch_object(mysql_query($SqlEditRecord));
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
              <td align="left"><h1>'.CONSTANT_EDIT_HEADING.'</h1></td>
              <td align="right" class="top_button">
              <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><a href="javascript: ';
                  if($RowEditRecord->CfgType == "E")
                   {
                     $fcontent .= 'WYSIWYG.updateTextArea(\'DataValue\');';
                   }
                  $fcontent .= 'FuncSaveNewRecord();" title="'.CONSTANT_BUTTON_TEXT_SAVE.'" ><img title="'.CONSTANT_BUTTON_TEXT_SAVE.'" src="images/button/settings/save.png" border="0" /></a></td>
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
              <td class="label-text" align="right">'.$RowEditRecord->CfgCaption.'</td>
              <td class="label-text" align="center" style="width:20px">:</td>
              <td class="label-text" align="left" style="width:70%">';
              if($RowEditRecord->CfgType == "T")
               {
                 $fcontent .= '<input type="text" name="DataValue" id="DataValue" value="'.$RowEditRecord->CfgValue.'" style="width:'.$RowEditRecord->CfgFldSize.';" class="input_box" >';
               }
              elseif($RowEditRecord->CfgType == "A")
               {
                 $fcontent .= '<textarea name="DataValue" id="DataValue" cols="3" rows="5" style="width:'.$RowEditRecord->CfgFldSize.';" class="input_box" >'.$RowEditRecord->CfgValue.'</textarea>';
               }
              elseif($RowEditRecord->CfgType == "E")
               {
                 $fcontent .= ' 
                 <!--  Attach the editor on the textareas -->
                 <script type="text/javascript">
                   // Use it to attach the editor directly to a defined textarea  
                   WYSIWYG.attach(\'DataValue\', full); // small featured setup
                 </script>  
                 <textarea id="DataValue" name="DataValue" style="width:90%;height:300px;">'.$RowEditRecord->CfgValue.'</textarea>';
               }
              elseif($RowEditRecord->CfgType == "S")
               {
                 $fcontent .= '<select name="DataValue" id="DataValue" style="width:'.$RowEditRecord->CfgFldSize.';">';
                 $fcontent .= "\n";
                 $arr_variable = explode("\n",$RowEditRecord->CfgVariable);
                 foreach($arr_variable as $val_variable)
                  {
                    $arr1_variable = explode("=",$val_variable);
                    if(trim($arr1_variable[1]) == trim($RowEditRecord->CfgValue))
                      $fcontent .= '<option value="'.$arr1_variable[1].'" selected="selected">'.$arr1_variable[0].'</option>';
                    else
                      $fcontent .= '<option value="'.$arr1_variable[1].'">'.$arr1_variable[0].'</option>';
                      $fcontent .= "\n";
                  }
                 $fcontent .= '</select>';
                 $fcontent .= "\n";
               }
              $fcontent .= '
              </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td class="alert_msg">'.$RowEditRecord->CfgDesc.'</td>
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
   function ViewSiteSettingRecords($CfgGroupID)
    { 
      $Sql_PageTitle = "SELECT * FROM ".TBL_CONFIG_GROUP." WHERE CfgGroupID='".$CfgGroupID."';";
      $Row_PageTitle=mysql_fetch_object(mysql_query($Sql_PageTitle));
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
                  <td><a href="javascript: FuncEditNewRecord();" title="'.CONSTANT_BUTTON_TEXT_EDIT.'" ><img title="'.CONSTANT_BUTTON_TEXT_EDIT.'" src="images/button/settings/edit.png" border="0" /></a></td>
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
            <tr class="heading_tr">
              <th style="width:20px;">
			  <input type="hidden" name="checkall" id="checkall" onclick="CheckAllRecord();" title="'.CONSTANT_CHECKBOX_ALL_TITLE_CAPTION.'" /></th>
              <th style="width:60px;">'.CONSTANT_VIEW_HEADING_SERIAL_NUMBER.'</th>
              <th style="width:250px;">'.CONSTANT_VIEW_HEADING_CAPTION.'</th>
              <th>'.CONSTANT_VIEW_HEADING_VALUE.'</th>
			  <th align="center">'.CONSTANT_BUTTON_TEXT_EDIT.'</th>
            </tr>';
            $sl=1;
            $tdno = 0;       
            $SqlRecord = "SELECT * FROM ".TBL_CONFIGURATION." WHERE CfgEditable='1'
            AND CfgGroupID='".$CfgGroupID."' ORDER BY CfgOrder ASC;";
            $RstRecord=mysql_query($SqlRecord);
            while($RowRecord=mysql_fetch_object($RstRecord))
             {   
               $fcontent .= '
               <tr class="text_tr">
                 <td class="row_txt"><input type="checkbox" name="checkitem[]"  id="checkitem" onclick="CheckIndividual(this);" value="'.$RowRecord->CfgID.'" title="'.CONSTANT_CHECKBOX_TITLE_CAPTION.'" ></td>
                 <td class="row_txt">'.$sl.'</td>
                 <td class="row_txt">'.$RowRecord->CfgCaption.'</td>
                 <td class="row_txt">';
                 if($RowRecord->CfgType == "S")
                  {
                    $SelValue='';
                    $ArrVariable = explode("\n",$RowRecord->CfgVariable);
                    foreach($ArrVariable as $VarValue)
                     {
                       $ArrVariable01 = explode("=",$VarValue);
                       if(trim($ArrVariable01[1]) == trim($RowRecord->CfgValue))
                        {
                          $SelValue = $ArrVariable01[0];
                        }
                     } 
                    $fcontent .= $SelValue;
                  }
                 else
                  {
                    $fcontent .= $RowRecord->CfgValue;
                  }
                 $fcontent .= '</td>
				  <td align="center"><a href="javascript: FuncSingleEditNewRecord('.$RowRecord->CfgID.','.($sl-1).');" title="'.CONSTANT_BUTTON_TEXT_EDIT.'" ><img title="'.CONSTANT_BUTTON_TEXT_EDIT.'" src="images/button/settings/edit.png" border="0" /></a></td>
               </tr>';
               $sl++;
             }
            $fcontent .= '
          </table></td>
        </tr>
        <tr>
          <td align="left" valign="top" style="width:9px;"><img src="__TEMPLATE_ROOT_PATH__images/round_box/tbl_bottom_lt.gif" border="0" width="9" height="9"></td>
          <td align="left" class="round_tbl_bottom_rt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0" width="9" height="9"></td>
        </tr>
      </table>';  
      return $fcontent;
    }
 }
?>