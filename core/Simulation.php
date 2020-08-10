<?php

	require_once(__DIR__ . "/Classes/SQLDatabase.php");
	require_once(__DIR__ . "/Classes/Utilities.php");
	require_once(__DIR__ . "/Classes/Games.php");
	require_once(__DIR__ . "/Classes/Coaches.php");
	require_once(__DIR__ . "/Classes/Players.php");
	require_once(__DIR__ . "/Classes/Recruiting.php");

	/*
	* We set a start time to evaluate how long the simulation process takes
	*/
	$startTime = microtime(true);

	/*
	* This grabs the currentWeek from the database, which we use to determine what actions come next
	*/
	$currentWeek = Utilities::getCurrentWeek();

	echo "It is currently Week " . $currentWeek . "<br>";

	if($currentWeek == 0) {
		echo "It is the Preseason<br>";

		/*
		* Now we need to advance to the next week
		*/
		Utilities::advanceCurrentWeek($currentWeek);

	} else if($currentWeek >= 1 && $currentWeek <= 16) {
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

	} else if ($currentWeek == 17){
		echo "It is the Postseason<br>";

		/*
		* We reset the currentWeek to 0, as we're about to start a new season
		*/
		Utilities::resetCurrentWeek();

	} else {
		echo "Uh oh, something is broken";
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