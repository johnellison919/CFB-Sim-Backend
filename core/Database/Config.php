<?php
    SQLDatabase::createTable("config", [
        "name"=>"varchar(191)",
        "value"=>"varchar(191)",
        "PRIMARY KEY"=>"(`name`)",
    ]);

    $configQuery =
        "INSERT INTO `" . SQLDatabase::TABLE_PREFIX . "config` (name, value)
        VALUES
        ('currentWeek', 1),
        ('currentYear', 2020)";

    $connection->query($configQuery);

    echo("Config table has been created!<br>");
