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
			// 判断user是否为空
			if (user == null) {
				// 激活码无效
				System.out.println("激活码无效");
				response.getWriter().println("激活码无效！请重新注册！");
			} else {
				String updateSql = "update user set state = '1' where id = ?";
				queryRunner.update(updateSql, user.getId());
				response.getWriter().println("账户激活成功！");
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
