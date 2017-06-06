package servlet;

import java.io.IOException;
import java.lang.reflect.InvocationTargetException;
import java.sql.SQLException;
import java.util.List;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.commons.beanutils.BeanUtils;
import org.apache.commons.dbutils.QueryRunner;
import org.apache.commons.dbutils.handlers.BeanHandler;
import org.apache.commons.dbutils.handlers.BeanListHandler;

import utils.CompareTime;
import utils.JDBCUtils;
import dao.CheckClassRoom;
import domain.Room;
import domain.User;
import domain.useroom;

public class Useroom extends HttpServlet {

	public void doGet(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		request.setCharacterEncoding("utf-8");
		User u = (User) request.getSession().getAttribute("user");
		String num = request.getParameter("num");
		QueryRunner queryRunner = new QueryRunner(JDBCUtils.getDataSource());
		Room room = null;
		String sql = "select * from useroom where num = ?";
		String sql2 = "select * from room where num = ?";
		String sql1 = "insert into useroom values (?,?,?,?,?,?,?)";
		String sql3 = "select * from user where id = ?";
		String sql4 = "update user set max = ? where id = ?";
		try {
			room = queryRunner.query(sql2, new BeanHandler<Room>(Room.class),
					num);
		} catch (SQLException e1) {
			e1.printStackTrace();
		}

		if (room == null) {
			request.setAttribute("msg", "该教室不存在！");
			request.getRequestDispatcher("/user/common/useroom.jsp").forward(
					request, response);
		} else if (room.getRoom_state().equals("1")) {
			useroom useroom = new useroom();
			try {
				BeanUtils.populate(useroom, request.getParameterMap());
			} catch (IllegalAccessException e) {
				e.printStackTrace();
			} catch (InvocationTargetException e) {
				e.printStackTrace();
			}
			if (CompareTime.compare(useroom.getStarttime(),
					useroom.getEndtime())) {
				Object[] params1 = { null, num, u.getUsername(),
						useroom.getStarttime(), useroom.getEndtime(),
						useroom.getReason(), "0" };
				List<useroom> userooms = null;
				CheckClassRoom checkClassRoom = new CheckClassRoom();
				try {
					User user = queryRunner.query(sql3, new BeanHandler<User>(
							User.class), u.getId());
					if (Integer.parseInt(user.getMax()) <= 3) {
						userooms = queryRunner.query(sql,
								new BeanListHandler<useroom>(useroom.class),
								num);
						boolean k = checkClassRoom.check(userooms,
								useroom.getStarttime(), useroom.getEndtime());
						if (userooms == null || k) {
							String newMax = (Integer.parseInt(user.getMax()) + 1)
									+ "";
							Object[] param = { newMax, u.getId() };
							queryRunner.update(sql4, param);
							u.setMax(newMax);
							queryRunner.update(sql1, params1);
							request.setAttribute("msg", "申请成功，待管理员审核！");
							request.getRequestDispatcher("/index.jsp").forward(
									request, response);
						} else {
							request.setAttribute("msg", "该教室此时间段已经被借用！");
							request.getRequestDispatcher(
									"/user/common/useroom.jsp").forward(
									request, response);
						}
					} else {
						request.setAttribute("msg", "已经达到最大次数（4次）！");
						request.getRequestDispatcher("/user/common/useroom.jsp")
								.forward(request, response);
					}
				} catch (SQLException e) {
					e.printStackTrace();
				}
			} else {
				request.setAttribute("msg", "输入数据错误！");
				request.getRequestDispatcher("/user/common/useroom.jsp")
						.forward(request, response);
			}
		} else {
			request.setAttribute("msg", "该教室已被暂停使用！");
			request.getRequestDispatcher("/user/common/useroom.jsp").forward(
					request, response);
		}
	}

	public void doPost(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		doGet(request, response);
	}

}
