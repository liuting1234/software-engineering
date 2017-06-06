/**
 * 
 */
<script language="javascript">
	function check_reg_input(form)
	{
		if(form.user_name.value=="")
		{
			alert("请输入名称！")；
			form.user_name.select();
			return (false);
		}
		if(form.user_pass.value=="")
		{
			alert("请输入密码！")；
			form.user_pass.select();
			return (false);
		}
		if(form.user_tele.value=="")
		{
			alert("请输入手机号码！")；
			form.user_tele.select();
			return (false);
		}
		$pass_length=form.user_pass.value.legnth
		if($pass_length<5||$pass_length>18)
		{
			alert("密码长度必须在4-18间！")；
			form.user_pass.select();
			return (false);
		}
		if(form.user_tele.value.length!=11)
		{
			alert("手机号码不对！");
			form.user_tele.select();
			return (false);
		}
		if(form.user_pass.value!=form.user_pass2.value)
		{
			alert("密码与重复密码不同！");
			form.user_pass.select();
			return (false);
		}
	}
	function check_log_input(form)
	{
		if(form.user_name.value=="")
		{
			alert("请输入名称！")；
			form.user_name.select();
			return (false);
		}
		if(form.user_pass.value=="")
		{
			alert("请输入密码！")；
			form.user_pass.select();
			return (false);
		}
	}
</script>