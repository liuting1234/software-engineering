package servlet;

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

public class Login extends HttpServlet {

	public void doGet(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		request.setCharacterEncoding("utf-8");
		String sql = "select * from user where username = ? and pwd = ?";
		User user = null;
		String username = request.getParameter("username");
		String pwd = request.getParameter("pwd");
		Object[] params = { username, pwd };
		QueryRunner queryRunner = new QueryRunner(JDBCUtils.getDataSource());
		try {
			user = queryRunner.query(sql, new BeanHandler<User>(User.class),
					params);
			if (user == null) {
				request.setAttribute("msg", "用户名或者密码输入错误！");
				request.getRequestDispatcher("/public/login.jsp").forward(
						request, response);
			} else if (user.getState().equals("0")) {
				request.setAttribute("msg", "账户未激活!");
				request.getRequestDispatcher("/public/login.jsp").forward(
						request, response);
			} else {
				request.getSession().setAttribute("user", user);
				if (user.getRole().endsWith("common")) {
					request.getRequestDispatcher("/user/common/common.jsp")
							.forward(request, response);
				} else {
					request.getRequestDispatcher("/user/admin/admin.jsp")
							.forward(request, response);
				}
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
