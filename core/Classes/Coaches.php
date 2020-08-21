<?php
	/**
	* Class Coaches
	*
	* @author John Ellison
	*/
	class Coaches
	{
		public function advanceCoachAge()
		{
			$database = SQLDatabase::connect();

			$result = $database->query("
				UPDATE `" . SQLDatabase::TABLE_PREFIX . "coaches` SET `age` = `age` + 1;
			");

			echo("Coaches have all aged one year<br>");
		}

		public function simulateCoaches()
		{
			echo "Coaches - Coach data has been simulated<br>";
		}
	}
