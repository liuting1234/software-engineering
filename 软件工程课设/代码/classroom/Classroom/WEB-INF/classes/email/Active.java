package email;

import java.io.IOException;
import java.sql.SQLException;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.commons.dbutils.QueryRunner;
import org.apache.commons.dbutils.handlers.BeanHandler;

import domain.User;
import utils.JDBCUtils;

public class Active extends HttpServlet {

	public void doGet(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		request.setCharacterEncoding("utf-8");
		String code = request.getParameter("code");
		String sql = "select * from user where activecode = ?";
		QueryRunner queryRunner = new QueryRunner(JDBCUtils.getDataSource());
		response.setContentType("text/html;charset=utf-8");
		try {
			User user = queryRunner.query(sql,
					new BeanHandler<User>(User.class), code);
			// �ж�user�Ƿ�Ϊ��
			if (user == null) {
				// ��������Ч
				System.out.println("��������Ч");
				response.getWriter().println("��������Ч��������ע�ᣡ");
			} else {
				String updateSql = "update user set state = '1' where id = ?";
				queryRunner.update(updateSql, user.getId());
				response.getWriter().println("�˻�����ɹ���");
			}
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}

	public void doPost(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		doGet(request, response);
	}

}
