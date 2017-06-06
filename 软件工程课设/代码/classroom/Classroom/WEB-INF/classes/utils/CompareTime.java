package utils;

public class CompareTime {
	public static boolean compare(String str1, String str2) {
		int mon1 = Integer.parseInt(str1.split("/")[1]);
		int day1 = Integer.parseInt(str1.split("/")[2].split(" ")[0]);
		int hour1 = Integer.parseInt(str1.split("/")[2].split(" ")[1]
				.split(":")[0]);
		int mon2 = Integer.parseInt(str2.split("/")[1]);
		int day2 = Integer.parseInt(str2.split("/")[2].split(" ")[0]);
		int hour2 = Integer.parseInt(str2.split("/")[2].split(" ")[1]
				.split(":")[0]);
		if (mon1 < mon2) {
			return true;
		}
		if (mon1 > mon2) {
			return false;
		}
		if (mon1 == mon2) {
			if (day1 < day2) {
				return true;
			}
			if (day1 > day2) {
				return false;
			}
			if (day1 == day2) {
				if (hour1 < hour2) {
					return true;
				}
				if (hour1 > hour2) {
					return false;
				}
				if (hour1 == hour2) {
					return true;
				}
			}
			return true;
		}
		return false;
	}
}