package servlet;

import java.io.IOException;
import java.sql.SQLException;
import java.util.Properties;
import java.util.UUID;

import javax.mail.Message;
import javax.mail.Session;
import javax.mail.Transport;
import javax.mail.internet.InternetAddress;
import javax.mail.internet.MimeMessage;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.commons.beanutils.BeanUtils;
import org.apache.commons.dbutils.QueryRunner;

import utils.JDBCUtils;
import domain.User;

public class Regist extends HttpServlet {

	public void doGet(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		String code = UUID.randomUUID().toString();
		User user = new User();
		try {
			BeanUtils.populate(user, request.getParameterMap());
		} catch (Exception e) {
			e.printStackTrace();
		}
		String sql = "insert into user values (?,?,?,?,?,?,?,?)";
		Object[] params = { null, user.getUsername(), user.getPwd(), "common",
				user.getEmail(), code, "0", "0" };
		QueryRunner queryRunner = new QueryRunner(JDBCUtils.getDataSource());
		try {
			queryRunner.update(sql, params);
		} catch (SQLException e) {
			e.printStackTrace();
		}
		Properties properties = new Properties();// 配置与服务器连接参数
		// 设置properties 属性
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
			message.setSubject("教室预约系统激活邮件");
			// 邮件正文内容
			message.setContent(
					"<h1>欢迎注册北京科技大学教室管理系统，您的用户名："
							+ user.getUsername()
							+ "，密码是："
							+ user.getPwd()
							+ ". 请妥善保管！</h1><h2>请点击下面链接激活您的账户：</h2><h2><a href='http://www.jinjie123.cn/Classroom/public/active?code="
							+ code
							+ "'>http://www.jinjie123.cn/Classroom/public/active?code="
							+ code + "</a></h2>", "text/html;charset=utf-8");

			// 步骤三 使用Transport发送邮件
			Transport transport = session.getTransport();
			// 发邮件前进行身份校验
			transport.connect("18310687286@163.com", "jj100867");
			transport.sendMessage(message, message.getAllRecipients());
		} catch (Exception e) {
			e.printStackTrace();
			throw new RuntimeException("激活邮件发送失败！");
		}
		request.setAttribute("msg", "已注册，请前往邮箱激活账户！");
		request.getRequestDispatcher("/index.jsp").forward(request, response);
	}

	public void doPost(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		doGet(request, response);
	}

}
