<?php
    SQLDatabase::createTable("schools_recruiting", [
        "schoolId"=>"int(11) NOT NULL AUTO_INCREMENT",
        "playerId"=>"int(11)",
        "recruitingPoints"=>"int(11)",
        "PRIMARY KEY"=>"(`schoolId`)",
    ]);

    $schoolsRecruitingQuery =
        "INSERT INTO `" . SQLDatabase::TABLE_PREFIX . "utilities` (schoolId, playerId, recruitingPoints)
        VALUES
        (0, 0, 0)
        ";

    $connection->query($schoolsRecruitingQuery);

    echo("Schools Recruiting table has been created!<br>");
