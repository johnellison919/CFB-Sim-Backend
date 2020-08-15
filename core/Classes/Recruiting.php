<?php
	/**
	* Class Recruiting
	*
	* @author John Ellison
	*/
	class Recruiting {

		public function createRecruits() {
			$connection = SQLDatabase::connect();
			$recruitAmount = 5;
			$recruitsArray = array_filter(Recruiting::generateRecruitsArray($recruitAmount));

			$statement = $connection->prepare(
			    "INSERT INTO `" . SQLDatabase::TABLE_PREFIX . "recruits` (firstName, lastName, height, weight)
			    VALUES (?,?,?,?)"
			);

			$connection->query("START TRANSACTION");

			foreach ($recruitsArray as $row) {
			    $bind = $statement->bind_param('ssii',
			        $row[0],
			        $row[1],
			        $row[2],
			        $row[3]
			    );
			    $execute = $statement->execute();
			}

			// Close the prepared statement
			$statement->close();

			$commit = $connection->query("COMMIT");

			echo "Created Recruits for the current season<br>";
		}

		public function deleteRecruits() {
			$connection = SQLDatabase::connect();

			$deleteRecruitsQuery =
				"DELETE FROM `" . SQLDatabase::TABLE_PREFIX . "recruits`";

			$connection->query($deleteRecruitsQuery);

			echo "Deleted Recruits for the previous season<br>";
		}

		public function generateRecruitsArray($recruitAmount) {
			$recruitsArray = array();
			$i = 0;

			while($i < $recruitAmount) {
				//TODO: Generate the first and last name for the player
				array_push($recruitsArray, array('Firstname', 'Lastname', 70, 190));
				$i++;
			}

			return $recruitsArray;
		}

		public function generateRecruitFirstName() {

		}

		public function generateRecruitLastName() {

		}

		public function generateRecruitHeight() {

		}

		public function generateRecruitWeight() {

		}

		public function simulateRecruiting() {
			echo "Recruiting - Recruiting has been simulated<br>";
		}
	}
