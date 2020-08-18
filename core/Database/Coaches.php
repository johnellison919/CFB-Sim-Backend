<?php
    SQLDatabase::createTable("coaches", [
        "coachId"=>"int(11) NOT NULL AUTO_INCREMENT",
        "firstName"=>"tinytext",
        "lastName"=>"tinytext",
        "schoolId"=>"int(11)",
        "PRIMARY KEY"=>"(`coachId`)",
    ]);

    $coachesQuery =
        "INSERT INTO `" . SQLDatabase::TABLE_PREFIX . "coaches` (firstName, lastName, schoolId)
        VALUES
        ('Nick', 'Saban', 1),
        ('Gus', 'Malzahn', 2),
        ('Jim', 'Harbaugh', 3),
        ('Ryan', 'Day', 4)";

    $connection->query($coachesQuery);

    echo("Coaches table has been created!<br>");
