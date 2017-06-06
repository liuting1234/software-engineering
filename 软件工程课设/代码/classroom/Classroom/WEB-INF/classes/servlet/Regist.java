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
		Properties properties = new Properties();// ��������������Ӳ���
		// ����properties ����
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
			message.setSubject("����ԤԼϵͳ�����ʼ�");
			// �ʼ���������
			message.setContent(
					"<h1>��ӭע�ᱱ���Ƽ���ѧ���ҹ���ϵͳ�������û�����"
							+ user.getUsername()
							+ "�������ǣ�"
							+ user.getPwd()
							+ ". �����Ʊ��ܣ�</h1><h2>�����������Ӽ��������˻���</h2><h2><a href='http://www.jinjie123.cn/Classroom/public/active?code="
							+ code
							+ "'>http://www.jinjie123.cn/Classroom/public/active?code="
							+ code + "</a></h2>", "text/html;charset=utf-8");

			// ������ ʹ��Transport�����ʼ�
			Transport transport = session.getTransport();
			// ���ʼ�ǰ�������У��
			transport.connect("18310687286@163.com", "jj100867");
			transport.sendMessage(message, message.getAllRecipients());
		} catch (Exception e) {
			e.printStackTrace();
			throw new RuntimeException("�����ʼ�����ʧ�ܣ�");
		}
		request.setAttribute("msg", "��ע�ᣬ��ǰ�����伤���˻���");
		request.getRequestDispatcher("/index.jsp").forward(request, response);
	}

	public void doPost(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		doGet(request, response);
	}

}
