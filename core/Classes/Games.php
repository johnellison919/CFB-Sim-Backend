<?php
	/**
	* Class Games
	*
	* @author John Ellison
	*/
	class Games {
		public function getSchedule() {
			$database = SQLDatabase::connect();

			$result = $database->prepare("
				SELECT `homeTeamID`, `awayTeamID`, `gameWeek`
				FROM `" . SQLDatabase::TABLE_PREFIX . "schedule`
			");

			$result->execute();
			$result->bind_result($homeTeamID, $awayTeamID, $gameWeek);
			$schedule = [];

			while ($result->fetch()){
				$schedule[] = [
					"homeTeamID"=>$homeTeamID,
					"awayTeamID"=>$awayTeamID,
					"gameWeek"=>$gameWeek
				];
			}

			return $schedule;

		}

		public function simulateCurrentWeekGames() {
			$schedule = Games::getSchedule();
			$currentWeek = Utilities::getCurrentWeek();

			for($i = 0; $i < count($schedule); $i++) {
				if($schedule[$i]['gameWeek'] == $currentWeek) {
					echo "Team " . $schedule[$i]['homeTeamID'] ." has beaten Team " . $schedule[$i]['awayTeamID'] . "<br>";
				}
			}
		}
	}
