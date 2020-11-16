package src.server;

import src.server.etc.Utilities;

public class Server {
	
	public static void main(String[] args) {
		int currentWeek = Utilities.getCurrentWeek();
		int currentYear = Utilities.getCurrentYear();
		
		System.out.print("It is currently week " + currentWeek + ", " + currentYear + "\n");
		
		if(currentWeek == 0) {
			System.out.print("It is the Preseason");
		} else if(currentWeek >= 1 && currentWeek <= 16) {
			
		} else if(currentWeek == 17) {
			System.out.print("It is the Postseason");
		} else {
			System.out.print("I have made a huge mistake.");
		}
	}

}
