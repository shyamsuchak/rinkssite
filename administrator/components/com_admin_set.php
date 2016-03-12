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
      $PageNo = isset($_REQUEST['PageNo']) ? $_REQUEST['PageNo'] : 1;
      $EachPage = isset($_REQUEST['EachPage']) ? $_REQUEST['EachPage'] : 10;
      $ActionPath = CURRENT_PAGE_NAME."?PageNo=".$PageNo."&EachPage=".$EachPage; 
      /* BEGIN : Add New Record To The Database  */   
      if(isset($_REQUEST['Action']) && $_REQUEST['Action'] == "ActionSaveNewData" && $PageAction =="SaveNewData")
       {  
	     $num=mysql_num_rows(mysql_query("SELECT * FROM ".TBL_MEMBER_LOG_DETAILS." WHERE MemUsername='".$_POST['uname']."'"));
		 if(!$num)
		  {
//$MemUsername=mysql_real_escape_string($_POST['uname']); 
$MemPassword=mysql_real_escape_string($_POST['pass']); 
$MemPassword=md5($MemPassword); // Encrypted Password

			 $SqlMaxID = "SELECT MAX(MemID ) AS MaxID FROM ".TBL_MEMBER_LOG_DETAILS.";";
			 $RowMaxID = mysql_fetch_object(mysql_query($SqlMaxID));
			 $MaxID = $RowMaxID->MaxID + 1;
			 $SqlInsert = "INSERT INTO ".TBL_MEMBER_LOG_DETAILS." (MemID,MemTypeKey,MemName,MemEmail,phone,address,MemUsername ,MemPassword ,`MemLogStatus`) VALUES (".$MaxID.",'MEM_TYPE_ADMINS',".tosql($_POST['name'], "Text").",".tosql($_POST['email'], "Text").",".tosql($_POST['phone'], "Text").",".tosql($_POST['address'], "Text").",".tosql($_POST['uname'], "Text").",'".$MemPassword."',2);";
			 mysql_query($SqlInsert) or die(mysql_error());
			 
			 tep_redirect(tep_href_link($ActionPath));
		   }
		 else  
		  $errormessg='This user name already present.'; 	 
       }                        
      /* END   : Add New Record To The Database  */
      /* BEGIN : Edit New Record To The Database  */   
      if(isset($_REQUEST['Action']) && $_REQUEST['Action'] == "ActionSaveData" && $PageAction =="SaveData")
       {
	   
	   $num=mysql_num_rows(mysql_query("SELECT * FROM ".TBL_MEMBER_LOG_DETAILS." WHERE MemUsername='".$_POST['uname']."' AND MemID!='".$DataID."'"));
		 if(!$num)
		  {
	   
	    $SqlUpdate = "UPDATE ".TBL_MEMBER_LOG_DETAILS." SET MemName=".tosql($_POST['name'], "Text").", phone=".tosql($_POST['phone'], "Text").", MemEmail=".tosql($_POST['email'], "Text").",address=".tosql($_POST['address'], "Text").",MemUsername=".tosql($_POST['uname'], "Text")." WHERE MemID ='".$DataID."';";
         //die($SqlUpdate);
         mysql_query($SqlUpdate);
         tep_redirect(tep_href_link($ActionPath));
		  }
		else  
		  $errormessg='This user name already present.';
       }    
	 if(isset($_REQUEST['Action']) && $_REQUEST['Action'] == "ActionSaveNewPassword" && $PageAction =="SaveNewPassword")
       {
	    $SqlUpdate = "UPDATE ".TBL_MEMBER_LOG_DETAILS." SET MemPassword=".tosql($_POST['npass'], "Text")." WHERE MemID ='".$_SESSION[LOG_SESSION_PREFIX."admin_userid"]."';";
         //die($SqlUpdate);
         mysql_query($SqlUpdate);
         tep_redirect(tep_href_link($ActionPath));
		  }
	                       
            /* BEGIN : Delete Selected Records TO The Database  */
      if(isset($_REQUEST['Action']) && $_REQUEST['Action'] == "ActionDelete" && $PageAction =="Delete")
       {
         extract($_POST);
         $Count = count($checkitem);
         for($i=0;$i < $Count; $i++)
          { 
			$SqlDelete = "DELETE FROM ".TBL_MEMBER_LOG_DETAILS." WHERE MemID ='".$checkitem[$i]."';";
            mysql_query($SqlDelete);
          }               
         tep_redirect(tep_href_link($ActionPath));
       }
	   
	  if(isset($_REQUEST['Action']) && $_REQUEST['Action'] == "ActionEnableRecord" && $PageAction =="EnableRecord")
       {
         $SqlUpdate01 = "UPDATE ".TBL_MEMBER_LOG_DETAILS." SET MemBlock='0' WHERE MemID='".$DataID."';";
         mysql_query($SqlUpdate01);
         tep_redirect(tep_href_link($ActionPath));
       }                 
      /* END   : Enable Record To The Database  */
      /* BEGIN : Disable Record To The Database  */
      if(isset($_REQUEST['Action']) && $_REQUEST['Action'] == "ActionDisableRecord" && $PageAction =="DisableRecord")
       {
         $SqlUpdate01 = "UPDATE ".TBL_MEMBER_LOG_DETAILS." SET MemBlock='1' WHERE MemID='".$DataID."';";
         mysql_query($SqlUpdate01);
         tep_redirect(tep_href_link($ActionPath));
       }  
	   
      /* END   : Delete Selected Records TO The Database  */
      $pcontent =' 
      <form name="form_name" id="form_name" action="admin_set.php" onsubmit="return false;" method="post" enctype="multipart/form-data" >
      <input type="hidden" name="DataID" id="DataID" value="'.$DataID.'">
      <input type="hidden" name="PageAction" id="PageAction" value="'.$PageAction.'">
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">'; 
	         if(isset($errormessg))
				  {
				   $pcontent.='<tr>
                  <td colspan="3" align="center" style="color:#FF0000; font-weight:bold">'.$errormessg.'</td>
                </tr>';
				}
	  
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
		if($PageAction == "changepassword" && $DataID !="")
         {
           $pcontent .='
           <tr>
             <td>'.$this->AddNewPassword(PAGE_INDEX,$DataID).'</td>
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
        $pcontent .='
        <tr>
          <td>'.$this->ViewNewsRecords(PAGE_INDEX).'</td>
        </tr>
      </table>
      </form>';
      return $pcontent;
    }     
   function AddNewNewsRecords()
    {
      $fcontent ='
      <!-- BEGIN : Round Table
	 -->
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
                  <td><a href="javascript:FuncSaveNewRecord();" title="'.CONSTANT_BUTTON_TEXT_SAVE.'" ><img title="'.CONSTANT_BUTTON_TEXT_SAVE.'" src="images/button/articles/save.png" border="0" /></a></td>
                  <td><img src="images/blank.gif" height="1" border="0" width="3"></td>
                  <td><a href="javascript: FuncCancelRecord();" title="'.CONSTANT_BUTTON_TEXT_CANCEL.'" ><img title="'.CONSTANT_BUTTON_TEXT_CANCEL.'" src="images/button/articles/cancel.png" border="0" /></a></td>
                  <td><img src="images/blank.gif" height="1" border="0" width="3"></td>
                </tr></table></td>
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
                  <td class="label-text" align="left">'.PERSON_NAME.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%"><input type="text" name="name" id="name" value="" size="30" style="width:57%;" class="input_box" ></td>
                </tr>
				<tr>
                  <td class="label-text" align="left">'.PERSON_USER_NAME.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%"><input type="text" name="uname" id="uname" value="" size="30" style="width:57%;" class="input_box" ></td>
                </tr>
				
				<tr>
                  <td class="label-text" align="left">'.PERSON_USER_PASSWORD.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%"><input type="password" name="pass" id="pass" value="" size="30" style="width:57%;" class="input_box" ></td>
                </tr>
				 
				
				 <tr>
                  <td class="label-text" align="left">'.YOUR_EMAIL.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%"><input type="text" name="email" id="email" value="" size="30" style="width:57%;" class="input_box" ></td>
                </tr>
				<tr>
                  <td class="label-text" align="left">'.PROFILE_PHONE.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%"><input type="text" name="phone" id="phone" value="" size="30" style="width:57%;" class="input_box" ></td>
                </tr>
				
			     <tr>
                  <td class="label-text" align="left">'.YOUR_ADDRESS.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%"><textarea name="address" id="address" style="width:58%; height:60px;"></textarea>
</td>
                </tr>
				
              </table></td>
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
      $SqlEditRecord="SELECT * FROM ".TBL_MEMBER_LOG_DETAILS." WHERE  MemID ='".$DataID."';";
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
                  <td><a href="javascript: FuncSaveEditedRecord();" title="'.CONSTANT_BUTTON_TEXT_SAVE.'" ><img title="'.CONSTANT_BUTTON_TEXT_SAVE.'" src="images/button/articles/save.png" border="0" /></a></td>
                  <td><img src="images/blank.gif" height="1" border="0" width="3"></td>
                  <td><a href="javascript: FuncCancelRecord();" title="'.CONSTANT_BUTTON_TEXT_CANCEL.'" ><img title="'.CONSTANT_BUTTON_TEXT_CANCEL.'" src="images/button/articles/cancel.png" border="0" /></a></td>
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
                  <td class="label-text" align="left">'.PERSON_NAME.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%"><input type="text" name="name" id="name" value="'.$RowEditRecord->MemName.'" size="30" style="width:57%;" class="input_box" ></td>
                </tr>
				<tr>
                  <td class="label-text" align="left">'.PERSON_USER_NAME.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%"><input type="text" name="uname" id="uname" value="'.$RowEditRecord->MemUsername.'" size="30" style="width:57%;" class="input_box" ></td>
                </tr>

				<tr>
                  <td class="label-text" align="left">'.PERSON_USER_PASSWORD.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%"><input type="text" name="pass" id="pass" value="'.$RowEditRecord->MemPassword.'" size="30" style="width:57%;" class="input_box" ></td>
                </tr>

				
				 <tr>
                  <td class="label-text" align="left">'.YOUR_EMAIL.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%"><input type="text" name="email" id="email" value="'.$RowEditRecord->MemEmail.'" size="30" style="width:57%;" class="input_box" ></td>
                </tr>
				<tr>
                  <td class="label-text" align="left">'.PROFILE_PHONE.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%"><input type="text" name="phone" id="phone" value="'.$RowEditRecord->phone.'" size="30" style="width:57%;" class="input_box" ></td>
                </tr>
				
			     <tr>
                  <td class="label-text" align="left">'.YOUR_ADDRESS.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%"><textarea name="address" id="address" style="width:58%; height:60px;">'.$RowEditRecord->address .'</textarea>
</td>
                </tr>
				
              </table></td>
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
	
	function AddNewPassword($CfgGroupID,$DataID)
    {
      $SqlEditRecord="SELECT * FROM ".TBL_MEMBER_LOG_DETAILS." WHERE  MemID ='".$DataID."';";
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
              <td align="left"><h1>'.CONSTANT_PASSWORD_HEADING.'</h1></td>
              <td align="right" class="top_button">
              <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><a href="javascript: FuncSavepassword();" title="'.CONSTANT_BUTTON_TEXT_SAVE.'" ><img title="'.CONSTANT_BUTTON_TEXT_SAVE.'" src="images/button/articles/save.png" border="0" /></a></td>
                  <td><img src="images/blank.gif" height="1" border="0" width="3"></td>
                  <td><a href="javascript: FuncCancelRecord();" title="'.CONSTANT_BUTTON_TEXT_CANCEL.'" ><img title="'.CONSTANT_BUTTON_TEXT_CANCEL.'" src="images/button/articles/cancel.png" border="0" /></a></td>
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
                  <td class="label-text" align="left">'.YOUR_CHANGE_PASSWORD.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%"><input type="password" name="npass" id="npass"  size="30" style="width:57%;" class="input_box" ></td>
                </tr>
				<tr>
                  <td class="label-text" align="left">'.YOUR_CONFIRM_PASSWORD.'</td>
                  <td class="label-text" align="center" style="width:10px">:</td>
                  <td class="label-text" align="left" style="width:70%"><input type="password" name="cpass" id="cpass"  size="30" style="width:57%;" class="input_box" ></td>
                </tr>
				
              </table></td>
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
      $EachPage = isset($_REQUEST['EachPage']) ? $_REQUEST['EachPage'] : 17;
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
                 <td><a href="javascript: FuncAddNewRecord();" title="'.CONSTANT_BUTTON_TEXT_ADD.'" ><img title="'.CONSTANT_BUTTON_TEXT_ADD.'" src="images/button/articles/add.png" border="0" /></a></td>
                  <td><img src="images/blank.gif" height="1" border="0" width="3"></td>
                  <td><a href="javascript: FuncEditRecord();" title="'.CONSTANT_BUTTON_TEXT_EDIT.'"><img title="'.CONSTANT_BUTTON_TEXT_EDIT.'" src="images/button/articles/edit.png" border="0" /></a></td>
                  <!--<td><img src="images/blank.gif" height="1" border="0" width="3"></td>
                  <td><a href="javascript: FuncEnableAllRecord();" title="'.CONSTANT_BUTTON_TEXT_ENABLE_ALL.'" ><img title="'.CONSTANT_BUTTON_TEXT_ENABLE_ALL.'" src="images/button/articles/enable.png" border="0" /></a></td>
                  <td><img src="images/blank.gif" height="1" border="0" width="3"></td>
                  <td><a href="javascript: FuncDisableAllRecord();" title="'.CONSTANT_BUTTON_TEXT_DISABLE_ALL.'" ><img title="'.CONSTANT_BUTTON_TEXT_DISABLE_ALL.'" src="images/button/articles/disable.png" border="0" /></a></td>
                  <td><img src="images/blank.gif" height="1" border="0" width="3"></td>
                  <td><a href="javascript: FuncDeleteRecord();" title="'.CONSTANT_BUTTON_TEXT_DELETE.'" ><img title="'.CONSTANT_BUTTON_TEXT_DELETE.'" src="images/button/articles/delete.png" border="0" /></a></td>-->
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
        $SqlTotCount = "SELECT COUNT(MemID) AS TotalRecord FROM ".TBL_MEMBER_LOG_DETAILS.";";
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
             <td align="left" valign="top" class="round_tbl_bg_lt"><img src="__TEMPLATE_ROOT_PATH__images/blank.gif" border="0"  width="9"></td>
             <td align="left" class="round_tbl_bg_rt">
             <table width="100%" border="0" cellspacing="0" cellpadding="0" >
               <tr class="heading_tr">
                 <th style="width:20px;"><input type="checkbox" name="checkall" id="checkall" onclick="CheckAllRecord();" title="'.CONSTANT_CHECKBOX_ALL_TITLE_CAPTION.'" /></th>
                 <th align="center" style="width:60px;">'.CONSTANT_VIEW_HEADING_SERIAL_NUMBER.'</th>
                 <th align="left" style="width:200px;">'.CONSTANT_VIEW_HEADING_VIEW_TITLE.'</th>
                 <th align="left" style="width:160px;">'.CONSTANT_VIEW_HEADING_VIEW_PHONE.'</th>
				 <th align="left" style="width:160px;">'.CONSTANT_VIEW_HEADING_VIEW_EMAIL.'</th>
				 <th align="center" style="width:120px;">'.CONSTANT_VIEW_HEADING_VIEW_PASSWORD.'</th>
				 <th align="center" style="width:60px;">'.CONSTANT_BUTTON_EDIT.'</th>
               </tr>';
               /*$SqlOrder = "SELECT MAX(newOrder) AS MaxOrder , MIN(newOrder) AS MinOrder FROM ".TBL_MEMBER_LOG_DETAILS.";";
               $RowOrder = mysql_fetch_object(mysql_query($SqlOrder));*/
               $SqlRecord = "SELECT * FROM ".TBL_MEMBER_LOG_DETAILS." ".$PageLimit.";";
               $RstRecord=mysql_query($SqlRecord);
               while($RowRecord=mysql_fetch_object($RstRecord))
                {   
                  $fcontent .= '
                  <tr class="text_tr">
                    <td><input type="checkbox" name="checkitem[]" id="checkitem" onclick="CheckIndividual(this);" value="'.$RowRecord->MemID .'" title="'.CONSTANT_CHECKBOX_TITLE_CAPTION.'" ></td>
                    <td align="center">'.$SlNo.'</td>
                    <td>'.$RowRecord->MemName.'</td>
                   <td>'.$RowRecord->MemUsername.'</td>
				   <td>'.$RowRecord->MemEmail.'</td>
				   <td align="center">';
				    if($_SESSION[LOG_SESSION_PREFIX."admin_userid"] ==$RowRecord->MemID)
					{
				     $fcontent .= '<a href="javascript:ChangePassword('.$_SESSION[LOG_SESSION_PREFIX."admin_userid"].');" title="'.CONSTANT_BUTTON_TEXT_EDIT.'"><img title="'.CONSTANT_BUTTON_TEXT_EDIT.'" src="images/button/articles/edit.png" border="0" /></a>';
				    }
					else
					 {
					   $fcontent .= '<img title="'.CONSTANT_BUTTON_TEXT_EDIT.'" src="images/button/articles/edit.png" border="0" />';
					 }
					 
				    $fcontent .= '</td> 
					 <td align="center"><a href="javascript: FuncSingleEditNewRecord('.$RowRecord->MemID.','.($SlNo-1).');" title="'.CONSTANT_BUTTON_TEXT_EDIT.'" ><img title="'.CONSTANT_BUTTON_TEXT_EDIT.'" src="images/button/settings/edit.png" border="0" /></a></td>
					</tr>';
                  $SlNo++;
                }
               $fcontent .= '
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