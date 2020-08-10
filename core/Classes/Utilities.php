<?php
	/**
	* Class Utilities
	*
	* @author John Ellison
	*/

	class Utilities {
		public static function getCurrentWeek(){
			$database = SQLDatabase::connect();
			$result = $database->query("
				SELECT `value` FROM `fbdb_config` WHERE name='currentWeek'
			");

			if ($result->num_rows > 0){
				$row = $result->fetch_assoc();
				return (int) $row['value'];
			}

			$database->close();
		}

		public static function advanceCurrentWeek(int $currentWeek){
			$currentWeek++;

			$database = SQLDatabase::connect();
			$result = $database->query("
				UPDATE `fbdb_config` SET `value` = '$currentWeek' WHERE `fbdb_config`.`name` = 'currentWeek';
			");

			$database->close();
		}

		public static function resetCurrentWeek(){

			$database = SQLDatabase::connect();
			$result = $database->query("
				UPDATE `fbdb_config` SET `value` = '0' WHERE `fbdb_config`.`name` = 'currentWeek';
			");

			$database->close();
		}
	}
