package servlet;

import java.io.IOException;
import java.sql.SQLException;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.commons.dbutils.QueryRunner;

import utils.JDBCUtils;

public class Forbiduse extends HttpServlet {

	public void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		request.setCharacterEncoding("utf-8");
		String num = request.getParameter("num");
		String f = request.getParameter("f");
		String sql = "update room set room_state = '1' where num = ?";
		String sql1 = "update room set room_state = '0' where num = ?";
		QueryRunner queryRunner = new QueryRunner(JDBCUtils.getDataSource());
		try {
			if (f.equals("1")) {
				queryRunner.update(sql, num);
				request.getRequestDispatcher("/admin/froom").forward(request, response);
			} else {
				queryRunner.update(sql1, num);
				request.getRequestDispatcher("/admin/froom").forward(request, response);
			}
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}

	public void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		doGet(request, response);
	}

}
