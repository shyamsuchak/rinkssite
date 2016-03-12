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
          document.form_name.action = "admin_article.php?Action=ActionDelete";
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
    
	if(document.getElementById('ad_art_pagetitle').value=="")
     {
       alert('Please Enter Name.');
       document.getElementById('ad_art_pagetitle').focus();
     }
	else
     {
       document.getElementById("PageAction").value = "SaveData";   
       document.form_name.action = "admin_article.php?Action=ActionSaveData";
       document.form_name.submit();
     }
  }
/* END   : Save Edited Record Button Function */  
/* BeGIN : Add New Record Button Function */  
 function FuncAddNewRecord()
  {
	 alert ('hi');
    document.getElementById("DataID").value = '';
    document.getElementById("PageAction").value = "AddNew";
    document.form_name.action = "admin_article.php";
    document.form_name.submit();
  }
/* END   : Add New Record Button Function */
/* BeGIN : Save Record Button Function */
 function FuncSaveNewRecord()
  { 
    if(document.getElementById('ad_art_pagetitle').value=="")
     {
       alert('Please Enter Name.');
       document.getElementById('ad_art_pagetitle').focus();
     }
	else
     {
       document.getElementById("PageAction").value = "SaveNewData";
       document.form_name.action = "admin_article.php?Action=ActionSaveNewData";
       document.form_name.submit();
     }
  }
/* END   : Save Record Button Function */     
/* BeGIN : Save Record Button Function */
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