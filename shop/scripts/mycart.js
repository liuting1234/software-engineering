//在显示商品的php文件里找到“加入购物车按钮”的<input type="button" value="加入购物车">添加一个onclick属性<onclick=SetCookie("cake".$row[id].",1)>并且在开头加入<script language="javascript" src="mycat.js"></script>
//此处的id是orderid





//show_cart.php是那个写有订单信息的php，即实现订单显示界面的php，改成现在对应的那个文件名

function SetCookie(name,value)
{var expdate=new Date();
expdate.setTime(expdate.getTime()+30*60*1000);
document.cookie=name+"="+value+";expires="+expdate.toGMTString()+";path=/";
alert("Add "+name+" successfully!");
var cart=window.open("../test/cart.php","cart","toolbar=no,menubar=no,location=no,status=no,width=420,height=280");
}
function DeleteCookie(name)
{
	var exp=new Date();
	exp.setTime(exp.getTime()-1);
	var cval=GetCookie(name);
	document.cookie-name+"="+cval+";expires="+exp.toGMTString();
}
function Clearcookie()
{
	var temp=document.cookie.split(";");
	var loop3;
	var ts;
	for(loop3=0;loop3<temp.length;loop3++)
	{
		ts=temp[loop3].split("=")[0];
		if(ts.indexOf('cart')!=-1)
			DeleteCookie(ts);
		//此处的mycart为表单，是在show_cart.php里定义的<input type="hidden" name="mycart" value="post">
	}
}
function getCookieVal(offset)
{
	var endstr=document.cookie.indexOf(";",offset);
	if(endstr==-1)
		endstr=document.cookie.length;
	return unescape(document.cookie.substring(offset,endstr));
}
function GetCookie(name)
{
	var arg=name+"=";
	var alen=arg.length;
	var clen=document.cookie.length;
	var i=0;
	while(i<clen){
		var j=i+alen;
		if(document.cookie.substring(i,j)==arg){
			return getCookieVal(j);
		}ss
		i=document.cookie.indexOf("",i)+1;
		if(i==0) break;
	}
	return null;
}