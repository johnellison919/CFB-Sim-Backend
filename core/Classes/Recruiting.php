<?php
	/**
	* Class Recruiting
	*
	* @author John Ellison
	*/
	class Recruiting {
		public function createRecruits() { //TODO: Instead of set recruit information, it should be randomized
			$connection = SQLDatabase::connect();

			$createRecruitsQuery =
		        "INSERT INTO `" . SQLDatabase::TABLE_PREFIX . "recruits` (firstName, lastName, height, weight)
		        VALUES
		        ('Jake', 'Peralta', 70, 190),
		        ('Terry', 'Jeffords', 74, 260),
		        ('Charles', 'Boyle', 67, 180),
		        ('Raymond', 'Holt', 70, 220)";

		    $connection->query($createRecruitsQuery);

			echo "Created Recruits for the current season<br>";
		}

		public function deleteRecruits() {
			$connection = SQLDatabase::connect();

			$deleteRecruitsQuery =
				"DELETE FROM `" . SQLDatabase::TABLE_PREFIX . "recruits`";

			$connection->query($deleteRecruitsQuery);

			echo "Deleted Recruits for the previous season<br>";
		}

		public function simulateRecruiting() {
			echo "Recruiting - Recruiting has been simulated<br>";
		}
	}
