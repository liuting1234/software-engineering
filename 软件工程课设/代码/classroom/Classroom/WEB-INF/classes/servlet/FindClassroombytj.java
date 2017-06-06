package servlet;

import java.io.IOException;
import java.sql.SQLException;
import java.util.Iterator;
import java.util.List;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.commons.dbutils.QueryRunner;
import org.apache.commons.dbutils.handlers.BeanHandler;
import org.apache.commons.dbutils.handlers.BeanListHandler;

import domain.Room;
import domain.useroom;
import utils.CompareTime;
import utils.JDBCUtils;

public class FindClassroombytj extends HttpServlet {

	public void doGet(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		request.setCharacterEncoding("utf-8");
		String num = request.getParameter("num");
		String starttime = request.getParameter("starttime");
		String endtime = request.getParameter("endtime");
		String sql = "select * from useroom where num = ?";
		QueryRunner queryRunner = new QueryRunner(JDBCUtils.getDataSource());
		String sql2 = "select * from room where num = ?";
		Room room = null;
		try {
			room = queryRunner.query(sql2, new BeanHandler<Room>(Room.class),
					num);
		} catch (SQLException e1) {
			e1.printStackTrace();
		}
		if (num.isEmpty() || starttime.isEmpty() || endtime.isEmpty()) {
			if (endtime.isEmpty()) {
				request.setAttribute("msg", "结束时间不能为空！");
			}
			if (starttime.isEmpty()) {
				request.setAttribute("msg", "起始时间不能为空！");
			}
			if (num.isEmpty()) {
				request.setAttribute("msg", "教室编号不能为空！");
			}
			request.getRequestDispatcher("/public/FindClassroombytj.jsp")
					.forward(request, response);
		} else if (room == null) {
			request.setAttribute("msg", "该教室不存在!");
			request.getRequestDispatcher("/public/FindClassroombytj.jsp")
					.forward(request, response);
		} else if (CompareTime.compare(starttime, endtime)) {
			try {
				List<useroom> userooms = queryRunner.query(sql,
						new BeanListHandler<useroom>(useroom.class), num);
				Iterator iterator = userooms.iterator();
				while (iterator.hasNext()) {
					useroom useroom = (domain.useroom) iterator.next();
					if (CompareTime.compare(useroom.getStarttime(), endtime)
							&& CompareTime.compare(endtime,
									useroom.getEndtime())) {
						continue;
					}
					if (CompareTime.compare(starttime, useroom.getStarttime())
							&& CompareTime.compare(useroom.getEndtime(),
									endtime)) {
						continue;
					}
					if (CompareTime.compare(starttime, useroom.getEndtime())
							&& CompareTime.compare(useroom.getStarttime(),
									starttime)) {
						continue;
					}
					iterator.remove();
				}
				request.setAttribute("userooms", userooms);
				request.getRequestDispatcher("/public/listresult.jsp").forward(
						request, response);
			} catch (SQLException e) {
				e.printStackTrace();
			}
		} else {
			request.setAttribute("msg", "起始日期必须小于截止日期!");
			request.getRequestDispatcher("/public/FindClassroombytj.jsp")
					.forward(request, response);
		}
	}

	public void doPost(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		doGet(request, response);
	}

}
