package src.server;

import src.server.coach.CoachManager;
import src.server.etc.Utilities;
import src.server.recruit.RecruitManager;
import src.server.schedule.ScheduleManager;
import src.server.team.TeamManager;

public class Server {
	
	public static void main(String[] args) {
		int currentWeek = Utilities.getCurrentWeek();
		int currentYear = Utilities.getCurrentYear();
		
		System.out.print("It is currently week " + currentWeek + ", " + currentYear + "\n");
		
		if(currentWeek == 0) {
			System.out.print("It is the Preseason");
			
			/*
			 *  We start by deleting the recruits from the previous season, then creating the recruits for the new season
			 */
			RecruitManager.deleteRecruits();
			RecruitManager.createRecruits();
			
			/*
			 * We reset the previous season's team records
			 */
			TeamManager.resetSeasonWinsAndLosesRecord();
			
			/*
			 * We delete the schedule from the previous season, then create the schedule for the new season
			 */
			ScheduleManager.deleteSchedule();
			ScheduleManager.createSchedule();
			
			/*
			 * We need to advance the age of our coaches by one year here
			 */
			CoachManager.advanceCoachAge();
			
			/*
			 * We need to advance the currentWeek here
			 */
			Utilities.advanceCurrentWeek();
			
			
		} else if(currentWeek >= 1 && currentWeek <= 16) {
			
		} else if(currentWeek == 17) {
			System.out.print("It is the Postseason");
			
			/*
			 * We need to reset the week to 0, and then increment the current year by one for the new season
			 */
			Utilities.resetCurrentWeek();
			Utilities.advanceCurrentYear();
			
		} else {
			System.out.print("Error: The int currentWeek is not working as intended.");
		}
	}

}
