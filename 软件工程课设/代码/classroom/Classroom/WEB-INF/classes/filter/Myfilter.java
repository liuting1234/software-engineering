package filter;

import java.io.IOException;

import javax.servlet.Filter;
import javax.servlet.FilterChain;
import javax.servlet.FilterConfig;
import javax.servlet.ServletException;
import javax.servlet.ServletRequest;
import javax.servlet.ServletResponse;
import javax.servlet.http.HttpServletRequest;

import domain.User;

public class Myfilter implements Filter {

	@Override
	public void destroy() {
	}

	@Override
	public void doFilter(ServletRequest request, ServletResponse response,
			FilterChain chain) throws IOException, ServletException {
		HttpServletRequest httpServletRequest = (HttpServletRequest) request;
		String path = httpServletRequest.getRequestURI().substring(
				httpServletRequest.getContextPath().length());
		if (!(path.startsWith("/user/"))) {
			chain.doFilter(httpServletRequest, response);
			return;
		} else {
			// 需要 用户身份 或者 管理员 --- 需要登陆 ----- 判断是否登陆
			User user = (User) httpServletRequest.getSession().getAttribute(
					"user");
			if (user == null) {
				// 未登陆--- 没有权限 --- 跳转到登陆页面
				request.setAttribute("msg", "您还没有登陆！");
				request.getRequestDispatcher("/public/login.jsp").forward(
						httpServletRequest, response);
				return;
			} else {
				// 已经登陆 --- 管理员有身份

				if (path.startsWith("/user/admin/")) { // user 身份
					// 需要 用户身份
					if (user.getRole().equals("admin")) {
						// 权限满足
						chain.doFilter(httpServletRequest, response);
						return;
					} else {
						request.setAttribute("msg", "请以管理员身份登录！");
						request.getRequestDispatcher("/public/login.jsp")
								.forward(httpServletRequest, response);
						return;
					}
				}
				
				if (path.startsWith("/user/common/")) { // user 身份
					// 需要 用户身份
					if (user.getRole().equals("common")) {
						// 权限满足
						chain.doFilter(httpServletRequest, response);
						return;
					} else {
						request.setAttribute("msg", "请以普通用户身份登录！");
						request.getRequestDispatcher("/public/login.jsp")
								.forward(httpServletRequest, response);
						return;
					}
				}
			}
		}
		chain.doFilter(httpServletRequest, response);
	}

	@Override
	public void init(FilterConfig arg0) throws ServletException {

	}

}
