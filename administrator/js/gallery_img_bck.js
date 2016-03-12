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
   document.form_name.action = "gallery_img.php?Action=ActionSortUp";
   document.form_name.submit();
 }
/* END   : Sort Record Up Button Function */  
/* BeGIN : Sort Record Down Button Function */
function FuncRecordSortDown(RecordID)
 {
   document.getElementById("DataID").value = RecordID;
   document.getElementById("PageAction").value = "SortDown";
   document.form_name.action = "gallery_img.php?Action=ActionSortDown";
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
      document.form_name.action = "gallery_img.php?Action=ActionEnableRecord";
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
      document.form_name.action = "gallery_img.php?Action=ActionDisableRecord";
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
          document.form_name.action = "gallery_img.php?Action=ActEnableAllRecord";
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
          document.form_name.action = "gallery_img.php?Action=ActDisableAllRecord";
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
          document.form_name.action = "gallery_img.php?Action=ActionDelete";
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
 function FuncSaveEditedRecord()
  {
    
	if(document.getElementById('gal_cat_id').value=="")
     {
	   inlineMsg('gal_cat_id','Please enter the category.');
     }
	else if(document.getElementById('gal_img_heading').value=="")
     {
	   inlineMsg('gal_img_heading','Please enter image name.');
     }
	else if(document.getElementById('gal_img_image').value!="" && !isvalidimgfile(document.getElementById('gal_img_image').value))
     {
	   inlineMsg('gal_img_image','<strong>Error</strong><br />Invalid image.');
     }
    else if(document.getElementById('gal_img_sdesc').value=="")
     {
	   inlineMsg('gal_img_sdesc','Please enter description.');
     }
	else
     {
		document.getElementById("PageAction").value = "SaveData";
		document.form_name.action = "gallery_img.php?Action=ActionSaveData";
		document.form_name.submit();
     }
  }
/* END   : Save Edited Record Button Function */  
/* BeGIN : Add New Record Button Function */  
 
 function FuncAddNewRecord()
  {
    document.getElementById("DataID").value = '';
    document.getElementById("PageAction").value = "AddNew";
    document.form_name.action = "gallery_img.php";
    document.form_name.submit();
  }
  
  
  function FuncAddCatRecord()
  {
	var RecordID;
    RecordID = document.getElementById("galcat_id").value;
	//alert (RecordID);
    document.getElementById("DataID").value = '';
    document.getElementById("PageAction").value = "AddCat";
    document.form_name.action = "gallery_img.php?galcat_id="+RecordID;
	//document.form_name.action = "gallery_img.php";
    document.form_name.submit();
  }
  
/* END   : Add New Record Button Function */
/* BeGIN : Save Record Button Function */
 function FuncSaveNewRecord()
  { 
  //alert("111");
   //return false;
    alert(document.getElementById('hotel_name_cat').value);
	return false;
	/*if(document.getElementById('gal_cat_id').value=="")
     {
	   inlineMsg('gal_cat_id','Please enter the category.');
     }
	else if(document.getElementById('gal_img_heading').value=="")
     {
	   inlineMsg('gal_img_heading','Please enter image name.');
     }
	else if(document.getElementById('gal_img_image').value=="")
     {
	   inlineMsg('gal_img_image','Please enter the image.');
     }
	else if(document.getElementById('gal_img_image').value!="" && !isvalidimgfile(document.getElementById('gal_img_image').value))
     {
	   inlineMsg('gal_img_image','<strong>Error</strong><br />Invalid image.');
     }*/
    /*else if(document.getElementById('gal_img_sdesc').value=="")
     {
	   inlineMsg('gal_img_sdesc','Please enter description.');
     }*/
	//else
     //{
        
		document.getElementById("PageAction").value = "SaveNewData";
		document.form_name.action = "gallery_img.php?Action=ActionSaveNewData";
		document.form_name.submit();
		
		
		/*var RecordID;
    	RecordID = document.getElementById("galcat_id").value;
		//alert(RecordID);
		if(RecordID!="")
		{
		   document.getElementById("PageAction").value = "SaveNewData";
		   document.form_name.action = "gallery_img.php?Action=ActionSaveNewData&galcat_id="+RecordID;
		   document.form_name.submit();
		} 
		else 
		{
			document.getElementById("PageAction").value = "SaveNewData";
		   	document.form_name.action = "gallery_img.php?Action=ActionSaveNewData";
		   	document.form_name.submit();
		}*/
		
     //}
  }
/* END   : Save Record Button Function */     
/* BeGIN : Save Record Button Function */
function FuncRecordHelp()
 {
   alert('Comming soon...');
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