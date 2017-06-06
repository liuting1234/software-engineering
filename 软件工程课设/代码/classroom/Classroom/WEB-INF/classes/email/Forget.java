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
			request.setAttribute("msg", "�û����������������");
			request.getRequestDispatcher("/public/forget.jsp").forward(request,
					response);
		} else {
			Properties properties = new Properties();// ��������������Ӳ���
			properties.put("mail.transport.protocol", "smtp");
			properties.put("mail.smtp.host", "smtp.163.com");
			properties.put("mail.smtp.auth", "true");// ������֤
			properties.put("mail.debug", "true");// �ڿ���̨��ʾ������־��Ϣ
			Session session = Session.getInstance(properties);// ���ʼ����������ӻỰ

			// ����� ��дMessage
			MimeMessage message = new MimeMessage(session);// ����һ���ʼ�
			// from�ֶ�
			try {
				message.setFrom(new InternetAddress("18310687286@163.com"));
				// to �ֶ�
				message.setRecipients(Message.RecipientType.TO, user.getEmail());
				// subject�ֶ�
				message.setSubject("���ҹ���ϵͳ���������һ��ʼ�");
				// �ʼ���������
				message.setContent(
						"<h1>���ҹ���ϵͳ���������һ�</h1>�����û�����" + user.getUsername()
								+ "�������ǣ�" + user.getPwd() + ". �����Ʊ��ܣ�",
						"text/html;charset=utf-8");

				// ������ ʹ��Transport�����ʼ�
				Transport transport = session.getTransport();
				// ���ʼ�ǰ�������У��
				transport.connect("18310687286@163.com", "jj100867");
				transport.sendMessage(message, message.getAllRecipients());
			} catch (Exception e) {
				e.printStackTrace();
				throw new RuntimeException("�����ʼ�����ʧ�ܣ�");
			}
			request.setAttribute("msg", "�����Ѿ�����������䣬��ǰ���鿴��");
			request.getRequestDispatcher("/public/forget.jsp").forward(
					request, response);
		}
	}

	public void doPost(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		doGet(request, response);
	}

}
