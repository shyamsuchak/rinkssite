/*#------------------------------------------------------------------------#*/
/*# Index Page JavaScript                                                  #*/
/*# ---------------------------------------------------------------------- #*/
/*# Kre8iveminds                                                         	 #*/
/*# 16, Gangadhar Babu Lane, Near Central Metro                              #*/
/*# Kolkata - 700012                                                         #*/
/*# Websites:  http://www.kre8iveminds.com                                   #*/
/*#------------------------------------------------------------------------#*/

/* BeGIN : Cancel Record Button Function */
 function FuncCancelRecord()  
  {                                               
    document.getElementById("DataID").value = '';
    document.getElementById("PageAction").value = "";
    document.form_name.submit();
  }
/* END   : Cancel Record Button Function */
/* BeGIN : Edit Record Button Function */
 function FuncEditNewRecord()  
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
/* BeGIN : Save Record Button Function */
 function FuncSaveNewRecord()
  {
    document.getElementById("PageAction").value = "SaveData";   
    document.form_name.action = "admin_settings.php?Action=ActionSaveData";
    document.form_name.submit();
  }
/* END   : Save Record Button Function */     
/* BeGIN : Save Record Button Function */
 function FuncRecordHelp()
  {
    alert('Comming soon...');
  }
/* END   : Save Record Button Function */

/******************Single Edit Function**************/
 function FuncSingleEditNewRecord(id,index)  
  {  
       var RecordID;
	   RecordID=id;
	    document.form_name.checkitem[index].checked = true;
	  // document.getElementById('checkitem_'+id).checked = true;
       document.getElementById("DataID").value = RecordID;
       document.getElementById("PageAction").value = "Edit";    
       document.form_name.action = "admin_settings.php";
       document.form_name.submit();
  }
/******************END Single Edit Function**************/