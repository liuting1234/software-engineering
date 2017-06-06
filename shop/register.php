
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<link href="styles/register_style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		
        <!--header-->
	<link rel="stylesheet" href="styles/header_style.css"> <!-- Gem style -->
    
    <!--end-->
    <script language="javascript">
    function check_reg_input()
    {
        if(document.getElementsByName("user_name").value=="")
        {
            alert("请输入名称！");
            document.getElementsByName("user_name").select();
            return false;
        }
        var usr_pass = document.getElementsByName("user_pass");
        if(usr_pass.value=="")
        {
            alert("请输入密码！");
            document.getElementsByName("user_pass").select();
            return false;
        }
        if(usr_pass.value.length<4||usr_pass.value.length>18)
        {
            alert("密码长度必须在4-18位！");
            usr_pass.select();
            return false;
        }
        if(document.getElementsByName("user_pass").value!=document.getElementsByName("user_pass2"))
        {
            alert("密码与重复密码不同！");
            usr_pass.select();
            return false;
        }
        var usr_tele = document.getElementsByName("user_tele");
        if(usr_tele.value=="")
        {
            alert(("请输入手机号码！"));
            usr_tele.select();
            return false;
        }
        if(usr_tele.value.length!=11) {
            alert("手机号码不对！");
            usr_tele.select();
            return false;
        }
    }
    	
    </script>
</head>
 
<body>
<header>
<nav id="main-nav">
		<ul>
     
        <li><a href="Pro/cakelist.php?cate=Fondant" target="_parent">Back to the shop</a></li>
	
			
		</ul>
	</nav>
    
    <!--end-->
</header>
 <!--header-->





	<div  class="main">
				 <!-----start-main---->
				 <form action="registerAction.php" method="post">
		                    <div class="lable-2">
                            <input type="text" class="text" name="user_name" value="User Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" id="active">
		                     <input type="text" class="text" name="user_tele" value="Tel" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
		                     <input type="password" class="text" name="user_pass" value="Password " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
                             <input type="password" class="text" name="user_pass2"  value="Re_passw " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
							</div>
							<div class="clear"> </div>
							 <h3> &nbsp; Already have account,  <span><a href="login.php">Login now.</a> </span></h3>
								 <div class="submit">
									<input type="submit" onclick="check_reg_input()" value="Create account" >
								</div>
							<div class="clear"> </div>
				</form>
		<!-----//end-main---->
		</div>
	
	 
</body>
</html>