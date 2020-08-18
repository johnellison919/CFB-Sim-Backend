<?php
    SQLDatabase::createTable("schedule", [
        "scheduleId"=>"int(11) NOT NULL AUTO_INCREMENT",
        "homeTeamId"=>"int(11)",
        "awayTeamId"=>"int(11)",
        "gameWeek"=>"int(11)",
        "isNeutral"=>"tinyint(1)",
        "PRIMARY KEY"=>"(`scheduleId`)",
    ]);

    $scheduleQuery =
        "INSERT INTO `" . SQLDatabase::TABLE_PREFIX . "schedule` (homeTeamId, awayTeamId, gameWeek)
        VALUES
        (1, 2, 1),(3, 4, 1),
        (1, 3, 2),(2, 4, 2),
        (1, 4, 3),(2, 3, 3)";

    $connection->query($scheduleQuery);

    echo("Schedule table has been created!<br>");
