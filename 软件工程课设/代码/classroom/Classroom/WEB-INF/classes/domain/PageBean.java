package domain;

import java.util.List;

public class PageBean {
	public static final int NUMPERPAGE = 10; // 每页多少条
	private int pNum; // 当前第几页
	private int totalPageNum; // 总页数
	private int totalRecordNum; // 总记录数
	private List<useroom> userooms; // 结果数据

	public int getpNum() {
		return pNum;
	}

	public void setpNum(int pNum) {
		this.pNum = pNum;
	}

	public int getTotalPageNum() {
		return totalPageNum;
	}

	public void setTotalPageNum(int totalPageNum) {
		this.totalPageNum = totalPageNum;
	}

	public int getTotalRecordNum() {
		return totalRecordNum;
	}

	public void setTotalRecordNum(int totalRecordNum) {
		this.totalRecordNum = totalRecordNum;
	}

	public List<useroom> getUserooms() {
		return userooms;
	}

	public void setUserooms(List<useroom> userooms) {
		this.userooms = userooms;
	}

	public static int getNumperpage() {
		return NUMPERPAGE;
	}

}
