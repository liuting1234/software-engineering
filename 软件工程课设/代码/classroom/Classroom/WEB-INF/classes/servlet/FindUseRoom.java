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

import utils.JDBCUtils;
import domain.User;
import domain.useroom;

public class FindUseRoom extends HttpServlet {

	public void doGet(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		String sp = request.getParameter("sp");
		User user = (User) request.getSession().getAttribute("user");
		String sql = "select * from useroom where username = ? and state = 0";
		String sql1 = "select * from useroom where username = ? and state = 1";
		List<useroom> userooms = null;
		QueryRunner queryRunner = new QueryRunner(JDBCUtils.getDataSource());
		try {
			if (sp.startsWith("1")) {
				userooms = queryRunner.query(sql, new BeanListHandler<useroom>(
						useroom.class), user.getUsername());
				request.setAttribute("userooms", userooms);
				if (userooms.isEmpty()) {
					request.setAttribute("msg", "没有使用教室的相关信息");
				}
				request.getRequestDispatcher("/user/common/listSpRoom.jsp").forward(
						request, response);
			} else {
				userooms = queryRunner.query(sql1,
						new BeanListHandler<useroom>(useroom.class),
						user.getUsername());
				request.setAttribute("userooms", userooms);
				if (userooms.isEmpty()) {
					request.setAttribute("msg", "没有正在审批的教室信息");
				}
				request.getRequestDispatcher("/user/common/listUseRoom.jsp").forward(
						request, response);
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
