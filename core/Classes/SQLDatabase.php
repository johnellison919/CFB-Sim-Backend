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
		}

		public static function createInternalTables(){
			$connection = SQLDatabase::connect();

			foreach (glob("./database/*.php") as $filename) {
				include $filename;
			}
		}
	}
