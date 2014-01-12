var bolTimer1 = false;
var bolTimer2 = false;
var bolTimer3 = false;
function sinpletokei(){
	document.writeln("<table border=0 cellspacing=0><tr>");
	document.write(defWatchTD("AM","red","idXM"));
	document.write(defWatchTD("00","#000000","idHH"));
	document.write(defWatchTD(":","000000"));
	document.write(defWatchTD("00","#000000","idNN"));
	document.write(defWatchTD(":","000000"));
	document.write(defWatchTD("00","#000000","idSS"));
	document.write("</tr></table>");
	setTime();
}
function defWatchTD(str, iro, divid){
	return "<td align='center'><b><font size=5.0em color='" + iro + "'><div id='" + divid + "'>" + str + "</div></font></b></td>";
}
function setTime(){
	var now = new Date();
	var hh = now.getHours();
	var nn = now.getMinutes();
	var ss = now.getSeconds();
	if(hh>=12){
	document.getElementById("idXM").innerHTML="PM";
	hh-=12;
	}else{
	document.getElementById("idXM").innerHTML="AM";
	}
	if(hh<10) hh="0"+hh;
	if(nn<10) nn="0"+nn;
	if(ss<10) ss="0"+ss;
	document.getElementById("idHH").innerHTML=hh;
	document.getElementById("idNN").innerHTML=nn;
	document.getElementById("idSS").innerHTML=ss;
	setTimeout("setTime()",1000);
}

function date(){
	myTbl = new Array("日","月","火","水","木","金","土");
	myD = new Date();
	 
	myYear = myD.getFullYear();
	myMonth = myD.getMonth() + 1;
	myDate = myD.getDate();
	myDay = myD.getDay();
	 
	myMess1 = myYear + "年" + myMonth + "月" + myDate + "日";
	myMess2 = myTbl[myDay] + "曜日";
	myMess = myMess1 + " " + myMess2 + " ";
	document.write( myMess );
}