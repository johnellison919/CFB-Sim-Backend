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
				SELECT `value` FROM `" . SQLDatabase::TABLE_PREFIX . "config` WHERE name='currentWeek'
			");

			if ($result->num_rows > 0){
				$row = $result->fetch_assoc();
				return (int) $row['value'];
			}
		}

		public static function advanceCurrentWeek(int $currentWeek){
			$currentWeek++;

			$database = SQLDatabase::connect();
			$result = $database->query("
				UPDATE `" . SQLDatabase::TABLE_PREFIX . "config` SET `value` = '$currentWeek' WHERE `" . SQLDatabase::TABLE_PREFIX . "config`.`name` = 'currentWeek';
			");
		}

		public static function resetCurrentWeek(){

			$database = SQLDatabase::connect();
			$result = $database->query("
				UPDATE `" . SQLDatabase::TABLE_PREFIX . "config` SET `value` = '0' WHERE `" . SQLDatabase::TABLE_PREFIX . "config`.`name` = 'currentWeek';
			");
		}

		public static function getCurrentYear(){
			$database = SQLDatabase::connect();
			$result = $database->query("
				SELECT `value` FROM `" . SQLDatabase::TABLE_PREFIX . "config` WHERE name='currentYear'
			");

			if ($result->num_rows > 0){
				$row = $result->fetch_assoc();
				return (int) $row['value'];
			}
		}

		public static function advanceCurrentYear(int $currentYear){
			$currentYear++;

			$database = SQLDatabase::connect();
			$result = $database->query("
				UPDATE `" . SQLDatabase::TABLE_PREFIX . "config` SET `value` = '$currentYear' WHERE `" . SQLDatabase::TABLE_PREFIX . "config`.`name` = 'currentYear';
			");
		}
	}
