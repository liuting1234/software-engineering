package dao;

import java.util.List;

import utils.CompareTime;
import domain.useroom;

public class CheckClassRoom {

	public boolean check(List<useroom> userooms, String starttime,
			String endtime) {
		if (userooms == null) {
			return true;
		} else {
			for (useroom useroom : userooms) {
				if (CompareTime.compare(useroom.getStarttime(), endtime)
						&& CompareTime.compare(endtime, useroom.getEndtime())) {
					return false;
				}
				if (CompareTime.compare(starttime, useroom.getStarttime())
						&& CompareTime.compare(useroom.getEndtime(), endtime)) {
					return false;
				}
				if (CompareTime.compare(starttime, useroom.getEndtime())
						&& CompareTime.compare(useroom.getStarttime(),
								starttime)) {
					return false;
				}
			}
			return true;
		}
	}
}
