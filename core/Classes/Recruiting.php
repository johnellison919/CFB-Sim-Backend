<?php
	/**
	* Class Recruiting
	*
	* @author John Ellison
	*/
	class Recruiting
	{
		public function createRecruits()
		{
			$connection = SQLDatabase::connect();
			$recruitAmount = 50; //TODO: Set to 3500 when the simulation is ready for the full amount of recruits
			$recruitsArray = array_filter(Recruiting::generateRecruitsArray($recruitAmount));

			$statement = $connection->prepare(
			    "INSERT INTO `" . SQLDatabase::TABLE_PREFIX . "recruits` (firstName, lastName, height, weight, ethnicity, position)
			    VALUES (?,?,?,?,?,?)"
			);

			$connection->query("START TRANSACTION");

			foreach ($recruitsArray as $row)
			{
			    $bind = $statement->bind_param('ssiiss',
			        $row[0],
			        $row[1],
			        $row[2],
			        $row[3],
					$row[4],
					$row[5]
			    );
			    $execute = $statement->execute();
			}

			// Close the prepared statement
			$statement->close();

			$commit = $connection->query("COMMIT");

			echo "Created Recruits for the current season<br>";
		}

		public function deleteRecruits()
		{
			$connection = SQLDatabase::connect();

			$deleteRecruitsQuery =
				"DELETE FROM `" . SQLDatabase::TABLE_PREFIX . "recruits`";

			$connection->query($deleteRecruitsQuery);

			echo "Deleted Recruits for the previous season<br>";
		}

		public function generateRecruitsArray($recruitAmount)
		{
			$recruitsArray = array();
			$i = 0;

			while($i < $recruitAmount)
			{
				$firstName = Recruiting::generateRecruitFirstName();
				$lastName = Recruiting::generateRecruitLastName();
				$position = Recruiting::generateRecruitPosition();
				$height = Recruiting::generateRecruitHeight($position);
				$weight = Recruiting::generateRecruitWeight($position);
				$ethnicity = Recruiting::generateRecruitEthnicity();

				//TODO: Generate the first and last name for the player
				array_push($recruitsArray, array($firstName, $lastName, $height, $weight, $ethnicity, $position));
				$i++;
			}

			return $recruitsArray;
		}

		public function generateRecruitFirstName()
		{
			$database = SQLDatabase::connect();
			$result = $database->query("
				SELECT `firstName` FROM `" . SQLDatabase::TABLE_PREFIX . "utilities` WHERE `firstName` IS NOT NULL AND `firstName` != '' order by RAND() LIMIT 1
			");

			if ($result->num_rows > 0)
			{
				$row = $result->fetch_assoc();
				return (string) $row['firstName'];
			}
		}

		public function generateRecruitLastName()
		{
			$database = SQLDatabase::connect();
			$result = $database->query("
				SELECT `lastName` FROM `" . SQLDatabase::TABLE_PREFIX . "utilities` WHERE `lastName` IS NOT NULL AND `lastName` != '' order by RAND() LIMIT 1
			");

			if ($result->num_rows > 0)
			{
				$row = $result->fetch_assoc();
				return (string) $row['lastName'];
			}
		}

		public function generateRecruitPosition()
		{
			$database = SQLDatabase::connect();
			$result = $database->query("
				SELECT `position` FROM `" . SQLDatabase::TABLE_PREFIX . "utilities` WHERE `position` IS NOT NULL AND `position` != '' order by RAND() LIMIT 1
			");

			if ($result->num_rows > 0)
			{
				$row = $result->fetch_assoc();
				return (string) $row['position'];
			}
		}

		public function generateRecruitHeight($position)
		{
			if ($position == "QB")
			{
				return rand(70,78);
			}
			else if ($position == "HB" || $position == "FB")
			{
				return rand(66,75);
			}
			else if ($position == "WR")
			{
				return rand(68,79);
			}
			else if ($position == "TE" || $position == "LT" || $position == "RT" || $position == "C" || $position == "LG" || $position == "RG")
			{
				return rand(74,80);
			}
			else if ($position == "DE" || $position == "DT")
			{
				return rand(72,80);
			}
			else if ($position == "LOLB" || $position == "MLB" || $position == "ROLB")
			{
				return rand(69,78);
			}
			else if ($position == "CB")
			{
				return rand(67,74);
			}
			else if ($position == "SS" || $position == "FS")
			{
				return rand(69,76);
			}
			else if ($position == "K" || $position == "P")
			{
				return rand(65,78);
			}
			else
			{
				echo("There was an issue with generating the recruits' height");
			}
		}

		public function generateRecruitWeight($position)
		{
			if ($position == "QB")
			{
				return rand(190,260);
			}
			else if ($position == "HB" || $position == "FB")
			{
				return rand(170,240);
			}
			else if ($position == "WR")
			{
				return rand(150,220);
			}
			else if ($position == "TE")
			{
				return rand(230,290);
			}
			else if ($position == "LT" || $position == "RT" || $position == "C" || $position == "LG" || $position == "RG")
			{
				return rand(280,400);
			}
			else if ($position == "DE" || $position == "DT")
			{
				return rand(250,340);
			}
			else if ($position == "LOLB" || $position == "MLB" || $position == "ROLB")
			{
				return rand(210,270);
			}
			else if ($position == "CB")
			{
				return rand(170,200);
			}
			else if ($position == "SS" || $position == "FS")
			{
				return rand(180,220);
			}
			else if ($position == "K" || $position == "P")
			{
				return rand(130,220);
			}
			else
			{
				echo("There was an issue with generating the recruits' weight");
			}
		}

		public function generateRecruitEthnicity()
		{
			$database = SQLDatabase::connect();
			$result = $database->query("
				SELECT `ethnicity` FROM `" . SQLDatabase::TABLE_PREFIX . "utilities` WHERE `ethnicity` IS NOT NULL AND `ethnicity` != '' order by RAND() LIMIT 1
			");

			if ($result->num_rows > 0)
			{
				$row = $result->fetch_assoc();
				return (string) $row['ethnicity'];
			}
		}

		public function simulateRecruiting()
		{
			echo "Recruiting - Recruit data has been simulated<br>";
		}
	}
