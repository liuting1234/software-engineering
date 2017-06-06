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

public class Chuli extends HttpServlet {

	public void doGet(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		String result = request.getParameter("result");
		String id = request.getParameter("id");
		String username = request.getParameter("username");
		String sql = "update useroom set state = '1' where id = ?";
		String sql2 = "delete from useroom where id = ? ";
		String sql3 = "select * from user where username = ?";
		String sql4 = "update user set max = ? where username = ?";
		QueryRunner queryRunner = new QueryRunner(JDBCUtils.getDataSource());
		try {
			if (result.equals("ty")) {
				queryRunner.update(sql, id);
			} else {
				queryRunner.update(sql2, id);
			}
			User u = queryRunner.query(sql3, new BeanHandler<User>(User.class),
					username);
			String newMax = (Integer.parseInt(u.getMax()) - 1) + "";
			Object[] param = { newMax, username };
			queryRunner.update(sql4, param);
		} catch (SQLException e) {
			e.printStackTrace();
		}
		request.getRequestDispatcher("/admin/findapply").forward(request,
				response);
	}

	public void doPost(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		doGet(request, response);
	}

}
