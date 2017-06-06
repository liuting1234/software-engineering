package servlet;

import java.io.IOException;
import java.sql.SQLException;
import java.util.List;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.commons.dbutils.QueryRunner;
import org.apache.commons.dbutils.handlers.BeanListHandler;

import domain.useroom;
import utils.JDBCUtils;

public class Result extends HttpServlet {

	public void doGet(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		String sql = "select * from useroom where state = 1";
		List<useroom> userooms = null;
		QueryRunner queryRunner = new QueryRunner(JDBCUtils.getDataSource());
		try {
			userooms = queryRunner.query(sql, new BeanListHandler<useroom>(
					useroom.class));
		} catch (SQLException e) {
			e.printStackTrace();
		}
		request.setAttribute("userooms", userooms);
		request.getRequestDispatcher("/user/admin/listresult.jsp").forward(request,
				response);
	}

	public void doPost(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		doGet(request, response);
	}

}
