<?php

SQLDatabase::createTable("schedule", [
    "homeTeamID"=>"varchar(191)",
    "awayTeamID"=>"varchar(191)",
    "gameWeek"=>"varchar(191)",
]);

$scheduleQuery =
    "INSERT INTO fbdb_schedule (homeTeamID, awayTeamID, gameWeek)
    VALUES
    (1, 2, 1),(3, 4, 1),
    (1, 3, 2),(2, 4, 2),
    (1, 4, 3),(2, 3, 3)";
    
$connection->query($scheduleQuery);
