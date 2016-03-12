/*#------------------------------------------------------------------------#*/
/*# Common JavaScript For All Pages                                        #*/
/*# ---------------------------------------------------------------------- #*/
/*# Kre8iveminds                                                         	 #*/
/*# 16, Gangadhar Babu Lane, Near Central Metro                              #*/
/*# Kolkata - 700012                                                         #*/
/*# Websites:  http://www.kre8iveminds.com                                   #*/
/*#------------------------------------------------------------------------#*/
String.prototype.trim = function() { return this.replace(/^\s+|\s+$/, ''); };
/* BEGIN : Check All Checkbox Function        */
function CheckAllRecord()
 {
   var i;
   if(document.form_name.checkall.checked == true)
    {
      for (i=0; i < document.form_name.checkitem.length;i++)
       {
         document.form_name.checkitem[i].checked = true;
         document.form_name.checkitem[i].parentNode.parentNode.className ="text_tr_selected";
       }
    }
   else
    {
      for (i=0; i < document.form_name.checkitem.length;i++)
       {
         document.form_name.checkitem[i].checked = false;
         document.form_name.checkitem[i].parentNode.parentNode.className ="text_tr";
       }
    }
   if(i == 0)
    {
      if(document.form_name.checkall.checked == true)
       {
         document.form_name.checkitem.checked = true;
         document.form_name.checkitem.parentNode.parentNode.className ="text_tr_selected";
       }
      else
       {
         document.form_name.checkitem.checked = false;
         document.form_name.checkitem.parentNode.parentNode.className ="text_tr";
       }
    }
 }
/* END   : Check All Checkbox Function        */
     
/* BEGIN : Check Checkbox Function        */
function CheckIndividual(chk_obj)
 {
   var i, state=0;
   if(chk_obj.checked == true)
    {
      chk_obj.parentNode.parentNode.className ="text_tr_selected";
    }
   else
    {
      chk_obj.parentNode.parentNode.className ="text_tr";
    } 
   for (i=0; i < document.form_name.checkitem.length; i++)
    {
      if(document.form_name.checkitem[i].checked == false)
       {
         state=1;
         break;
       }
    }
   if(i == 0 && chk_obj.checked == false)
    { 
      state=1;
    }
   if(state == 1)
    {     
      document.form_name.checkall.checked = false;
    }
   else
    { 
      document.form_name.checkall.checked = true;
    }
 }  
/* END   : Check Checkbox Function        */
     
/* BEGIN : Check Checkbox on TD Onclick Function        */
function CheckIndividualByTd(td_obj)
 {
    //alert(td_obj.parentNode.firstChild.nodeType );
 }    
/* END   : Check Checkbox on TD Onclick Function        */

