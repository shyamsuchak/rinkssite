<?php
/*# ------------------------------------------------------------------------ #*/
/*# Kre8iveminds                                                         	 #*/
/*# 16, Gangadhar Babu Lane, Near Central Metro                              #*/
/*# Kolkata - 700012                                                         #*/
/*# Websites:  http://www.kre8iveminds.com                                   #*/
/*#--------------------------------------------------------------------------#*/  
/*# functions.php                                                            #*/
/*# ------------------------------------------------------------------------ #*/
           
/*#------------ BEGIN : Replace special characters from string --------------#*/
function FuncReplaceSpclChar($text)
 {            
   $vowels = array("`", "'", "\"", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "+", "-", "=", "_");
   $text = str_replace($vowels, "", $text);
   return $text;
 }
/*#------------ END   : Replace special characters from string --------------#*/
  
/*#------------ BEGIN : Replace new line and space in text-------------------#*/
function FuncDisplayText($text)
 {          
   $text = str_replace("\n","<br />",$text);
   $text = str_replace("  ","&nbsp;&nbsp;",$text);
   return $text;
 }
/*#------------ END   : Replace new line and space in text-------------------#*/   
     //-------------------------------
     // Email Validator
     //-------------------------------
     function email_valid($str)
      {
        if (ereg("^[a-z0-9-]+(\.[a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)+$", $str))
         {
           return 1;
         }
        else
         {
           return 0;
         }
      }
     //-------------------------------
     // Convert value for use with SQL statament
     //-------------------------------
     function tosql($value, $type)
      {
         if(!strlen($value))
          {
            return "NULL";
          }
         else
          {      
            if($type == "Number")
             {
               return str_replace (",", ".", doubleval($value));
             }
            elseif($type == "Float")
             {
               return doubleval(str_replace (",", "", $value));
             }
            else
             {
               if(get_magic_quotes_gpc() == 0)
                {
                  $value = str_replace("'","''",$value);
                  $value = str_replace("\\","\\\\",$value);
                }
               else
                {
                  $value = str_replace("\\'","''",$value);
                  $value = str_replace("\\\"","\"",$value);
                }
               return "'" . $value . "'";
             } 
          }
      }
     // Selected Date Formate
     function DisplayDateFornate($date) // file upload , check formats,check
      {
         //echo CFG_DATE_FORMATE;
         $arr = explode("/",CFG_DATE_FORMATE);
         $date_final="";
         $i=0;
         foreach($arr as $val)
          {     
            if($i == 0)
              $date_final .= date($val,$date);
            else
              $date_final .= " ".CFG_DATE_SEPARATOR." ".date($val,$date);
            $i++;
          }
         return $date_final;
      }
     //Image Upload
     function info_upload_image_only($f,$dest_dir,$newname) // file upload , check formats,check
      {
        $upstat=0;
        $dest = "temp_img/".$f['name'];
        $up_err_msg='';
        $extn='';
        $arr=explode(".",$f['name']);
        $ii=count($arr);
        $ii=$ii-1; 
        $extn=$arr[$ii];
        $newname=$dest_dir . "/" . $newname . "." . $extn;
        if ($extn!='jpg' && $extn!='jpeg' && $extn!='JPG' && $extn!='JPEG' && $extn!='png' && $extn!='PNG' && $extn!='gif' && $extn!='GIF')
         {
           $up_err_msg="Invalid File Format.";
         }
        else
         {  // upload file
          if (!is_uploaded_file ($f['tmp_name']))
           {
             $up_err_msg="Error: No file uploaded";
           }
          else if (!file_exists ($dest_dir))
           {
             $up_err_msg="Error: Destination directory " . $dest_dir . "does not exist!";
             $upstat=1;
           }
          else if (!is_dir ($dest_dir))
           {
             $up_err_msg="Error: Destination directory " . $dest_dir . " is not a directory!";
             $upstat=1;
           }
          else if (file_exists ($dest))
           {
             $up_err_msg="File already exist.Please rename the file and upload it again.";
             $upstat=1;
           }
          // all clear, move the file to its permanent location
          if ($upstat!=1)
           {
             $r = move_uploaded_file ($f['tmp_name'], $dest);
             if ($r == false)
              {
               $up_err_msg="Error: Could not copy file to " . $dest;
               //exit;
              }
             else
              {
               $up_err_msg="";
               chmod ($dest,0755);
               rename($dest,$newname);
              }
           }
         } //end upload file 
        $up_err_msg1[0]["msg"]=$up_err_msg;
        $up_err_msg1[0]["extn"]=$extn;
        return $up_err_msg1;
      }

     // Image Resize
     function Image_Width_Height_Resize($filename,$newwidth,$newheight,$dir) // this function wi  resize ony jpg images 1-eatured,0-norma
      {
        $x=$filename;
        $filename12=$dir."/".$filename;
        $extnarr=explode(".",$x);
        // Get new dimensions
        list($width, $height) = getimagesize($filename12);
        $width = round($width);
        $height = round($height);
        if($height > $newheight)
         {
           $new_width = Ceil(($newheight * $width)/$height);
           $new_height = $newheight;
         }
        else
         {
           $new_width = $width;
           $new_height = $height;
         }
        if($new_width > $newwidth)
         {
           $new_height = Ceil(($newwidth * $new_height)/$new_width);
           $new_width = $newwidth;
         }
        // end dimension
        $extn=$extnarr[1];
        // Content type
        if($extn=='jpg' || $extn=='jpeg' || $extn=='JPG' || $extn=='JPEG')
          header('Content-type: image/jpeg');
        else if ($extn=='gif' || $extn=='GIF')  
          header('Content-type: image/gif');
        else if ($extn=='png' || $extn=='PNG')  
          header('Content-type: image/png');
        //end content type
        // Resample
        $image_p = imagecreatetruecolor($new_width, $new_height);
        if($extn=='jpg' || $extn=='jpeg' || $extn=='JPG' || $extn=='JPEG')
         {
           $image = ImageCreateFromJPEG($filename12);
           imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
           // Output
           imagejpeg($image_p,$filename12, 100);
         }
        else if ($extn=='gif' || $extn=='GIF')
         {
           $image = imagecreatefromgif($filename12);
           imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
           // Output
           imagejpeg($image_p,$filename12, 100);
         }
       else if ($extn=='png' || $extn=='PNG')
         {
           $image = ImageCreateFromPNG($filename12);
           imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
           // Output
           imagejpeg($image_p,$filename12, 100);
         }
        return $filename12;
      }

     //  Replase Comma
     function FuncReplaceComma($text)
      {
        $text = str_replace("'","\'",$text);
        return $text;
      }
     // Page Redirect to another page or site
     function page_redirect($page = '', $parameters = '')
      {         
        global $request_type, $session_started, $SID;
        $link='';
        if (page_not_null($parameters))
         {
           $link = '<input type="hidden" name="page_action" value="'.$parameters.'">';
         }
        else
         {
           $link = '';
         }
        $text = '
        <html>
        <body onload="document.frm_page_action.submit();">
          <form name="frm_page_action" id="frm_page_action" action="'.$page.'" method="post">
          '.$link.'
          </form>
        </body>
        </html>';
        echo $text;
        page_exit();
      }
     function page_not_null($value)
      {
        if(is_array($value))
         {
           if (sizeof($value) > 0)
            {
              return true;
            }
           else
            {
              return false;
            }
         }
        else
         {
           if (($value != '') && (strtolower($value) != 'null') && (strlen(trim($value)) > 0))
            {
              return true;
            }
           else
            {
              return false;
            }
         }
      }


// Your code here
     function tep_draw_form($name, $action, $method = 'post', $parameters = '')
      {
        $form = '<form name="' . $name . '" action="' . $action . '" method="' . $method . '"';
        if (tep_not_null($parameters))
          $form .= ' ' . $parameters;
        $form .= '>';
        return $form;
      }
     function tep_href_link($page = '', $parameters = '')
      {
        global $request_type, $session_started, $SID;
        $link='';
        if (tep_not_null($parameters))
         {
           $link .= $page . '?' . $parameters;
           $separator = '&';
         }
        else
         {
           $link .= $page;
           $separator = '?';
         }
        return $link;
     }
    function tep_not_null($value)
     {
       if (is_array($value))
        {
          if (sizeof($value) > 0)
           {
             return true;
           }
          else
           {
             return false;
           }
        }
       else
        {
          if (($value != '') && (strtolower($value) != 'null') && (strlen(trim($value)) > 0))
           {
             return true;
           }
          else
           {
             return false;
           }
        }
     }
    function tep_exit()
     {
       exit();
     }
// Redirect to another page or site
    function tep_redirect($url)
     {
       header('Location: ' . $url);
       tep_exit();
     }
?>