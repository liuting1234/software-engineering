package domain;

import java.util.List;

public class PageBean {
	public static final int NUMPERPAGE = 10; // ÿҳ������
	private int pNum; // ��ǰ�ڼ�ҳ
	private int totalPageNum; // ��ҳ��
	private int totalRecordNum; // �ܼ�¼��
	private List<useroom> userooms; // �������

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
