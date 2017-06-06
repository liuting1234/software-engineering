package email;

import java.io.IOException;
import java.sql.SQLException;
import java.util.Properties;

import javax.mail.Message;
import javax.mail.Session;
import javax.mail.Transport;
import javax.mail.internet.InternetAddress;
import javax.mail.internet.MimeMessage;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.commons.dbutils.QueryRunner;
import org.apache.commons.dbutils.handlers.BeanHandler;

import utils.JDBCUtils;
import domain.User;

public class Forget extends HttpServlet {

	public void doGet(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		request.setCharacterEncoding("utf-8");
		String username = request.getParameter("username");
		String email = request.getParameter("email");
		String sql = "select * from user where username = ? and email = ?";
		Object[] param = { username, email };
		User user = null;
		QueryRunner queryRunner = new QueryRunner(JDBCUtils.getDataSource());
		try {
			user = queryRunner.query(sql, new BeanHandler<User>(User.class), param);
		} catch (SQLException e1) {
			e1.printStackTrace();
		}
		if (user == null) {
			request.setAttribute("msg", "用户名或邮箱输入错误");
			request.getRequestDispatcher("/public/forget.jsp").forward(request,
					response);
		} else {
			Properties properties = new Properties();// 配置与服务器连接参数
			properties.put("mail.transport.protocol", "smtp");
			properties.put("mail.smtp.host", "smtp.163.com");
			properties.put("mail.smtp.auth", "true");// 连接认证
			properties.put("mail.debug", "true");// 在控制台显示连接日志信息
			Session session = Session.getInstance(properties);// 与邮件服务器连接会话

			// 步骤二 编写Message
			MimeMessage message = new MimeMessage(session);// 代表一封邮件
			// from字段
			try {
				message.setFrom(new InternetAddress("18310687286@163.com"));
				// to 字段
				message.setRecipients(Message.RecipientType.TO, user.getEmail());
				// subject字段
				message.setSubject("教室管理系统在线密码找回邮件");
				// 邮件正文内容
				message.setContent(
						"<h1>教室管理系统在线密码找回</h1>您的用户名：" + user.getUsername()
								+ "，密码是：" + user.getPwd() + ". 请妥善保管！",
						"text/html;charset=utf-8");

				// 步骤三 使用Transport发送邮件
				Transport transport = session.getTransport();
				// 发邮件前进行身份校验
				transport.connect("18310687286@163.com", "jj100867");
				transport.sendMessage(message, message.getAllRecipients());
			} catch (Exception e) {
				e.printStackTrace();
				throw new RuntimeException("激活邮件发送失败！");
			}
			request.setAttribute("msg", "密码已经发往你的邮箱，请前往查看！");
			request.getRequestDispatcher("/public/forget.jsp").forward(
					request, response);
		}
	}

	public void doPost(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		doGet(request, response);
	}

}
