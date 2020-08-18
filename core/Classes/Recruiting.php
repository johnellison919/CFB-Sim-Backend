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
			$recruitAmount = 10; //TODO: Set to 3500 when the simulation is ready for the full amount of recruits
			$recruitsArray = array_filter(Recruiting::generateRecruitsArray($recruitAmount));

			$statement = $connection->prepare(
			    "INSERT INTO `" . SQLDatabase::TABLE_PREFIX . "recruits` (firstName, lastName, height, weight, ethnicity)
			    VALUES (?,?,?,?,?)"
			);

			$connection->query("START TRANSACTION");

			foreach ($recruitsArray as $row)
			{
			    $bind = $statement->bind_param('ssiis',
			        $row[0],
			        $row[1],
			        $row[2],
			        $row[3],
					$row[4]
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
				$height = Recruiting::generateRecruitHeight();
				$weight = Recruiting::generateRecruitWeight();
				$ethnicity = Recruiting::generateRecruitEthnicity();

				//TODO: Generate the first and last name for the player
				array_push($recruitsArray, array($firstName, $lastName, $height, $weight, $ethnicity));
				$i++;
			}

			return $recruitsArray;
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

		public function generateRecruitHeight()
		{
			//TODO: This should change dependant on the recruit's position
			return rand(65,80);
		}

		public function generateRecruitWeight()
		{
			//TODO: This should change dependant on the recruit's position
			return rand(150,400);
		}

		public function simulateRecruiting()
		{
			echo "Recruiting - Recruit data has been simulated<br>";
		}
	}
