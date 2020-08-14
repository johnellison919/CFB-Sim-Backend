<?php

SQLDatabase::createTable("config", [
    "name"=>"varchar(191)",
    "value"=>"varchar(191)",
    "PRIMARY KEY"=>"(`name`)",
]);

$configQuery =
    "INSERT INTO fbdb_config (name, value)
    VALUES ('currentWeek', 1)";
    
$connection->query($configQuery);
