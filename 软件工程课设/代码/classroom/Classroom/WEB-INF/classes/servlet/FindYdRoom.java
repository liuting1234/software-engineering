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
import org.apache.commons.dbutils.handlers.ScalarHandler;

import domain.PageBean;
import domain.useroom;
import utils.JDBCUtils;

public class FindYdRoom extends HttpServlet {

	public static final int NUMPERPAGE = 10;

	public void doGet(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		List<useroom> userooms = null;
		String p = request.getParameter("pNum");
		int pNum = Integer.parseInt(p);// 如果不是数字报错
		int start = (pNum - 1) * NUMPERPAGE;
		PageBean bean = new PageBean();
		bean.setpNum(pNum);
		String sql = "select * from useroom  where state = 1 order by num limit ?,?";
		String sql1 = "select count(*) from useroom";
		Object[] param = { start, PageBean.NUMPERPAGE };
		QueryRunner queryRunner = new QueryRunner(JDBCUtils.getDataSource());
		try {
			userooms = queryRunner.query(sql, new BeanListHandler<useroom>(
					useroom.class), param);
			bean.setUserooms(userooms);
			long TotleNumResult = (Long) queryRunner.query(sql1,
					new ScalarHandler(1));
			int totalRecordNum = (int) TotleNumResult;
			bean.setTotalRecordNum(totalRecordNum);
			int totalPageNum = (totalRecordNum + PageBean.NUMPERPAGE - 1)
					/ PageBean.NUMPERPAGE;
			bean.setTotalPageNum(totalPageNum);
			request.setAttribute("pageBean", bean); // ${pageBean}
			request.getRequestDispatcher("/public/listYdRoom.jsp").forward(
					request, response);
		} catch (SQLException e) {
			e.printStackTrace();
		}

	}

	public void doPost(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		doGet(request, response);
	}

}
