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
			// ��Ҫ �û���� ���� ����Ա --- ��Ҫ��½ ----- �ж��Ƿ��½
			User user = (User) httpServletRequest.getSession().getAttribute(
					"user");
			if (user == null) {
				// δ��½--- û��Ȩ�� --- ��ת����½ҳ��
				request.setAttribute("msg", "����û�е�½��");
				request.getRequestDispatcher("/public/login.jsp").forward(
						httpServletRequest, response);
				return;
			} else {
				// �Ѿ���½ --- ����Ա�����

				if (path.startsWith("/user/admin/")) { // user ���
					// ��Ҫ �û����
					if (user.getRole().equals("admin")) {
						// Ȩ������
						chain.doFilter(httpServletRequest, response);
						return;
					} else {
						request.setAttribute("msg", "���Թ���Ա��ݵ�¼��");
						request.getRequestDispatcher("/public/login.jsp")
								.forward(httpServletRequest, response);
						return;
					}
				}
				
				if (path.startsWith("/user/common/")) { // user ���
					// ��Ҫ �û����
					if (user.getRole().equals("common")) {
						// Ȩ������
						chain.doFilter(httpServletRequest, response);
						return;
					} else {
						request.setAttribute("msg", "������ͨ�û���ݵ�¼��");
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
