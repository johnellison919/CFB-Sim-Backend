<?php
    SQLDatabase::createTable("config", [
        "configId"=>"int(11) NOT NULL AUTO_INCREMENT",
        "name"=>"tinytext",
        "value"=>"int",
        "PRIMARY KEY"=>"(`configId`)",
    ]);

    $configQuery =
        "INSERT INTO `" . SQLDatabase::TABLE_PREFIX . "config` (name, value)
        VALUES
        ('currentWeek', 1),
        ('currentYear', 2020)";

    $connection->query($configQuery);

    echo("Config table has been created!<br>");
