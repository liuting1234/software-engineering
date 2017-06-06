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

public class CxReply extends HttpServlet {

	public void doGet(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		String id = request.getParameter("id");
		String uid = request.getParameter("uid");
		String sql = "delete from useroom where id = ? ";
		String sql1 = "update user set max = ? where id = ?";
		String sql2 = "select * from user where id = ?";
		QueryRunner queryRunner = new QueryRunner(JDBCUtils.getDataSource());
		try {
			User user = queryRunner.query(sql2, new BeanHandler<User>(
					User.class), uid);
			String newMax = (Integer.parseInt(user.getMax()) - 1) + "";
			User u = (User) request.getSession().getAttribute("user");
			u.setMax(newMax);
			Object[] param = { newMax, uid };
			queryRunner.update(sql1, param);
			queryRunner.update(sql, id);
		} catch (SQLException e) {
			e.printStackTrace();
		}
		request.getRequestDispatcher("/common/FindUseRoom?sp=1").forward(
				request, response);
	}

	public void doPost(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		doGet(request, response);
	}

}
