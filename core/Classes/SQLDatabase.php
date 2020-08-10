<?php
	/**
	* Class SQLDatabase
	*
	* @author John Ellison
	*/

	class SQLDatabase {

		const TABLE_PREFIX = "fbdb_"; //TODO: Replace instances of the prefix with the constant

		public static function connect(){
			include __DIR__ . "/../../database-config.php";

			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Set MySQLi to throw exceptions
			$connection = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
			$connection->query("SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci");

			return $connection;
		}

		public static function createTable(string $tableName, array $columns){
			$connection = SQLDatabase::connect();
			$tableName = SQLDatabase::TABLE_PREFIX . $tableName;

			// Check if the table exists
			try{
				$connection->query("
					SELECT * FROM `$tableName` WHERE 1
				");

				// The table exists, verify all of the columns exist by attempting to add them
				foreach($columns as $columnName=>$columnDataType){
					try{
						$connection->query("ALTER TABLE `$tableName` ADD COLUMN `$columnName` $columnDataType");
					}catch(mysqli_sql_exception $e){
						// The column already existed, oh well
					}
				}
			}catch(mysqli_sql_exception $e){
				// Doesn't exist
				// Prepare columns string
				$columnString = "";
				foreach($columns as $columnName=>$columnDataType){
					if ($columnName !== "PRIMARY KEY"){
						$columnString .= "`$columnName` $columnDataType,";
					}else{
						$columnString .= "$columnName $columnDataType,";
					}
				}
				$columnString = rtrim($columnString, ","); // Trim the last comma

				$result = $connection->query("
					CREATE TABLE IF NOT EXISTS `$tableName` (
						$columnString
					)
				");
			}

			$connection->close();
		}

		public static function createInternalTables(){
			SQLDatabase::createTable("config", [
				"name"=>"varchar(191)",
				"value"=>"varchar(191)",
				"PRIMARY KEY"=>"(`name`)",
			]);

			SQLDatabase::createTable("schools", [
				"id"=>"int(11) NOT NULL AUTO_INCREMENT",
				"schoolName"=>"varchar(191)",
				"totalWins"=>"varchar(191)",
				"totalLoses"=>"varchar(191)",
				"seasonWins"=>"varchar(191)",
				"seasonLoses"=>"varchar(191)",
				"PRIMARY KEY"=>"(`id`)",
			]);

			SQLDatabase::createTable("schedule", [
				"homeTeamID"=>"varchar(191)",
				"awayTeamID"=>"varchar(191)",
				"gameWeek"=>"varchar(191)",
			]);

			$connection = SQLDatabase::connect();

			$configQuery =
				"INSERT INTO fbdb_config (name, value)
				VALUES ('currentWeek', 1)";
			$connection->query($configQuery);

			$schoolQuery =
				"INSERT INTO fbdb_schools (schoolName, totalWins, totalLoses, seasonWins, seasonLoses)
				VALUES
				('Alabama', 0, 0, 0, 0),
				('Auburn', 0, 0, 0, 0),
				('Michigan', 0, 0, 0, 0),
				('Ohio State', 0, 0, 0, 0)";
			$connection->query($schoolQuery);

			$scheduleQuery =
				"INSERT INTO fbdb_schedule (homeTeamID, awayTeamID, gameWeek)
				VALUES
				(1, 2, 1),(3, 4, 1),
				(1, 3, 2),(2, 4, 2),
				(1, 4, 3),(2, 3, 3)";
			$connection->query($scheduleQuery);

			$connection->close();
		}
	}
