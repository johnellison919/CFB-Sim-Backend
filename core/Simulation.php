<?php
	require_once(__DIR__ . "/Classes/SQLDatabase.php");
	require_once(__DIR__ . "/Classes/Utilities.php");
	require_once(__DIR__ . "/Classes/Games.php");
	require_once(__DIR__ . "/Classes/Coaches.php");
	require_once(__DIR__ . "/Classes/Players.php");
	require_once(__DIR__ . "/Classes/Recruiting.php");
	require_once(__DIR__ . "/Classes/Schedule.php");

	/*
	* We set a start time to evaluate how long the simulation process takes
	*/
	$startTime = microtime(true);

	/*
	* We get the current week and year from the database, which we use to determine what actions come next
	*/
	$currentWeek = Utilities::getCurrentWeek();
	$currentYear = Utilities::getCurrentYear();

	echo "It is currently Week " . $currentWeek . ", " . $currentYear . "<br>";

	if($currentWeek == 0)
	{
		echo "It is the Preseason<br>";
		/*
		* We start by deleting the recruits from the previous season, then creating the recruits for the new season
		*/
		Recruiting::deleteRecruits();
		Recruiting::createRecruits();

		/*
		* Here, we'll reset the previous season's team wins/loses
		*/
		Games::resetSeasonWinsAndLoses();

		/*
		* Now, we delete the schedule from the previous season, then creating the schedule for the new season
		*/
		Schedule::deleteSchedule();
		Schedule::createSchedule();

		/*
		* Now we need to advance to the next week
		*/
		Utilities::advanceCurrentWeek($currentWeek);

	}
	else if($currentWeek >= 1 && $currentWeek <= 16)
	{
		/*
		* Games are simulated first, because the other processes of the simulation are dependendant on them
		*/
		Games::simulateCurrentWeekGames();

		/*
		* Coaches are simulated next
		*/
		Coaches::simulateCoaches();

		/*
		* Players are simulated now
		*/
		Players::simulatePlayers();

		/*
		* We'll simulate the recruits next
		*/
		Recruiting::simulateRecruiting();

		/*
		* Now we need to advance to the next week
		*/
		Utilities::advanceCurrentWeek($currentWeek);

	}
	else if ($currentWeek == 17)
	{
		echo "It is the Postseason<br>";

		/*
		* We reset the current week to 0, and the current year by 1, as we're about to start a new season
		*/
		Utilities::resetCurrentWeek();
		Utilities::advanceCurrentYear($currentYear);

	}
	else
	{
		echo "Uh oh, something is broken.";
	}

	/*
	* Here, we set an end time to evaluate how long the simulation process takes
	*/
	$endTime = microtime(true);

	/*
	* Lastly, compare the start and end times to calculate how long our simulation took
	*/
	$executionTime = ($endTime - $startTime);
	echo "The execution time of simulation took: " . $executionTime . " sec";
