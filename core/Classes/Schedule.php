<?php
	/**
	* Class Schedule
	*
	* @author John Ellison
	*/
	class Schedule {
		public function createSchedule() {
            $connection = SQLDatabase::connect();

            $createScheduleQuery =
                "INSERT INTO `" . SQLDatabase::TABLE_PREFIX . "schedule` (homeTeamID, awayTeamID, gameWeek)
                VALUES
                (1, 2, 1),(3, 4, 1),
                (1, 3, 2),(2, 4, 2),
                (1, 4, 3),(2, 3, 3)";

		    $connection->query($createScheduleQuery);

			echo "Created Schedule for the current season<br>";
		}
        public function deleteSchedule() {
			$connection = SQLDatabase::connect();

			$deleteScheduleQuery =
				"DELETE FROM `" . SQLDatabase::TABLE_PREFIX . "schedule`";

			$connection->query($deleteScheduleQuery);

			echo "Deleted Schedule for the previous season<br>";
		}
	}
