/*#------------------------------------------------------------------------#*/
/*# Index Page JavaScript                                                  #*/
/*# ---------------------------------------------------------------------- #*/
/*# Kre8iveminds                                                         	 #*/
/*# 16, Gangadhar Babu Lane, Near Central Metro                              #*/
/*# Kolkata - 700012                                                         #*/
/*# Websites:  http://www.kre8iveminds.com                                   #*/
/*#------------------------------------------------------------------------#*/

/* BeGIN : Pagination Record Button Function */
function FuncChangePage(PageNo)
 {
   document.getElementById('PageNo').value = PageNo;
   document.form_name.submit();
 }
/* END   : Pagination Record Button Function */
// BEGIN : View Record Details Function
function FuncRecordDetails()
 {
   alert("Coming Soon...");
 }
// END   : View Record Details Function 
/* BeGIN : Sort Record Up Button Function */
function FuncRecordSortUp(RecordID)
 {
   document.getElementById("DataID").value = RecordID;
   document.getElementById("PageAction").value = "SortUp";
   document.form_name.action = "news.php?Action=ActionSortUp";
   document.form_name.submit();
 }
/* END   : Sort Record Up Button Function */  
/* BeGIN : Sort Record Down Button Function */
function FuncRecordSortDown(RecordID)
 {
   document.getElementById("DataID").value = RecordID;
   document.getElementById("PageAction").value = "SortDown";
   document.form_name.action = "news.php?Action=ActionSortDown";
   document.form_name.submit();
 }
/* END   : Sort Record Down Button Function */  
/* BeGIN : Publish Record Button Function */
function FuncEnableRecord(RecordID)
 {
   var chk=confirm("Are you sure want to publish the selected record?");
   if (chk==true)
    {
      document.getElementById("DataID").value = RecordID;
      document.getElementById("PageAction").value = "EnableRecord";
      document.form_name.action = "news.php?Action=ActionEnableRecord";
      document.form_name.submit();
    }
 }
/* END   : Publish Record Button Function */
/* BeGIN : Unpublish Record Button Function */
function FuncDisableRecord(RecordID)
 {
   var chk=confirm("Are you sure want to unpublish the selected record?");
   if (chk==true)
    {
      document.getElementById("DataID").value = RecordID;
      document.getElementById("PageAction").value = "DisableRecord";
      document.form_name.action = "news.php?Action=ActionDisableRecord";
      document.form_name.submit();
    }
 }
/* END   : Unpublish Record Button Function */
/* BeGIN : Publish Selected Records Button Function */
 function FuncEnableAllRecord()
  {
    var cnt = 0;
    var RecordID;
    var frm = document.forms['form_name'];
    var elms = document.getElementsByTagName('input');
    for(var i = 0; i < elms.length; ++i)
     {
       if (elms[i].type == "checkbox")
        {
          if (elms[i].name == "checkitem[]" && elms[i].checked)
           {
             RecordID = elms[i].value;
             cnt++;
           }
        }
     }
    if(cnt==0)
     {
       alert("Select the record you wish to publish.");
     }
    else
     {       
       var chk=confirm("Are you sure want to publish the selected record(s)?");
       if (chk==true)
        {                            
          document.getElementById("DataID").value = 0;
          document.getElementById("PageAction").value = "EnableAllRecord"; 
          document.form_name.action = "news.php?Action=ActEnableAllRecord";
          document.form_name.submit();
        }
     }
  }
/* END   : Publish Selected Records Button Function */
/* BeGIN : Unpublish Selected Records Button Function */
 function FuncDisableAllRecord()
  {
    var cnt = 0;
    var RecordID;
    var frm = document.forms['form_name'];
    var elms = document.getElementsByTagName('input');
    for(var i = 0; i < elms.length; ++i)
     {
       if (elms[i].type == "checkbox")
        {
          if (elms[i].name == "checkitem[]" && elms[i].checked)
           {
             RecordID = elms[i].value;
             cnt++;
           }
        }
     }
    if(cnt==0)
     {
       alert("Select the record you wish to unpublish.");
     }
    else
     {       
       var chk=confirm("Are you sure want to unpublish the selected record(s)?");
       if (chk==true)
        {
          document.getElementById("DataID").value = '';
          document.getElementById("PageAction").value = "DisableAllRecord";
          document.form_name.action = "news.php?Action=ActDisableAllRecord";
          document.form_name.submit();
        }
     }
  }
/* END   : Unpublish Selected Records Button Function */

/* BeGIN : Cancel Record Button Function */
function FuncCancelRecord()
 {
   document.getElementById("DataID").value = '';
   document.getElementById("PageAction").value = "";
   document.form_name.submit();
 }
/* END   : Cancel Record Button Function */  

/* BeGIN : Delete Record Button Function */
 function FuncDeleteRecord()
  {        
    var cnt = 0;
    var RecordID;
    var frm = document.forms['form_name'];
    var elms = document.getElementsByTagName('input');
    for(var i = 0; i < elms.length; ++i)
     {
       if (elms[i].type == "checkbox")
        {
          if (elms[i].name == "checkitem[]" && elms[i].checked)
           {
             RecordID = elms[i].value;
             cnt++;
           }
        }
     }
    if(cnt==0)
     {
       alert("Select the record you wish to delete.");
     }
    else
     {       
       var chk=confirm("Are you sure want to delete the selected record(s)?");
       if (chk==true)
        {                            
          document.getElementById("DataID").value = 0;
          document.getElementById("PageAction").value = "Delete";
          document.form_name.action = "news.php?Action=ActionDelete";
          document.form_name.submit();
        }
     }
  }
/* END   : Delete Record Button Function */

/* BeGIN : Edit Record Button Function */
 function FuncEditRecord()
  {                 
    var cnt = 0;
    var RecordID;
    var frm = document.forms['form_name'];
    var elms = document.getElementsByTagName('input');
    for(var i = 0; i < elms.length; ++i)
     {
       if (elms[i].type == "checkbox")
        {
          if (elms[i].name == "checkitem[]" && elms[i].checked)
           {
             RecordID = elms[i].value;
             cnt++;
           }
        }
     }
    if(cnt==0)
     {
       alert("Select the record you wish to edit.");  
       //return false;
     }
    else if(cnt!=1)
     {
       alert("Only one record can be edited at a time. Multiple selection not allowed."); 
       //return false;
     }
    else
     {
       document.getElementById("DataID").value = RecordID;
       document.getElementById("PageAction").value = "Edit";
       document.form_name.submit();
     }
  }
/* END   : Edit Record Button Function */  
/* BeGIN : Save Edited Record Button Function */
 function FuncSaveEditedRecord() //effect in administrator/jss/validmsg.php
  {
    
	if(document.getElementById('real_state_date').value=="")
     {
	   alert("Please select a date");
     }
	 else if(document.getElementById('real_state_short').value=="")
     {
	   alert("Please enter short description");
     }
	else
     {
       document.getElementById("PageAction").value = "SaveData";   
       document.form_name.action = "news.php?Action=ActionSaveData";
       document.form_name.submit();
     }
  }
/* END   : Save Edited Record Button Function */  
/* BeGIN : Add New Record Button Function */  
 function FuncAddNewRecord()
  {
    document.getElementById("DataID").value = '';
    document.getElementById("PageAction").value = "AddNew";
    document.form_name.action = "news.php";
    document.form_name.submit();
  }
/* END   : Add New Record Button Function */
/* BeGIN : Save Record Button Function */

 function FuncSaveNewRecord() //effect in administrator/jss/validmsg.php
  { 
	if(document.getElementById('real_state_date').value=="")
     {
	   alert("Please select a date");
     }
	 else if(document.getElementById('real_state_short').value=="")
     {
	   alert("Please enter short description");
     }
	else
     {
       document.getElementById("PageAction").value = "SaveNewData";
       document.form_name.action = "news.php?Action=ActionSaveNewData";
       document.form_name.submit();
     }
  }
/* END   : Save Record Button Function */     
/* BeGIN : Save Record Button Function */

function isvalidemail(value)
{
	var fileexpr=/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
	return fileexpr.test(value);
}

function isvalidcontact(value)
{
	var fileexpr=/^(\d{10},)*\d{10}$/;
	//var fileexpr=/^\(\d{3}\)\s*\d{3}(?:-|\s*)\d{4}$/;
	return fileexpr.test(value);
}


function isvalidimgfile(value)
{
	var fileexpr=/^.*(\.(gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG))$/;
	return fileexpr.test(value);
}

/* END   : Save Record Button Function */
function SingleFuncEditRecord(id)
  {                 
      var RecordID;
       RecordID = id;
       document.getElementById("DataID").value = RecordID;
       document.getElementById("PageAction").value = "Edit";
       document.form_name.submit();
  }
/*-------------------- single view Begin--------------------*/  
function SingleFuncViewRecord(id)
  {                 
      var RecordID;
       RecordID = id;
       document.getElementById("DataID").value = RecordID;
       document.getElementById("PageAction").value = "View";
       document.form_name.submit();
  }  
/*-------------------- single view End--------------------*/    

