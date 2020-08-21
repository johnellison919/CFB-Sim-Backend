<?php
    SQLDatabase::createTable("coaches", [
        "coachId"=>"int(11) NOT NULL AUTO_INCREMENT",
        "firstName"=>"tinytext",
        "lastName"=>"tinytext",
        "schoolId"=>"int(11)",
        "totalWins"=>"int(11)",
        "totalLoses"=>"int(11)",
        "PRIMARY KEY"=>"(`coachId`)",
    ]);

    $coachesQuery =
        "INSERT INTO `" . SQLDatabase::TABLE_PREFIX . "coaches` (firstName, lastName, schoolId, totalWins, totalLoses)
        VALUES
        ('Nick', 'Saban', 1, 0, 0),
        ('Gus', 'Malzahn', 2, 0, 0),
        ('Jim', 'Harbaugh', 3, 0, 0),
        ('Ryan', 'Day', 4, 0, 0)";

    $connection->query($coachesQuery);

    echo("Coaches table has been created!<br>");
