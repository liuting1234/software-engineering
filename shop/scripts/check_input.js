/**
 * Created by baconLIN on 2016/12/21.
 */
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
    if(usr_pass.value.length<6||usr_pass.value.length>18)
    {
        alert("密码长度必须在6-18位！");
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
