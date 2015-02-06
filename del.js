var pos,str,para,parastr,tempstr1;
tempstr="";
str = window.location.href;
pos = str.indexOf("?")
parastr = str.substring(pos+1);
document.write("<br>文件路径："+str);
if (pos>0){
 document.write("<br>所有参数："+parastr);
 }
else 
 {
 document.write ("无参数");
 }


if (str.indexOf("&")>0){
 para = parastr.split("&");
 for(i=0;i<para.length;i++)
 {
 tempstr1 = para[i];
 
 pos = tempstr1.indexOf("=");
 document.write ("<br>参数"+i+":"+tempstr1.substring(0,pos));
 document.write ("等于:"+tempstr1.substring(pos+1));
 }
 }