 function getbrowsertype()
  {
     var AgntUsr=navigator.userAgent.toLowerCase();
     var AppVer=navigator.appVersion.toLowerCase();
     var DomYes=document.getElementById?1:0;
     var NavYes=AgntUsr.indexOf('mozilla')!=-1&&AgntUsr.indexOf('compatible')==-1?1:0;
     var ExpYes=AgntUsr.indexOf('msie')!=-1?1:0;
     if (NavYes==1)
     return 1;
     if (ExpYes==1)
     return 0;
  }
 function show_menu(hdid,myid,spanid,xval)
  {
     // deduct 32 from the body offsetwidth to adjust the left of division.
     var thisid,thisid1,thisid2;
     thisid=document.getElementById(myid); 
     thisid.style.visibility='visible';      
     thisid.style.display='block';
     thisid.style.position='absolute';
     thisid.style.top= '108px';

     thisid1=document.getElementById(hdid);
     thisid1.style.backgroundImage = 'url(Template/Temp2/images/tab-left2.gif)';
     thisid1.style.backgroundRepeat = 'no-repeat';
     thisid1.style.backgroundPosition = 'left center';

     thisid2=document.getElementById(spanid); 
     thisid2.style.backgroundImage = 'url(Template/Temp2/images/tab-right2.gif)';
     thisid2.style.backgroundRepeat = 'no-repeat';
     thisid2.style.backgroundPosition = 'right center';
     thisid2.style.color= '#FAFABE';
     thisid2.style.cursor='pointer';


     // z=screen.width;
     var z=document.body.offsetWidth;
     //alert(z);
     x=z-998;
     var btype;
     btype=getbrowsertype();
     if (btype==1)
      x=x+2;
     else
      x=x+2;
     x=x/2;
     x=x+xval;
     x=parseInt(x,10);
     thisid.style.left=x+'px';
  }
 function rem_menu(hdid,myid,spanid)
  {
     var thisid;
     thisid=document.getElementById(myid);
     thisid.style.visibility="hidden";

     thisid1=document.getElementById(hdid);
     thisid1.style.backgroundImage = 'url(Template/Temp2/images/blank.gif)';
     thisid1.style.backgroundRepeat = 'no-repeat';
     thisid1.style.backgroundPosition = 'left center';

     
     thisid2=document.getElementById(spanid); 
     thisid2.style.backgroundImage = 'url(Template/Temp2/images/blank.gif)';
     thisid2.style.backgroundRepeat = 'no-repeat';
     thisid2.style.backgroundPosition = 'right top';
     thisid2.style.color= '#000000';
     thisid2.style.cursor='pointer';
  }
 function show_links(hdid,myid,spanid)
  {
     var thisid,thisid1,thisid2;
     thisid=document.getElementById(myid); 
     thisid.style.visibility='visible';

     thisid1=document.getElementById(hdid);
     thisid1.style.backgroundImage = 'url(Template/Temp2/images/tab-left2.gif)';
     thisid1.style.backgroundRepeat = 'no-repeat';
     thisid1.style.backgroundPosition = 'left center';

     thisid2=document.getElementById(spanid); 
     thisid2.style.backgroundImage = 'url(Template/Temp2/images/tab-right2.gif)';
     thisid2.style.backgroundRepeat = 'no-repeat';
     thisid2.style.backgroundPosition = 'right center';
     thisid2.style.color= '#FAFABE';
     thisid2.style.cursor='pointer';
  }
 function settdover(msg)
  {//window.alert(msg);
     var thiselem;
     thiselem=document.getElementById(msg); 
     thiselem.style.color='#4A6B0D';
     thiselem.style.backgroundColor='#FAFABE';
     thiselem.style.cursor='pointer';
  }
 function settdout(msg)
  {
     var thiselem,thiselem1;
     thiselem=document.getElementById(msg);  
     thiselem.style.backgroundColor='#577F0D';
     thiselem.style.color='#FAFABE';
  }
 function redirectto(linksid)
  {
     window.location=linksid;
  }

