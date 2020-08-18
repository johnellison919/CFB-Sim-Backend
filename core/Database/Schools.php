<?php
    SQLDatabase::createTable("schools", [
        "schoolId"=>"int(11) NOT NULL AUTO_INCREMENT",
        "schoolName"=>"text",
        "totalWins"=>"int(11)",
        "totalLoses"=>"int(11)",
        "seasonWins"=>"int(11)",
        "seasonLoses"=>"int(11)",
        "PRIMARY KEY"=>"(`schoolId`)",
    ]);

    $schoolQuery =
        "INSERT INTO `" . SQLDatabase::TABLE_PREFIX . "schools` (schoolName, totalWins, totalLoses, seasonWins, seasonLoses)
        VALUES
        ('Alabama', 0, 0, 0, 0),
        ('Auburn', 0, 0, 0, 0),
        ('Michigan', 0, 0, 0, 0),
        ('Ohio State', 0, 0, 0, 0)";

    $connection->query($schoolQuery);

    echo("Schools table has been created!<br>");
